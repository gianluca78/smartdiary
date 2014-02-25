<?php

namespace Smartdiary\ConsequenceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\SmartdiaryBundle\Entity\SmartdiarySensation;

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
     * @Route("/intensita/{slug}")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newSensationStrenghtAction(Request $request, $slug)
    {
        $smartdiarySensation = new SmartdiarySensation();

        $em = $this->getDoctrine()->getManager();
        $sensation = $em->getRepository('SmartdiarySmartdiaryBundle:Sensation')->findOneBySlug($slug);

        if (!$sensation) {
            throw $this->createNotFoundException(
                'Nessun dato trovato per lo slug '.$slug
            );
        }

        $smartdiarySensation->setSensationId($sensation->getId());

        $form = $this->createForm('sensation_detail', $smartdiarySensation, array(
                'action' => $this->generateUrl('smartdiary_consequence_sensation_newsensationstrenght',
                        array(
                            'slug' => $sensation->getSlug()
                        )
                    ),
                'attr' => array('data-ajax' => 'false')
            )
        );
        $form->get('sensationLabel')->setData($sensation->getLabel());

        $formHandler = $this->get('smartdiary_consequence.create_sensation_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_consequence_sensation_index'));
        }

        return $this->render('SmartdiaryConsequenceBundle:Sensation:new_sensation_detail.html.twig', array(
            'form' => $form->createView()
        ));
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
        $sensationList = $em->getRepository('SmartdiarySmartdiaryBundle:Sensation')->findSensationsOrderedByLabel();

        return $this->render('SmartdiaryConsequenceBundle:Sensation:new_sensation_list.html.twig', array(
            'sensationList' => $sensationList
        ));
    }


}
