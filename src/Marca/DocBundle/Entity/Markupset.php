<?php

namespace Marca\DocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marca\DocBundle\Entity\Markupset
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Marca\DocBundle\Entity\MarkupsetRepository")
 */
class Markupset
{
    
    const LOCAL=0;
    const SHARED=1;
    
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
    * @ORM\ManyToOne(targetEntity="Marca\UserBundle\Entity\User", inversedBy="tag")
    */
    protected $user;   
       
   /**
    * @ORM\ManyToMany(targetEntity="Marca\DocBundle\Entity\Markup", mappedBy="markupset")
    */
    protected $markup; 
    
    /**
     * @var integer $shared
     *
     * @ORM\Column(name="shared", type="integer", nullable=true)
     */
    private $shared=0;      
    
    /**
     * Inverse Side
     *
     * @ORM\ManyToMany(targetEntity="Marca\CourseBundle\Entity\Course", mappedBy="tagset")
    */
    private $course;

    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Markupset
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
      
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->markup = new \Doctrine\Common\Collections\ArrayCollection();
        $this->course = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set shared
     *
     * @param integer $shared
     * @return Markupset
     */
    public function setShared($shared)
    {
        $this->shared = $shared;
    
        return $this;
    }

    /**
     * Get shared
     *
     * @return integer 
     */
    public function getShared()
    {
        return $this->shared;
    }

    /**
     * Set user
     *
     * @param Marca\UserBundle\Entity\User $user
     * @return Markupset
     */
    public function setUser(\Marca\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Marca\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add markup
     *
     * @param Marca\DocBundle\Entity\Markup $markup
     * @return Markupset
     */
    public function addMarkup(\Marca\DocBundle\Entity\Markup $markup)
    {
        $this->markup[] = $markup;
    
        return $this;
    }

    /**
     * Remove markup
     *
     * @param Marca\DocBundle\Entity\Markup $markup
     */
    public function removeMarkup(\Marca\DocBundle\Entity\Markup $markup)
    {
        $this->markup->removeElement($markup);
    }

    /**
     * Get markup
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMarkup()
    {
        return $this->markup;
    }

    /**
     * Add course
     *
     * @param Marca\CourseBundle\Entity\Course $course
     * @return Markupset
     */
    public function addCourse(\Marca\CourseBundle\Entity\Course $course)
    {
        $this->course[] = $course;
    
        return $this;
    }

    /**
     * Remove course
     *
     * @param Marca\CourseBundle\Entity\Course $course
     */
    public function removeCourse(\Marca\CourseBundle\Entity\Course $course)
    {
        $this->course->removeElement($course);
    }

    /**
     * Get course
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCourse()
    {
        return $this->course;
    }
    
    public function isOwner($user)
    {
        if($user == $this->user){
            return true;
        }
        else{
            return false;
        }
    }  
    
}