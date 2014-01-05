<?php
namespace Smartdiary\AlternativePositiveThoughtBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class APTType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
            ->add('apt', 'textarea', array(
                'label' => 'E\' più utile pensare che',
                )
            )
            ->add('index', 'hidden', array(
                'mapped' => false
            ))
            ->add('Salva', 'submit');
    }

    public function getName()
    {
        return 'apt';
    }

}