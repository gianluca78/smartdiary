<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UserProblematicSituationRepository extends EntityRepository
{
    public function getUserProblematicSituationsByUserId($userId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT u FROM SmartdiarySmartdiaryBundle:UserProblematicSituation u
                WHERE u.userId = :userId
                ORDER BY u.title ASC
                '
            )
            ->setParameter('userId', $userId)
            ->getResult();
    }
}
