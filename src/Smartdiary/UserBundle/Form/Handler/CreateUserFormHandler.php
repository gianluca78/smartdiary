<?php
namespace Smartdiary\UserBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\Security\Core\Encoder\EncoderFactory,
    Symfony\Component\HttpFoundation\Session\Session;

use Doctrine\ORM\EntityManager;

use Smartdiary\UserBundle\Entity\User;

class CreateUserFormHandler {

    private $entityManager;
    private $encoderFactory;
    private $session;

    public function __construct(
        EntityManager $entityManager,
        EncoderFactory $encoderFactory,
        Session $session
    )
    {
        $this->entityManager = $entityManager;
        $this->encoderFactory = $encoderFactory;
        $this->session = $session;
    }

    public function handle(FormInterface $form, Request $request)
    {
        if(!$request->isMethod('POST')) {
            return false;
        }

        $form->bind($request);

        if(!$form->isValid()) {
            return false;
        }

        $validUser = $form->getData();
        $this->createUser($validUser);

        return true;
    }

    public function createUser(User $user)
    {
        $encoder = $this->encoderFactory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
        $user->setPassword($password);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $this->session->getFlashBag()->add('success', 'L\'utente è stato creato con successo');
    }
} 