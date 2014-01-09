<?php
namespace Smartdiary\EmotionRevaluationBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmotionRevaluationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('strenghtRevaluation', null, array(
                'label' => 'Intensità (0-100)',
                'attr' => array(
                    'value' => 0
                ),
                ))
            ->add('index', 'hidden', array(
                'mapped' => false
            ))
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'emotion_revaluation';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('emotion-revaluation'),
        ));
    }
}