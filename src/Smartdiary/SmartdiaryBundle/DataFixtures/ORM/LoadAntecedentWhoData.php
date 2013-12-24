<?php
namespace Smartdiary\SmartdiaryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Smartdiary\SmartdiaryBundle\Entity\AntecedentWho;

class LoadAntecedentWhoData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $antecedentWho = new AntecedentWho();
        $antecedentWho->setLabel('Famiglia');
        $antecedentWho->setExample('Padre/Madre, Fratello/Sorella, Marito/Moglie, Figlio, Nonno');
        $manager->persist($antecedentWho);
        $manager->flush();

        $antecedentWho = new AntecedentWho();
        $antecedentWho->setLabel('Amici');
        $antecedentWho->setExample('');
        $manager->persist($antecedentWho);
        $manager->flush();

        $antecedentWho = new AntecedentWho();
        $antecedentWho->setLabel('Colleghi di lavoro');
        $antecedentWho->setExample('Superiori, Pari, Subordinati');
        $manager->persist($antecedentWho);
        $manager->flush();

        $antecedentWho = new AntecedentWho();
        $antecedentWho->setLabel('Personale medico');
        $antecedentWho->setExample('');
        $manager->persist($antecedentWho);
        $manager->flush();

        $antecedentWho = new AntecedentWho();
        $antecedentWho->setLabel('Insegnanti');
        $antecedentWho->setExample('');
        $manager->persist($antecedentWho);
        $manager->flush();

        $antecedentWho = new AntecedentWho();
        $antecedentWho->setLabel('Altro');
        $antecedentWho->setExample('');
        $manager->persist($antecedentWho);
        $manager->flush();
   }
}