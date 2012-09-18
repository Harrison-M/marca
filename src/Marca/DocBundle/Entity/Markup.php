<?php

namespace Marca\DocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marca\DocBundle\Entity\Markup
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Marca\DocBundle\Entity\MarkupRepository")
 */
class Markup
{
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
     * @var string $function
     *
     * @ORM\Column(name="function", type="string", length=255)
     */
    private $function = 'markup';

    /**
     * @var string $value
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;
    
    /**
     * @var string $color
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;    

   /**
    * @ORM\ManyToMany(targetEntity="Marca\DocBundle\Entity\Markupset", inversedBy="markup")
    */
    protected $markupset; 

    /**
    * @ORM\ManyToOne(targetEntity="Marca\UserBundle\Entity\User", inversedBy="markup")
    */
    protected $user;   
    

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set function
     *
     * @param string $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * Get function
     *
     * @return string 
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set color
     *
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }
    
    /**
     * Set user
     *
     * @param Marca\UserBundle\Entity\User $user
     */
    public function setUser(\Marca\UserBundle\Entity\User $user)
    {
        $this->user = $user;
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
     * Constructor
     */
    public function __construct()
    {
        $this->markupset = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add markupset
     *
     * @param Marca\DocBundle\Entity\Markupset $markupset
     * @return Markup
     */
    public function addMarkupset(\Marca\DocBundle\Entity\Markupset $markupset)
    {
        $this->markupset[] = $markupset;
    
        return $this;
    }

    /**
     * Remove markupset
     *
     * @param Marca\DocBundle\Entity\Markupset $markupset
     */
    public function removeMarkupset(\Marca\DocBundle\Entity\Markupset $markupset)
    {
        $this->markupset->removeElement($markupset);
    }

    /**
     * Get markupset
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMarkupset()
    {
        return $this->markupset;
    }
}