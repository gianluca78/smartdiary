<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Smartdiary\SmartdiaryBundle\Entity\Smartdiary,
    Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAutomaticNegativeThought,
    Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought,
    Smartdiary\SmartdiaryBundle\Entity\SmartdiaryEmotion,
    Smartdiary\SmartdiaryBundle\Entity\SmartdiarySensation,
    Smartdiary\SmartdiaryBundle\Entity\AntecedentWhere,
    Smartdiary\SmartdiaryBundle\Entity\AntecedentWho,
    Smartdiary\UserBundle\Entity\User;


class SmartdiaryRepository extends EntityRepository
{
    public function getSmartdiaryByUserIdOrderedByCreationDate($userId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s FROM SmartdiarySmartdiaryBundle:Smartdiary s
                WHERE s.userId = :userId
                ORDER BY s.createdAt DESC
                '
            )
            ->setParameter('userId', $userId)
            ->getResult();
    }

    public function saveSmartdiaryFromArray(array $data, \Smartdiary\UserBundle\Entity\User $user)
    {
        $antecedentWhere = $this->getEntityManager()
            ->getRepository('SmartdiarySmartdiaryBundle:AntecedentWhere')
            ->find($data['antecedent_where_id']);

        $antecedentWho = $this->getEntityManager()
            ->getRepository('SmartdiarySmartdiaryBundle:AntecedentWho')
            ->find($data['antecedent_who_id']);

        $smartdiary = new Smartdiary();
        $smartdiary->setUser($user);
        $smartdiary->setAntecedentWhereDetail($data['antecedent_where_detail']);
        $smartdiary->setAntecedentWhere($antecedentWhere);
        $smartdiary->setAntecedentWhoDetail($data['antecedent_who_detail']);
        $smartdiary->setAntecedentWho($antecedentWho);
        $smartdiary->setAntecedentWhen($data['antecedent_when']);
        $smartdiary->setAntecedentWhat($data['antecedent_what']);
        $smartdiary->setBehavior($data['behavior']);

        $this->getEntityManager()->persist($smartdiary);
        $this->getEntityManager()->flush();

        foreach(json_decode($data['ants'], true) as $dataAnt) {
            $alternativePositiveThought = new SmartdiaryAlternativePositiveThought();
            $alternativePositiveThought->setSmartdiary($smartdiary);
            $alternativePositiveThought->setApt($dataAnt['apt']);
            $alternativePositiveThought->setStrenght($dataAnt['apt_strenght']);

            $this->getEntityManager()->persist($alternativePositiveThought);
            $this->getEntityManager()->flush();

            $automaticNegativeThought = new SmartdiaryAutomaticNegativeThought();

            $automaticNegativeThought->setSmartdiary($smartdiary);
            $automaticNegativeThought->setAlternativePositiveThought($alternativePositiveThought);
            $automaticNegativeThought->setAnt($dataAnt['ant']);
            $automaticNegativeThought->setStrenght($dataAnt['strenght']);

            $this->getEntityManager()->persist($automaticNegativeThought);
            $this->getEntityManager()->flush();
        }

        foreach(json_decode($data['emotions'], true) as $dataEmotion) {
            $emotion = $this->getEntityManager()
                ->getRepository('SmartdiarySmartdiaryBundle:Emotion')
                ->find($dataEmotion['emotion_id']);

            $smartdiaryEmotion = new SmartdiaryEmotion();
            $smartdiaryEmotion->setSmartdiary($smartdiary);
            $smartdiaryEmotion->setEmotion($emotion);
            $smartdiaryEmotion->setStrenght($dataEmotion['strenght']);
            $smartdiaryEmotion->setStrenghtRevaluation($dataEmotion['strenght_revaluation']);

            $this->getEntityManager()->persist($smartdiaryEmotion);
            $this->getEntityManager()->flush();
        }

        foreach(json_decode($data['sensations'], true) as $dataSensation) {
            $sensation = $this->getEntityManager()
                ->getRepository('SmartdiarySmartdiaryBundle:Sensation')
                ->find($dataSensation['sensation_id']);

            $smartdiarySensation = new SmartdiarySensation();
            $smartdiarySensation->setSmartdiary($smartdiary);
            $smartdiarySensation->setSensation($sensation);
            $smartdiarySensation->setStrenght($dataSensation['strenght']);

            $this->getEntityManager()->persist($smartdiarySensation);
            $this->getEntityManager()->flush();
        }
    }
}
