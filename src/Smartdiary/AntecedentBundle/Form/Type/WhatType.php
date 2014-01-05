<?php
namespace Smartdiary\AntecedentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WhatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('antecedentWhat', 'textarea', array(
                'label' => 'Cosa stavi facendo o pensando prima di provare disagio?',
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'antecedent_what';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('antecedent-what')
        ));
    }
}