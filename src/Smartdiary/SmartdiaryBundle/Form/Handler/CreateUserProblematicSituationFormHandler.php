<?php
namespace Smartdiary\SmartdiaryBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\HttpFoundation\Session\Session;

use Doctrine\ORM\EntityManager;

use Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation,
    Smartdiary\UserBundle\Entity\User;

class CreateUserProblematicSituationFormHandler {

    private $entityManager;
    private $session;

    public function __construct(
        EntityManager $entityManager,
        Session $session
    )
    {
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    public function handle(FormInterface $form, Request $request, User $user)
    {
        if(!$request->isMethod('POST')) {
            return false;
        }

        $form->bind($request);

        if(!$form->isValid()) {
            return false;
        }

        $validUserProblematicSituation = $form->getData();

        $this->createUserProblematicSituation($validUserProblematicSituation, $user);

        return true;
    }

    public function createUserProblematicSituation(UserProblematicSituation $userProblematicSituation, User $user)
    {
        $userProblematicSituation->setUser($user);

        $this->entityManager->persist($userProblematicSituation);
        $this->entityManager->flush();

        $this->session->getFlashBag()->add('success', 'La situazione problema è stata creata con successo');
    }
} 