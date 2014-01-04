<?php

namespace Smartdiary\BehaviorBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\SmartdiaryBundle\Entity\Smartdiary;

/**
 * @Route("/comportamento")
 *
 * Class BehaviorController
 * @package Smartdiary\BehaviorBundle\Controller
 */
class BehaviorController extends Controller
{
    /**
     * @Route("/nuovo")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newBehaviorAction(Request $request)
    {
        $smartdiary = new Smartdiary();
        $form = $this->createForm('behavior', $smartdiary, array(
                'action' => $this->generateUrl('smartdiary_behavior_behavior_newbehavior'),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $formHandler = $this->get('smartdiary_user.create_behavior_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_smartdiary_smartdiary_new'));
        }

        return $this->render('SmartdiaryBehaviorBundle:Behavior:new_behavior.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
