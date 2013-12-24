<?php
namespace Smartdiary\SmartdiaryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Smartdiary\SmartdiaryBundle\Entity\AntecedentWhere;

class LoadAntecedentWhereData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Mezzi di trasporto');
        $antecedentWhere->setExample('Aereo, Bus, Metropolitana, Nave, Treno');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Casa');
        $antecedentWhere->setExample('Bagno, Camera da letto, Cucina, Garage, Soggiorno');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Lavoro');
        $antecedentWhere->setExample('Auditorium, Garage, Mensa, Ufficio');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Servizi sanitari');
        $antecedentWhere->setExample('');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Tempo libero');
        $antecedentWhere->setExample('Cinema, Discoteca, Palestra, Pub, Teatro');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Negozi');
        $antecedentWhere->setExample('');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Spazi aperti');
        $antecedentWhere->setExample('Autostrada, Giardino, Mare, Parco, Piazza, Ponte, Stadio');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Spazi chiusi');
        $antecedentWhere->setExample('Ascensore, Cantina, Sotterraneo');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Istruzione');
        $antecedentWhere->setExample('Biblioteca, Scuola, Università');
        $manager->persist($antecedentWhere);
        $manager->flush();

        $antecedentWhere = new AntecedentWhere();
        $antecedentWhere->setLabel('Altro');
        $antecedentWhere->setExample('');
        $manager->persist($antecedentWhere);
        $manager->flush();
    }
}