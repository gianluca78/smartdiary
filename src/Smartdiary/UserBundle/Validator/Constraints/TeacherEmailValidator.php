<?php
namespace Smartdiary\UserBundle\Validator\Constraints;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class TeacherEmailValidator extends ConstraintValidator
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        if($value)
        {
            $query = $this->entityManager
                ->createQuery('
                SELECT u FROM SmartdiaryUserBundle:User u
                WHERE u.email = :email'
                )
                ->setParameter('email', $value);

            if(!$query->getResult())
            {
                $this->context->addViolationAt(
                    'teacher_email',
                    $constraint->message,
                    array(),
                    null
                );
            }
        }
    }

    public function validatedBy()
    {
        return 'teacher_email';
    }
} 