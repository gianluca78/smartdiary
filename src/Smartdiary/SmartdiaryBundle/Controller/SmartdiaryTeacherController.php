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
 * @Route("/smartdiary/insegnante")
 *
 * Class SmartdiaryController
 * @package Smartdiary\SmartdiaryBundle\Controller
 */
class SmartdiaryTeacherController extends Controller
{

    /**
     * @Route("/situazioni-problema/esempi")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function examplesProblematicSituations()
    {
        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryTeacher:example_user_problematic_situations.html.twig');
    }

    /**
     * @Route("/situazioni-problema")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexProblematicSituationsAction()
    {
        $userProblematicSituations = $this->getDoctrine()
            ->getRepository('SmartdiarySmartdiaryBundle:UserProblematicSituation')
            ->getUserProblematicSituationsByUserId($this->getUser()->getId());

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryTeacher:index_user_problematic_situations.html.twig',
            array(
                'userProblematicSituations' => $userProblematicSituations
            )
        );
    }

    /**
     * @Route("/diari")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexTeacherSmartdiariesAction(Request $request)
    {
        $smartdiaries = $this->getDoctrine()->getRepository('SmartdiarySmartdiaryBundle:Smartdiary')
            ->getSmartdiaryByUserIdOrderedByCreationDate($this->getUser()->getId());

        $request->getSession()->set('smartdiary_redirect_url', $this->generateUrl(
                'smartdiary_smartdiary_smartdiaryteacher_indexteachersmartdiaries')
        );

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

    /**
     * @Route("/situazione-problema/{slug}/studenti")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexStudentsProblematicSituation(Request $request, $slug)
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
            ->getSmartdiariesByUserProblematicSituationIdOrderedByUserSurnameName($userProblemSituation->getId());

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryTeacher:index_students_problematic_situation.html.twig',
            array(
                'smartdiaries' => $smartdiaries,
                'problemSituation' => $userProblemSituation
            )
        );
    }

    /**
     * @Route("/situazione-problema/nuovo")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newProblematicSituationAction(Request $request)
    {
        $userProblematicSituation = new UserProblematicSituation();
        $form = $this->createForm('user_problematic_situation', $userProblematicSituation, array(
                'action' => $this->generateUrl('smartdiary_smartdiary_smartdiaryteacher_newproblematicsituation'),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $form->get('userId')->setData($this->getUser()->getId());

        $formHandler = $this->get('smartdiary.create_user_problematic_situation_form_handler');

        if($formHandler->handle($form, $request)) {
            return $this->redirect($this->generateUrl('smartdiary_smartdiary_smartdiaryteacher_indexproblematicsituations'));
        }

        return $this->render('SmartdiarySmartdiaryBundle:SmartdiaryTeacher:new_problematic_situation.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
