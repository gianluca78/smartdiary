<?php
namespace Smartdiary\SmartdiaryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserProblematicSituationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('title', null, array(
                'label' => 'Titolo'
                )
            )
            ->add('description', 'textarea', array(
                'label' => 'Descrizione situazione problema',
                )
            )
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'user_problematic_situation';
    }

}