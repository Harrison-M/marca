<?php

namespace Marca\FileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UploadType extends AbstractType
{
    protected $options;

     public function __construct (array $options)
     {
        $this->options = $options;
     }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options = $this->options;
        $builder
             ->add('file') 
             ->add('name','text', array('attr' => array('class' => 'width30'),))
             ->add('project', 'entity', array('class' => 'MarcaCourseBundle:Project','property'=>'name','query_builder' => 
                function(\Marca\CourseBundle\Entity\ProjectRepository $er) use ($options) {
                $courseid = $options['courseid'] ;
                $resource = $options['resource'] ;
                return $er->createQueryBuilder('p')
                ->where('p.course = :course')
                ->andWhere('p.resource = :resource')        
                ->setParameter('course', $courseid)  
                ->setParameter('resource', $resource)       
                ->orderBy('p.name', 'ASC');}, 'expanded'=>true,'multiple'=>false,'label'  => 'Select', 'attr' => array('class' => 'inline'),)) 
             ->add('tag', 'entity', array('class' => 'MarcaTagBundle:Tag','property'=>'name','query_builder' => 
                  function(\Marca\TagBundle\Entity\TagRepository $er) use ($options) {
                  $courseid = $options['courseid'] ;  
                  return $er->createQueryBuilder('t')
                        ->join("t.tagset", 's')
                        ->join("s.course", 'c')
                        ->where('c.id = :course')
                        ->setParameter('course', $courseid)        
                        ->orderBy('c.name', 'ASC');
                }, 'expanded'=>true,'multiple'=>true, 'label'  => 'Labels', 'attr' => array('class' => 'checkbox'),
              ))  
             ->add('access', 'choice', array('choices'   => array('0' => 'Private', '1' => 'Shared'),'required'  => true, 'expanded'=>true,'multiple'=>false,'label'  => 'Sharing', 'expanded' => true,'attr' => array('class' => 'inline'),))                      
            ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Marca\FileBundle\Entity\File'
        ));
    }

    public function getName()
    {
        return 'marca_filebundle_filetype';
    }
}
