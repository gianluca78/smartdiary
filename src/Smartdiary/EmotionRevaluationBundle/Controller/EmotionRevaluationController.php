<?php

namespace Smartdiary\EmotionRevaluationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\SmartdiaryBundle\Entity\SmartdiaryEmotion;

/**
 * @Route("/rivalutazione-emozioni")
 *
 * Class EmotionRevaluationController
 * @package Smartdiary\EmotionRevaluationBundle\Controller
 */
class EmotionRevaluationController extends Controller
{
    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryEmotionRevaluationBundle:EmotionRevaluation:index.html.twig');
    }

    /**
     * @Route("/nuovo/{index}")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request, $index=null)
    {
        $smartdiaryEmotion = new SmartdiaryEmotion();
        $form = $this->createForm('emotion_revaluation', $smartdiaryEmotion, array(
                'action' => $this->generateUrl('smartdiary_emotionrevaluation_emotionrevaluation_new'),
                'attr' => array('data-ajax' => 'false')
            )
        );
        $form->get('index')->setData($index);

        $formHandler = $this->get('smartdiary_user.create_emotion_revaluation_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_emotionrevaluation_emotionrevaluation_index'));
        }

        return $this->render('SmartdiaryEmotionRevaluationBundle:EmotionRevaluation:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
