<?php
namespace Smartdiary\SmartdiaryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Smartdiary\SmartdiaryBundle\Entity\Emotion;

class LoadEmotionData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $emotion = new Emotion();
        $emotion->setLabel('Angoscia');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Ansia');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Colpa');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Depressione');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Irritazione');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Nervosismo');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Paura');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Rabbia');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Rimorso');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Sconforto');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Solidtudine');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Sopraffazione');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Tristezza');
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Vergogna');
        $manager->persist($emotion);
        $manager->flush();

    }
}