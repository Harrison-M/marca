<?php

namespace Marca\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RollType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('userid')
            ->add('role')
            ->add('status')
        ;
    }

    public function getName()
    {
        return 'marca_coursebundle_rolltype';
    }
}
