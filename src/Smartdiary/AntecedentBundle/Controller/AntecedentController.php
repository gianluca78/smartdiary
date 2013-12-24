<?php

namespace Smartdiary\AntecedentBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/antecedente")
 *
 * Class AntecedentController
 * @package Smartdiary\AntecedentBundle\Controller
 */
class AntecedentController extends Controller
{
    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryAntecedentBundle:Antecedent:list.html.twig');
    }


}
