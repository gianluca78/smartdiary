<?php

namespace Smartdiary\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUsersByTeacherEmailOrderedBySurnameName($email)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u FROM SmartdiaryUserBundle:User u
                WHERE u.teacher_email = :email
                ORDER BY u.surname, u.name
                '
            )
            ->setParameter('email', $email)
            ->getResult();
    }
}
