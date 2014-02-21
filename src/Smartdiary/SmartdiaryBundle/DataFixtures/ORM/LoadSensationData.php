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
        $sensation->setLabel('Spossatezza e/o mancanza di forze');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Brividi');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Rossore o sensazione di calore');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Mancanza d\'aria');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Senso di costrizione o pesantezza al torace');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Dolore');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Mal di testa');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Eruzioni cutanee/prurito');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Gambe molli');
        $manager->persist($sensation);
        $manager->flush();

        $sensation = new Sensation();
        $sensation->setLabel('Formicolii agli arti');
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
        $sensation->setLabel('Cuore che batte forte');
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
    }
}