<?php

namespace Smartdiary\AutomaticNegativeThoughtBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\SmartdiaryBundle\Entity\AutomaticNegativeThought;

/**
 * @Route("/pensieri-automatici-negativi")
 *
 * Class ANTController
 * @package Smartdiary\AutomaticNegativeThoughtBundle\Controller
 */
class ANTController extends Controller
{
    /**
     * @Route("/esempi")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exampleAction()
    {
        return $this->render('SmartdiaryAutomaticNegativeThoughtBundle:ANT:example.html.twig');
    }

    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryAutomaticNegativeThoughtBundle:ANT:index.html.twig');
    }

    /**
     * @Route("/nuovo")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $automaticNegativeThought = new AutomaticNegativeThought();
        $form = $this->createForm('ant', $automaticNegativeThought, array(
                'action' => $this->generateUrl('smartdiary_automaticnegativethought_ant_new'),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $formHandler = $this->get('smartdiary_user.create_ant_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_automaticnegativethought_ant_index'));
        }

        return $this->render('SmartdiaryAutomaticNegativeThoughtBundle:ANT:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
