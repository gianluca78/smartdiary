<?php
namespace Smartdiary\ConsequenceBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SensationDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('sensationId', 'hidden')
            ->add('sensationLabel', 'hidden', array(
                'mapped' => false
            ))
            ->add('strenght', null, array(
                'label' => 'Intensità',
                'attr' => array(
                    'value' => 0
                ),
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'sensation_detail';
    }
}