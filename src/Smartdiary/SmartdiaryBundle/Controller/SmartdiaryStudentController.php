<?php

namespace Smartdiary\SmartdiaryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation;

/**
 * @Route("/smartdiary/studente")
 *
 * Class SmartdiaryController
 * @package Smartdiary\SmartdiaryBundle\Controller
 */
class SmartdiaryStudentController extends Controller
{
    /**
     * @Route("/situazioni-problema")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexProblematicSituationsAction()
    {
        $teacher = $this->getDoctrine()
            ->getRepository('SmartdiaryUserBundle:User')
            ->findOneByEmail($this->getUser()->getTeacherEmail());

        $userProblematicSituations = $this->getDoctrine()
            ->getRepository('SmartdiarySmartdiaryBundle:UserProblematicSituation')
            ->getUserProblematicSituationsByUserId($teacher->getId());

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryStudent:index_user_problematic_situations.html.twig',
            array(
                'userProblematicSituations' => $userProblematicSituations
            )
        );
    }

    /**
     * @Route("/situazione-problema/{slug}/diari")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexProblematicSituationSmartdiaries(Request $request, $slug)
    {
        $userProblemSituation = $this->getDoctrine()
            ->getRepository('SmartdiarySmartdiaryBundle:UserProblematicSituation')
            ->findOneBySlug($slug);

        if (!$userProblemSituation) {
            throw $this->createNotFoundException(
                'No problem situation found for slug '.$slug
            );
        }

        $smartdiaries = $this->getDoctrine()
            ->getRepository('SmartdiarySmartdiaryBundle:Smartdiary')
            ->getSmartdiariesByUserProblematicSituationIdUserIdOrderedByCreationDate(
                $userProblemSituation->getId(),
                $this->getUser()->getId()
            );

        $request->getSession()->set('smartdiary_redirect_url', $this->generateUrl(
            'smartdiary_smartdiary_smartdiarystudent_indexproblematicsituationsmartdiaries',
            array(
                'slug' => $userProblemSituation->getSlug()
            ))
        );

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryStudent:index_problematic_situation_smartdiaries.html.twig',
            array(
                'smartdiaries' => $smartdiaries,
                'problemSituation' => $userProblemSituation
            )
        );
    }

    /**
     * @Route("/diari")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexStudentSmartdiariesAction(Request $request)
    {
        $smartdiaries = $this->getDoctrine()->getRepository('SmartdiarySmartdiaryBundle:Smartdiary')
            ->getSmartdiaryByUserIdOrderedByCreationDate($this->getUser()->getId());

        $request->getSession()->set('smartdiary_redirect_url', $this->generateUrl(
                'smartdiary_smartdiary_smartdiarystudent_indexstudentsmartdiaries')
        );

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryStudent:index_smartdiaries.html.twig', array(
            'smartdiaries' => $smartdiaries
        ));
    }

}
