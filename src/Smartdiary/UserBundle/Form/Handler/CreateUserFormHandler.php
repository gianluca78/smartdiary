<?php
namespace Smartdiary\UserBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\Security\Core\Encoder\EncoderFactory;

use Doctrine\ORM\EntityManager;

use Smartdiary\UserBundle\Entity\User;

class CreateUserFormHandler {

    private $entityManager;
    private $encoderFactory;

    public function __construct(EntityManager $entityManager, EncoderFactory $encoderFactory)
    {
        $this->entityManager = $entityManager;
        $this->encoderFactory = $encoderFactory;
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
    }
} 