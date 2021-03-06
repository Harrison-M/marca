<?php

namespace Marca\AdminBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Institution
 *
 * @ORM\Table(name="institution")
 * @ORM\Entity(repositoryClass="Marca\AdminBundle\Entity\InstitutionRepository")
 */
class Institution
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
     * @ORM\Column(name="payment_type", type="integer")
     */
    private $payment_type;

    /**
     * @var integer
     *
     * @ORM\Column(name="semester_price", type="integer")
     */
    private $semester_price;

    /**
    +     * @var boolean $research
    +     *
    +     * @ORM\Column(name="research", type="boolean", nullable=true)
    +     */
    private $research = false;

    /**
     * @ORM\OneToMany(targetEntity="Marca\UserBundle\Entity\User", mappedBy="institution", cascade={"persist"})
     */
    protected $users;
    
    /**
     * @ORM\OneToMany(targetEntity="Marca\CourseBundle\Entity\Course", mappedBy="institution", cascade={"persist"})
     */
    protected $courses;
    
    /**
     * @ORM\OneToMany(targetEntity="Marca\CourseBundle\Entity\Term", mappedBy="institution", cascade={"persist"})
     */
    protected $terms;
    
    public function __construct() {
        $this->users = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->terms = new ArrayCollection();
    }


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
     * @return Institution
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
     * Set payment_type
     *
     * @param integer $paymentType
     * @return Institution
     */
    public function setPaymentType($paymentType)
    {
        $this->payment_type = $paymentType;
    
        return $this;
    }

    /**
     * Get payment_type
     *
     * @return integer 
     */
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * Set semester_price
     *
     * @param integer $semesterPrice
     * @return Institution
     */
    public function setSemesterPrice($semesterPrice)
    {
        $this->semester_price = $semesterPrice;
    
        return $this;
    }

    /**
     * Get semester_price
     *
     * @return integer 
     */
    public function getSemesterPrice()
    {
        return $this->semester_price;
    }

    /**
     * Add users
     *
     * @param \Marca\UserBundle\Entity\User $users
     * @return Institution
     */
    public function addUser(\Marca\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Marca\UserBundle\Entity\User $users
     */
    public function removeUser(\Marca\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add courses
     *
     * @param \Marca\CourseBundle\Entity\Course $courses
     * @return Institution
     */
    public function addCourse(\Marca\CourseBundle\Entity\Course $courses)
    {
        $this->courses[] = $courses;
    
        return $this;
    }

    /**
     * Remove courses
     *
     * @param \Marca\CourseBundle\Entity\Course $courses
     */
    public function removeCourse(\Marca\CourseBundle\Entity\Course $courses)
    {
        $this->courses->removeElement($courses);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Add terms
     *
     * @param \Marca\CourseBundle\Entity\Term $terms
     * @return Institution
     */
    public function addTerm(\Marca\CourseBundle\Entity\Term $terms)
    {
        $this->terms[] = $terms;
    
        return $this;
    }

    /**
     * Remove terms
     *
     * @param \Marca\CourseBundle\Entity\Term $terms
     */
    public function removeTerm(\Marca\CourseBundle\Entity\Term $terms)
    {
        $this->terms->removeElement($terms);
    }

    /**
     * Get terms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set research
     *
     * @param boolean $research
     * @return Institution
     */
    public function setResearch($research)
    {
        $this->research = $research;
    
        return $this;
    }

    /**
     * Get research
     *
     * @return boolean 
     */
    public function getResearch()
    {
        return $this->research;
    }
}