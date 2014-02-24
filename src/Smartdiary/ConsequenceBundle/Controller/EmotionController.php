<?php

namespace Smartdiary\ConsequenceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\SmartdiaryBundle\Entity\SmartdiaryEmotion;

/**
 * @Route("/conseguenze/emozioni")
 *
 * Class EmotionController
 * @package Smartdiary\ConsequenceBundle\Controller
 */
class EmotionController extends Controller
{
    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryConsequenceBundle:Emotion:index.html.twig');
    }

    /**
     * @Route("/intensita/{slug}")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newEmotionStrenghtAction(Request $request, $slug)
    {
        $smartdiaryEmotion = new SmartdiaryEmotion();

        $em = $this->getDoctrine()->getManager();
        $emotion = $em->getRepository('SmartdiarySmartdiaryBundle:Emotion')->findOneBySlug($slug);

        if (!$emotion) {
            throw $this->createNotFoundException(
                'Nessun dato trovato per lo slug '.$slug
            );
        }

        $smartdiaryEmotion->setEmotionId($emotion->getId());

        $form = $this->createForm('emotion_detail', $smartdiaryEmotion, array(
                'action' => $this->generateUrl('smartdiary_consequence_emotion_newemotionstrenght',
                        array(
                            'slug' => $emotion->getSlug()
                        )
                    ),
                'attr' => array('data-ajax' => 'false')
            )
        );
        $form->get('emotionLabel')->setData($emotion->getLabel());

        $formHandler = $this->get('smartdiary_consequence.create_emotion_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_consequence_emotion_index'));
        }

        return $this->render('SmartdiaryConsequenceBundle:Emotion:new_emotion_detail.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/nuovo")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newEmotionListAction()
    {
        return $this->render('SmartdiaryConsequenceBundle:Emotion:new_emotion_list.html.twig');
    }

    /**
     * @Route("/negative/nuovo")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newNegativeEmotionList()
    {
        $em = $this->getDoctrine()->getManager();
        $emotionList = $em->getRepository('SmartdiarySmartdiaryBundle:Emotion')->findNegativeEmotionsOrderByLabel();

        return $this->render('SmartdiaryConsequenceBundle:Emotion:new_emotion_list.html.twig', array(
            'emotionList' => $emotionList
        ));
    }

    /**
     * @Route("/positive/nuovo")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newPositiveEmotionList()
    {
        $em = $this->getDoctrine()->getManager();
        $emotionList = $em->getRepository('SmartdiarySmartdiaryBundle:Emotion')->findPositiveEmotionsOrderByLabel();

        return $this->render('SmartdiaryConsequenceBundle:Emotion:new_emotion_list.html.twig', array(
            'emotionList' => $emotionList
        ));
    }
}
