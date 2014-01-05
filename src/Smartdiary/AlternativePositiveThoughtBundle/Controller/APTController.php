<?php

namespace Smartdiary\AlternativePositiveThoughtBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought;

/**
 * @Route("/pensieri-alternativi-funzionali")
 *
 * Class ANTController
 * @package Smartdiary\AutomaticNegativeThoughtBundle\Controller
 */
class APTController extends Controller
{
    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryAlternativePositiveThoughtBundle:APT:index.html.twig');
    }

    /**
     * @Route("/nuovo/{index}", options={"expose"=true})
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request, $index=null)
    {
        $alternativePositiveThought = new SmartdiaryAlternativePositiveThought();
        $form = $this->createForm('apt', $alternativePositiveThought, array(
                'action' => $this->generateUrl('smartdiary_alternativepositivethought_apt_new'),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $form->get('index')->setData($index);

        $formHandler = $this->get('smartdiary_user.create_apt_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_alternativepositivethought_apt_index'));
        }

        return $this->render('SmartdiaryAlternativePositiveThoughtBundle:APT:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
