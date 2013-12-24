<?php
namespace Smartdiary\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class WhenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('name', null, array(
                'label' => 'Nome'
            ))
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'user';
    }
}