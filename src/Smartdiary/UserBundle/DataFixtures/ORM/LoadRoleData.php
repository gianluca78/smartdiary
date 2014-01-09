<?php
namespace Smartdiary\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Smartdiary\UserBundle\Entity\Role;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $roleTeacher = new Role();
        $roleTeacher->setRole('ROLE_TEACHER');
        $roleTeacher->setDescription('Insegnante');
        $manager->persist($roleTeacher);
        $manager->flush();

        $this->addReference('role-teacher', $roleTeacher);

        $roleStudent = new Role();
        $roleStudent->setRole('ROLE_STUDENT');
        $roleStudent->setDescription('Studente');
        $manager->persist($roleStudent);
        $manager->flush();

        $this->addReference('role-student', $roleStudent);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}