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
 * @Route("/smartdiary/insegnante")
 *
 * Class SmartdiaryController
 * @package Smartdiary\SmartdiaryBundle\Controller
 */
class SmartdiaryTeacherController extends Controller
{
    /**
     * @Route("/diari")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexTeacherSmartdiariesAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_TEACHER')) {
            throw new AccessDeniedException();
        }

        $smartdiaries = $this->getDoctrine()->getRepository('SmartdiarySmartdiaryBundle:Smartdiary')
            ->getSmartdiaryByUserIdOrderedByCreationDate($this->getUser()->getId());

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryTeacher:index_smartdiaries.html.twig', array(
            'smartdiaries' => $smartdiaries
        ));
    }

    /**
     * @Route("/studenti")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexStudentsAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_TEACHER')) {
            throw new AccessDeniedException();
        }

        $users = $this->getDoctrine()->getRepository('SmartdiaryUserBundle:User')
            ->getUsersByTeacherEmailOrderedBySurnameName($this->getUser()->getEmail());

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryTeacher:index_students.html.twig', array(
            'users' => $users
        ));
    }
}
