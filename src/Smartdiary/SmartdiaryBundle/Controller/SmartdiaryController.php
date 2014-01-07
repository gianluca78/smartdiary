<?php

namespace Smartdiary\SmartdiaryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/smartdiary")
 *
 * Class SmartdiaryController
 * @package Smartdiary\SmartdiaryBundle\Controller
 */
class SmartdiaryController extends Controller
{
    /**
     * @Route("/nuovo")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction()
    {
        return $this->render('SmartdiarySmartdiaryBundle:Smartdiary:new.html.twig');
    }

    /**
     * @Route("/salva")
     * @Method({"POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function saveAction(Request $request)
    {
        if(!$request->isXmlHttpRequest())
        {
            throw new \Exception('this controller allows only ajax requests');
        }

        $smartdiaryData = json_decode($request->get('smartdiaryData'), true);

        $em = $this->getDoctrine()->getManager();
        $em->getRepository('SmartdiarySmartdiaryBundle:Smartdiary')
            ->saveSmartdiaryFromArray($smartdiaryData);

        return new Response();
    }


}
