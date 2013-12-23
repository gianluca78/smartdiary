<?php

namespace Smartdiary\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\UserBundle\Entity\User,
    Smartdiary\UserBundle\Form\Type\UserType;


/**
 * @Route("/utente")
 *
 * Class UserController
 * @package Smartdiary\UserBundle\Controller
 */
class UserController extends Controller
{
    /**
     * @Route("/nuovo")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('user', $user);

        $formHandler = $this->get('smartdiary_user.create_account_form_handler');

        if($formHandler->handle($form, $request)) {
            return $this->redirect($this->generateUrl('smartdiary_user_user_new'));
        }

        return $this->render('SmartdiaryUserBundle:User:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
