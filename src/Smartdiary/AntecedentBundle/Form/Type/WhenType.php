<?php
namespace Smartdiary\AntecedentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WhenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('antecedentWhen', 'textarea', array(
                'label' => 'Quando è successo?',
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'antecedent_when';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('antecedent-when')
        ));
    }
}