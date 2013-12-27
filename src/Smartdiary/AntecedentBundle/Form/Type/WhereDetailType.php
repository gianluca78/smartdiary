<?php
namespace Smartdiary\AntecedentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WhereDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('antecedentWhereId', 'hidden')
            ->add('antecedentWhereDetail', 'textarea', array(
                'label' => 'Dove mi trovavo?',
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'antecedent_where_detail';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('antecedent-where-detail')
        ));
    }
}