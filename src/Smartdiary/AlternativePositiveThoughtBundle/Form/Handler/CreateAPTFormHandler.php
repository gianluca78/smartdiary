<?php
namespace Smartdiary\AlternativePositiveThoughtBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\HttpFoundation\Session\Session;

class CreateAPTFormHandler {

    public function __construct()
    {

    }

    public function handle(FormInterface $form, Request $request)
    {
        if(!$request->isMethod('POST')) {
            return false;
        }

        $form->bind($request);

        if(!$form->isValid()) {
            return false;
        }

        return true;
    }
}