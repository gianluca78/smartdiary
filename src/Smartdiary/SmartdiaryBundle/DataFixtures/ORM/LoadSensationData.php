<?php
namespace Smartdiary\SmartdiaryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Smartdiary\SmartdiaryBundle\Entity\Sensation;

class LoadSensationData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $sensation = new Sensation();
        $sensation->setLabel('Astenia (spossatezza e mancanza di forze)');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Brividi o vampate di calore');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Debolezza');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Dispnea (fame d\'aria o mancanza d\'aria)');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Dolore al petto');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Dolori lombari');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Emicrania');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Eruzioni cutanee/orticaria/prurito');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Gambe molli');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Intorpidimento');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Nausea');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Nodo alla gola');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Palpitazioni');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Parestesie (torpore e formicolii)');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Sudorazione');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Tensione muscolare');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Tremori');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Vertigine/capogiro');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Vista annebbiata');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Altro');
        $manager->persist($sensation);
        $manager->flush();


    }
}