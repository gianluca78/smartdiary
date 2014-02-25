<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\EntityRepository;

class SensationRepository extends EntityRepository
{
    public function findSensationsOrderedByLabel()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s FROM SmartdiarySmartdiaryBundle:Sensation s
                ORDER BY s.label ASC
                '
            )
            ->getResult();
    }
}
