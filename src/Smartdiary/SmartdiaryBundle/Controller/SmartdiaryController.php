<?php

namespace Smartdiary\SmartdiaryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Component\Security\Core\Exception\AccessDeniedException;

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
     * @Route("/")
     * @Method({"GET"})
     *
     */
    public function indexAction()
    {
        if($this->get('security.context')->isGranted('ROLE_TEACHER'))
        {
            $this->forward($this->indexTeacherAction());
        }

        if($this->get('security.context')->isGranted('ROLE_TEACHER'))
        {
            $this->forward($this->indexStudentAction());
        }

    }

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

    /**
     * @Route("/visualizza/{id}", requirements={"id" = "\d+"})
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(Request $request, $id)
    {
        $smartdiary = $this->getDoctrine()->getRepository('SmartdiarySmartdiaryBundle:Smartdiary')->find($id);

        return $this->render('SmartdiarySmartdiaryBundle:Smartdiary:view.html.twig', array(
            'smartdiary' => $smartdiary
        ));
    }
}
