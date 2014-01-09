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
            return $this->forward('SmartdiarySmartdiaryBundle:SmartdiaryTeacher:indexProblematicSituations');
        }

        if($this->get('security.context')->isGranted('ROLE_STUDENT'))
        {
            return $this->forward('SmartdiarySmartdiaryBundle:SmartdiaryStudent:indexProblematicSituations');
        }
    }

    /**
     * @Route("/nuovo")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $backUrl = $request->getSession()->get('smartdiary_redirect_url');

        return $this->render('SmartdiarySmartdiaryBundle:Smartdiary:new.html.twig', array('backUrl' => $backUrl));
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

        $userProblematicSituationId = $request->getSession()->get('userProblematicSituationId');

        $smartdiaryData = json_decode($request->get('smartdiaryData'), true);
        $smartdiaryData['userProblematicSituationId'] = $userProblematicSituationId;

        $em = $this->getDoctrine()->getManager();
        $em->getRepository('SmartdiarySmartdiaryBundle:Smartdiary')
            ->saveSmartdiaryFromArray($smartdiaryData, $this->getUser());

        $request->getSession()->getFlashBag()->add('success', 'Il diario è stato salvato con successo');

        return new Response($request->getSession()->get('smartdiary_redirect_url'));
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

        $referrer = $this->get('request')->server->get('HTTP_REFERER');

        return $this->render('SmartdiarySmartdiaryBundle:Smartdiary:view.html.twig', array(
            'smartdiary' => $smartdiary,
            'referrer' => $referrer
        ));
    }
}
