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
        $emotion->setLabel('Ansia');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Colpa');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Debolezza');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Delusione');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Disgusto');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Disperazione');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Disprezzo');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Dolore');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Fastidio');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Frustrazione');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Imbarazzo');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Impotenza');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Incertezza');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Invidia');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Irritazione');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Nervosismo');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Noia');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Paura');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Preoccupazione');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Rabbia');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Shock');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Stress');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Tristezza');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Vergogna');
        $emotion->setIsPositive(false);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Accortezza');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Affetto');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Amicizia');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Amore');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Calma');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Contentezza');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Delizia');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Divertimento');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Eccitazione');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Empatia');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Euforia');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Felicità');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Fiducia');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Gioia');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Incoraggiamento');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Interesse');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Orgoglio');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Piacere');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Rilassatezza');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Serenità');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Soddisfazione');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Sollievo');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Sorpresa');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

        $emotion = new Emotion();
        $emotion->setLabel('Speranza');
        $emotion->setIsPositive(true);
        $manager->persist($emotion);
        $manager->flush();

    }
}