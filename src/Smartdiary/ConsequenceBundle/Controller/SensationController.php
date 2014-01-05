<?php

namespace Smartdiary\ConsequenceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/conseguenze/sensazioni")
 *
 * Class EmotionController
 * @package Smartdiary\ConsequenceBundle\Controller
 */
class SensationController extends Controller
{
    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryConsequenceBundle:Sensation:index.html.twig');
    }

    /**
     * @Route("/nuovo")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newSensationListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sensationList = $em->getRepository('SmartdiarySmartdiaryBundle:Sensation')->findAll();

        return $this->render('SmartdiaryConsequenceBundle:Sensation:new_sensation_list.html.twig', array(
            'sensationList' => $sensationList
        ));
    }


}
