<?php
namespace Smartdiary\AntecedentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WhoDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('antecedentWhoId', 'hidden')
            ->add('antecedentWhoDetail', 'textarea', array(
                'label' => 'Con chi ero?',
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'antecedent_who_detail';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('antecedent-who-detail')
        ));
    }
}