<?php
namespace Smartdiary\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Smartdiary\UserBundle\Entity\Role;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $roleProject = new Role();
        $roleProject->setRole('ROLE_TEACHER');
        $roleProject->setDescription('Insegnante');
        $manager->persist($roleProject);
        $manager->flush();

        $roleManagement = new Role();
        $roleManagement->setRole('ROLE_STUDENT');
        $roleManagement->setDescription('Studente');
        $manager->persist($roleManagement);
        $manager->flush();
    }
}