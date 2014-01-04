<?php
namespace Smartdiary\BehaviorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BehaviorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('behavior', 'textarea', array(
                'label' => 'Come ho reagito?',
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'behavior';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('behavior')
        ));
    }
}