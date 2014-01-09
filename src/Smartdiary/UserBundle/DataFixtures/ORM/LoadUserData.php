<?php
namespace Smartdiary\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Smartdiary\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //docenteitd
        $user = new User();
        $user->setRole($this->getReference('role-teacher'));
        $user->setName('DocenteITD');
        $user->setSurname('DocenteITD');
        $user->setSchool('DocenteITD');
        $user->setBirthDate('01/01/1970');
        $user->setSex(0);
        $user->setUsername('docenteitd');
        $user->setEmail('docenteitd@gmail.com');

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $user->setPassword($encoder->encodePassword('docenteitd', $user->getSalt()));

        $manager->persist($user);
        $manager->flush();

        for($i=0; $i<=60; $i++)
        {
            $user = new User();
            $user->setRole($this->getReference('role-teacher'));
            $user->setName('Docente-' . $i);
            $user->setSurname('Docente-' . $i);
            $user->setSchool('Docente-' . $i);
            $user->setBirthDate('01/01/1970');
            $user->setSex(0);
            $user->setUsername('docente-' . $i);
            $user->setEmail('docente-' . $i . '@gmail.com');

            $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
            $user->setPassword($encoder->encodePassword('docente-' . $i, $user->getSalt()));

            $manager->persist($user);
            $manager->flush();
        }

        for($i=0; $i<=60; $i++)
        {
            $user = new User();
            $user->setRole($this->getReference('role-student'));
            $user->setName('Studente-' . $i);
            $user->setSurname('Studente-' . $i);
            $user->setSchool('Studente-' . $i);
            $user->setBirthDate('01/01/1970');
            $user->setSex(0);
            $user->setUsername('studente-' . $i);
            $user->setEmail('studente-' . $i . '@gmail.com');
            $user->setTeacherEmail('docenteitd@gmail.com');

            $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
            $user->setPassword($encoder->encodePassword('studente-' . $i, $user->getSalt()));

            $manager->persist($user);
            $manager->flush();
        }
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }
}