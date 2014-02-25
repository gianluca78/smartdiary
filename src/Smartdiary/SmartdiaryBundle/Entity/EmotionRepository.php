<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EmotionRepository extends EntityRepository
{
    public function findNegativeEmotionsOrderByLabel()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT e FROM SmartdiarySmartdiaryBundle:Emotion e
                WHERE e.isPositive = 0
                ORDER BY e.label ASC
                '
            )
            ->getResult();
    }

    public function findPositiveEmotionsOrderByLabel()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT e FROM SmartdiarySmartdiaryBundle:Emotion e
                WHERE e.isPositive = 1
                ORDER BY e.label ASC
                '
            )
            ->getResult();
    }
}
