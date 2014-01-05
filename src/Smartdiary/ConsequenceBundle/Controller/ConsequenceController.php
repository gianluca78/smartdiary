<?php

namespace Smartdiary\ConsequenceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/conseguenze")
 *
 * Class ConsequenceController
 * @package Smartdiary\ConsequenceBundle\Controller
 */
class ConsequenceController extends Controller
{
    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryConsequenceBundle:Consequence:index.html.twig');
    }
}
