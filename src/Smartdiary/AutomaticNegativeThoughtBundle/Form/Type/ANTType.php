<?php
namespace Smartdiary\AutomaticNegativeThoughtBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ANTType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('ant', 'textarea', array(
                'label' => 'Il mio pensiero dannoso',
                )
            )
            ->add('strenght', null, array(
                'label' => 'Intensità',
                'attr' => array(
                    'min' => 0,
                    'max' => 100,
                    'value' => 0,
                ),
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'ant';
    }

}