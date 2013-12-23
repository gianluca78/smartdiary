<?php
namespace Smartdiary\UserBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('username')
            ->add('email')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'I campi della password non coincidono',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Ripeti la password'),
            ))
            ->add('role', 'entity', array(
                'class' => 'SmartdiaryUserBundle:Role',
                'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.description', 'ASC');
                    },
                'label' => 'Ruolo'
            ))
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'user';
    }
}