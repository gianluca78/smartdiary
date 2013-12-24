<?php
namespace Smartdiary\UserBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class TeacherEmail extends Constraint
{
    public $message = 'L\'email inserita non è valida';

    public function validatedBy() {
        return "teacher_email";
    }
} 