<?php

namespace Marca\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CourseType extends AbstractType
{
     
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('term','entity', array('class'=>'MarcaCourseBundle:Term', 'property'=>'termName', ))
            ->add('parents','entity', array('class'=> 'MarcaCourseBundle:Course', 'property'=>'name', 'expanded'=>false,'multiple'=>true,'required' => false,))     
            ->add('time', 'time', array('widget' => 'single_text')) 
            ->add('enroll','checkbox', array('label'  => 'Allow students to enroll','attr' => array('class' => 'checkbox inline'),))
            ->add('post', 'checkbox', array('label'  => 'Allow student to post documents','attr' => array('class' => 'checkbox inline'),))
            ->add('multicult', 'hidden') 
            ->add('studentForum', 'checkbox', array('label'  => 'Allow student to start Forum  threads','attr' => array('class' => 'checkbox inline'),))
            ->add('notes', 'hidden')
            ->add('forum', 'checkbox', array('label'  => 'Use the Forum','attr' => array('class' => 'checkbox inline'),))  
            ->add('journal', 'checkbox', array('label'  => 'Use the Journal','attr' => array('class' => 'checkbox inline'),))
            ->add('portfolio', 'checkbox', array('label'  => 'Use the Portfolio','attr' => array('class' => 'checkbox inline'),))
            ->add('portset','entity', array('class'=>'MarcaPortfolioBundle:Portset', 'property'=>'name','expanded'=>false,'multiple'=>false, 'label' => 'Select the Portfolio Set',)) 
            ->add('zine', 'hidden')
            ->add('portStatus', 'hidden')
            ->add('tagset','entity', array('class'=>'MarcaTagBundle:Tagset', 'property'=>'name','expanded'=>true,'multiple'=>true, 'label' => 'Select tag sets for Projects','attr' => array('class' => 'checkbox'),)) 
                
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Marca\CourseBundle\Entity\Course'
        ));
    }

    public function getName()
    {
        return 'marca_coursebundle_coursetype';
    }
}
