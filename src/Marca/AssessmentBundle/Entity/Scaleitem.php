<?php

namespace Marca\AssessmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scaleitem
 *
 * @ORM\Table(name="scaleitem")
 * @ORM\Entity(repositoryClass="Marca\AssessmentBundle\Entity\ScaleitemRepository")
 */
class Scaleitem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

    /**
    * @ORM\ManyToOne(targetEntity="Marca\AssessmentBundle\Entity\Scale", inversedBy="scaleitems")
    */
    protected $scale;     

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
     * @return Scaleitem
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
     * Set value
     *
     * @param integer $value
     * @return Scaleitem
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set scale
     *
     * @param \Marca\AssessmentBundle\Entity\Scale $scale
     * @return Scaleitem
     */
    public function setScale(\Marca\AssessmentBundle\Entity\Scale $scale = null)
    {
        $this->scale = $scale;
    
        return $this;
    }

    /**
     * Get scale
     *
     * @return \Marca\AssessmentBundle\Entity\Scale 
     */
    public function getScale()
    {
        return $this->scale;
    }
}