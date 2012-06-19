<?php

namespace Marca\TagBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TagType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('color')
            ->add('tagset','entity', array('class'=>'MarcaTagBundle:Tagset', 'property'=>'name','expanded'=>true,'multiple'=>true,'attr' => array('class' => 'checkbox inline'), ))     
            ->add('icon', 'choice', array('choices'   => array('s' => 'Star', 'f' => 'Flag'),'expanded'=>true, 'required'  => false,'attr' => array('class' => 'radio inline'),))    

        ;
    }

    public function getName()
    {
        return 'marca_tagbundle_tagtype';
    }
}
