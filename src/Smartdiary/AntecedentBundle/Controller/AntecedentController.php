<?php

namespace Smartdiary\AntecedentBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Smartdiary\SmartdiaryBundle\Entity\Smartdiary;

/**
 * @Route("/antecedente")
 *
 * Class AntecedentController
 * @package Smartdiary\AntecedentBundle\Controller
 */
class AntecedentController extends Controller
{
    /**
     * @Route("/lista")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SmartdiaryAntecedentBundle:Antecedent:index.html.twig');
    }

    /**
     * @Route("/quando")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAntecedentWhenAction(Request $request)
    {
        $smartdiary = new Smartdiary();
        $form = $this->createForm('antecedent_when', $smartdiary, array(
                'action' => $this->generateUrl('smartdiary_antecedent_antecedent_newantecedentwhen'),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $formHandler = $this->get('smartdiary_user.create_antecedent_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_antecedent_antecedent_index'));
        }

        return $this->render('SmartdiaryAntecedentBundle:Antecedent:new_antecedent_when.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/dove/dettaglio/{slug}")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAntecedentWhereDetailAction(Request $request, $slug)
    {
        $smartdiary = new Smartdiary();

        $em = $this->getDoctrine()->getManager();
        $antecedentWhere = $em->getRepository('SmartdiarySmartdiaryBundle:AntecedentWhere')->findOneBySlug($slug);

        if (!$antecedentWhere) {
            throw $this->createNotFoundException(
                'Nessun dato trovato per lo slug '.$slug
            );
        }

        $smartdiary->setAntecedentWhere($antecedentWhere);
        $smartdiary->setAntecedentWhereId($antecedentWhere->getId());

        $form = $this->createForm('antecedent_where_detail', $smartdiary, array(
                'action' => $this->generateUrl('smartdiary_antecedent_antecedent_newantecedentwheredetail',
                    array(
                        'slug' => $antecedentWhere->getSlug()
                    )
                ),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $formHandler = $this->get('smartdiary_user.create_antecedent_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_antecedent_antecedent_index'));
        }

        return $this->render('SmartdiaryAntecedentBundle:Antecedent:new_antecedent_where_detail.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/chi/{slug}")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAntecedentWhoDetailAction(Request $request, $slug)
    {
        $smartdiary = new Smartdiary();

        $em = $this->getDoctrine()->getManager();
        $antecedentWho = $em->getRepository('SmartdiarySmartdiaryBundle:AntecedentWho')->findOneBySlug($slug);

        if (!$antecedentWho) {
            throw $this->createNotFoundException(
                'Nessun dato trovato per lo slug '.$slug
            );
        }

        $smartdiary->setAntecedentWho($antecedentWho);
        $smartdiary->setAntecedentWhoId($antecedentWho->getId());

        $form = $this->createForm('antecedent_who_detail', $smartdiary, array(
                'action' => $this->generateUrl('smartdiary_antecedent_antecedent_newantecedentwhodetail',
                    array(
                        'slug' => $antecedentWho->getSlug()
                    )
                ),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $formHandler = $this->get('smartdiary_user.create_antecedent_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_antecedent_antecedent_index'));
        }

        return $this->render('SmartdiaryAntecedentBundle:Antecedent:new_antecedent_who_detail.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/dove")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAntecedentWhereListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $whereList = $em->getRepository('SmartdiarySmartdiaryBundle:AntecedentWhere')->findAll();

        return $this->render('SmartdiaryAntecedentBundle:Antecedent:new_antecedent_where.html.twig', array(
            'whereList' => $whereList
        ));
    }

    /**
     * @Route("/chi")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAntecedentWhoListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $whoList = $em->getRepository('SmartdiarySmartdiaryBundle:AntecedentWho')->findAll();

        return $this->render('SmartdiaryAntecedentBundle:Antecedent:new_antecedent_who.html.twig', array(
            'whoList' => $whoList
        ));
    }

    /**
     * @Route("/cosa")
     * @Method({"GET", "POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAntecedentWhatAction(Request $request)
    {
        $smartdiary = new Smartdiary();
        $form = $this->createForm('antecedent_what', $smartdiary, array(
                'action' => $this->generateUrl('smartdiary_antecedent_antecedent_newantecedentwhat'),
                'attr' => array('data-ajax' => 'false')
            )
        );

        $formHandler = $this->get('smartdiary_user.create_antecedent_form_handler');

        if($formHandler->handle($form, $request)) {
            $this->get('session')->getFlashBag()->add('success', 'Salvataggio locale avvenuto con successo');

            return $this->redirect($this->generateUrl('smartdiary_antecedent_antecedent_index'));
        }

        return $this->render('SmartdiaryAntecedentBundle:Antecedent:new_antecedent_what.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
