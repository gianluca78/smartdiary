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
    public function saveSmartdiaryFromArray(array $data)
    {
        $antecedentWhere = $this->getEntityManager()
            ->getRepository('SmartdiarySmartdiaryBundle:AntecedentWhere')
            ->find($data['antecedent_where_id']);

        $antecedentWho = $this->getEntityManager()
            ->getRepository('SmartdiarySmartdiaryBundle:AntecedentWho')
            ->find($data['antecedent_who_id']);

        $user = $this->getEntityManager()
            ->getRepository('SmartdiaryUserBundle:User')
            ->find(1);

        $smartdiary = new Smartdiary();
        $smartdiary->setUserId(1);
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
            $automaticNegativeThought = new SmartdiaryAutomaticNegativeThought();

            $automaticNegativeThought->setSmartdiary($smartdiary);
            $automaticNegativeThought->setAnt($dataAnt['ant']);
            $automaticNegativeThought->setStrenght($dataAnt['strenght']);

            $this->getEntityManager()->persist($automaticNegativeThought);
            $this->getEntityManager()->flush();

            $alternativePositiveThought = new SmartdiaryAlternativePositiveThought();
            $alternativePositiveThought->setSmartdiary($smartdiary);
            $alternativePositiveThought->setApt($dataAnt['apt']);
            $alternativePositiveThought->setStrenght($dataAnt['apt_strenght']);

            $this->getEntityManager()->persist($alternativePositiveThought);
            $this->getEntityManager()->flush();
        }

        foreach(json_decode($data['emotions'], true) as $dataEmotion) {
            $emotion = new SmartdiaryEmotion();
            $emotion->setSmartdiary($smartdiary);
            $emotion->setEmotionId($dataEmotion['emotion_id']);
            $emotion->setStrenght($dataEmotion['strenght']);
            $emotion->setStrenghtRevaluation($dataEmotion['strenght_revaluation']);

            $this->getEntityManager()->persist($emotion);
            $this->getEntityManager()->flush();
        }

        foreach(json_decode($data['sensations'], true) as $dataSensation) {
            $sensation = new SmartdiarySensation();
            $sensation->setSmartdiaryId($smartdiary->getId());
            $sensation->setSmartdiary($smartdiary);
            $sensation->setSensationId($dataSensation['sensation_id']);
            $sensation->setStrenght($dataSensation['strenght']);

            $this->getEntityManager()->persist($sensation);
            $this->getEntityManager()->flush();
        }
    }
}
