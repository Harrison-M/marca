<?php

namespace Marca\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Marca\CourseBundle\Entity\Course
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Marca\CourseBundle\Entity\CourseRepository")
 */
class Course
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
    * @ORM\ManyToOne(targetEntity="Term", inversedBy="course")
    */
    protected $term;
    
    /**
    * @ORM\ManyToOne(targetEntity="Marca\UserBundle\Entity\User", inversedBy="course")
    */
    protected $user;    

    /**
     * @var time $time
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var boolean $enroll
     *
     * @ORM\Column(name="enroll", type="boolean")
     */
    private $enroll = true;

    /**
     * @var boolean $post
     *
     * @ORM\Column(name="post", type="boolean")
     */
    private $post = true;
   
    /**
    * @ORM\ManyToOne(targetEntity="Marca\PortfolioBundle\Entity\Portset", inversedBy="course")
    */
    protected $portset;   

    /**
     * @var boolean $multicult
     *
     * @ORM\Column(name="multicult", type="boolean")
     */
    private $multicult = false;


    /**
     * @var integer $parentId
     *
     * @ORM\Column(name="parentId", type="integer")
     */
    private $parentId = 1;

    /**
     * @var integer $assessmentId
     *
     * @ORM\Column(name="assessmentId", type="integer")
     */
    private $assessmentId = 1;

    /**
     * @var boolean $studentForum
     *
     * @ORM\Column(name="studentForum", type="boolean")
     */
    private $studentForum;

    /**
     * @var boolean $notes
     *
     * @ORM\Column(name="notes", type="boolean")
     */
    private $notes = true;
    
    /**
     * @var boolean $forum
     *
     * @ORM\Column(name="forum", type="boolean")
     */
    private $forum = true;    

    /**
     * @var boolean $journal
     *
     * @ORM\Column(name="journal", type="boolean")
     */
    private $journal = true;

    /**
     * @var boolean $portfolio
     *
     * @ORM\Column(name="portfolio", type="boolean")
     */
    private $portfolio = true;

    /**
     * @var boolean $zine
     *
     * @ORM\Column(name="zine", type="boolean")
     */
    private $zine = false;

    /**
     * @var text $announcement
     *
     * @ORM\Column(name="announcement", type="text", nullable=true)
     */
    private $announcement = 'Welcome';

    /**
     * @var boolean $portStatus
     *
     * @ORM\Column(name="portStatus", type="boolean")
     */
    private $portStatus = 1;
    
    /**
     * @ORM\OneToOne(targetEntity="Marca\CourseBundle\Entity\Project")
     * @ORM\JoinColumn(name="projectDefault_id", onDelete="CASCADE")
     * 
     */
    private $projectDefault;     
  
    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="course")
     */
    protected $projects;
    
    /**
     * @ORM\OneToMany(targetEntity="Roll", mappedBy="course")
     */
    protected $roll;

    public function __construct()
    {
        $this->roll = new ArrayCollection();
        $this->tagset = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->projectDefault = new ArrayCollection();
    } 
    
   /**
     * @ORM\ManyToMany(targetEntity="Marca\TagBundle\Entity\Tagset")
     * @ORM\JoinTable(name="course_tagset",
     *      joinColumns={@ORM\JoinColumn(name="Course_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Tagset_id", referencedColumnName="id")})
    */
    protected $tagset; 

    /**
    * @ORM\Column(type="datetime", nullable=true)
    * @Gedmo\Timestampable(on="create")
    */
    protected $created;
    
    
    /**
    * @ORM\Column(type="datetime", nullable=true)
    * @Gedmo\Timestampable(on="update")
    */
    protected $updated;
    

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
     * Set time
     *
     * @param time $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * Get time
     *
     * @return time 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set enroll
     *
     * @param boolean $enroll
     */
    public function setEnroll($enroll)
    {
        $this->enroll = $enroll;
    }

    /**
     * Get enroll
     *
     * @return boolean 
     */
    public function getEnroll()
    {
        return $this->enroll;
    }

    /**
     * Set post
     *
     * @param boolean $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return boolean 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set multicult
     *
     * @param boolean $multicult
     */
    public function setMulticult($multicult)
    {
        $this->multicult = $multicult;
    }

    /**
     * Get multicult
     *
     * @return boolean 
     */
    public function getMulticult()
    {
        return $this->multicult;
    }

    /**
     * Set projectDefaultId
     *
     * @param integer $projectDefaultId
     */
    public function setProjectDefaultId($projectDefaultId)
    {
        $this->projectDefaultId = $projectDefaultId;
    }

    /**
     * Get projectDefaultId
     *
     * @return integer 
     */
    public function getProjectDefaultId()
    {
        return $this->projectDefaultId;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set assessmentId
     *
     * @param integer $assessmentId
     */
    public function setAssessmentId($assessmentId)
    {
        $this->assessmentId = $assessmentId;
    }

    /**
     * Get assessmentId
     *
     * @return integer 
     */
    public function getAssessmentId()
    {
        return $this->assessmentId;
    }

    /**
     * Set studentForum
     *
     * @param boolean $studentForum
     */
    public function setStudentForum($studentForum)
    {
        $this->studentForum = $studentForum;
    }

    /**
     * Get studentForum
     *
     * @return boolean 
     */
    public function getStudentForum()
    {
        return $this->studentForum;
    }

    /**
     * Set notes
     *
     * @param boolean $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Get notes
     *
     * @return boolean 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set journal
     *
     * @param boolean $journal
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;
    }

    /**
     * Get journal
     *
     * @return boolean 
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Set portfolio
     *
     * @param boolean $portfolio
     */
    public function setPortfolio($portfolio)
    {
        $this->portfolio = $portfolio;
    }

    /**
     * Get portfolio
     *
     * @return boolean 
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * Set zine
     *
     * @param boolean $zine
     */
    public function setZine($zine)
    {
        $this->zine = $zine;
    }

    /**
     * Get zine
     *
     * @return boolean 
     */
    public function getZine()
    {
        return $this->zine;
    }

    /**
     * Set announcement
     *
     * @param text $announcement
     */
    public function setAnnouncement($announcement)
    {
        $this->announcement = $announcement;
    }

    /**
     * Get announcement
     *
     * @return text 
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }

    /**
     * Set portStatus
     *
     * @param boolean $portStatus
     */
    public function setPortStatus($portStatus)
    {
        $this->portStatus = $portStatus;
    }

    /**
     * Get portStatus
     *
     * @return boolean 
     */
    public function getPortStatus()
    {
        return $this->portStatus;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set term
     *
     * @param Marca\CourseBundle\Entity\Term $term
     */
    public function setTerm(\Marca\CourseBundle\Entity\Term $term)
    {
        $this->term = $term;
    }

    /**
     * Get term
     *
     * @return Marca\CourseBundle\Entity\Term 
     */
    public function getTerm()
    {
        return $this->term;
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
     * Add roll
     *
     * @param Marca\CourseBundle\Entity\Roll $roll
     */
    public function addRoll(\Marca\CourseBundle\Entity\Roll $roll)
    {
        $this->roll[] = $roll;
    }

    /**
     * Get roll
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRoll()
    {
        return $this->roll;
    }

    /**
     * Add project
     *
     * @param Marca\CourseBundle\Entity\Project $project
     */
    public function addProject(\Marca\CourseBundle\Entity\Project $project)
    {
        $this->projects[] = $project;
    }

    /**
     * Get project
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set forum
     *
     * @param boolean $forum
     */
    public function setForum($forum)
    {
        $this->forum = $forum;
    }

    /**
     * Get forum
     *
     * @return boolean 
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * Add tagset
     *
     * @param Marca\TagBundle\Entity\Tagset $tagset
     */
    public function addTagset(\Marca\TagBundle\Entity\Tagset $tagset)
    {
        $this->tagset[] = $tagset;
    }

    /**
     * Get tagset
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTagset()
    {
        return $this->tagset;
    }

    /**
     * Set projectDefault
     *
     * @param Marca\CourseBundle\Entity\Project $projectDefault
     */
    public function setProjectDefault(\Marca\CourseBundle\Entity\Project $projectDefault)
    {
        $this->projectDefault = $projectDefault;
    }

    /**
     * Get projectDefault
     *
     * @return Marca\CourseBundle\Entity\Project 
     */
    public function getProjectDefault()
    {
        return $this->projectDefault;
    }
    
    /**
     *Get projectsInSortOrder - returns the course's projects in sort order
     * @return array 
     */
    public function getProjectsInSortOrder()
    {
        $project_array = $this->projects->toArray();
        usort($project_array, array("Marca\CourseBundle\Entity\Project","cmp_sortOrder"));
        return $project_array;
    }
    
    public function getOwnerFirstName(){
        return $this->getUser()->getFirstname();
    }
    
    public function getOwnerLastName(){
        return $this->getUser()->getLastname();
    }
    
    

    /**
     * Set portset
     *
     * @param Marca\PortfolioBundle\Entity\Portset $portset
     */
    public function setPortset(\Marca\PortfolioBundle\Entity\Portset $portset)
    {
        $this->portset = $portset;
    }

    /**
     * Get portSet
     *
     * @return Marca\PortfolioBundle\Entity\Portset 
     */
    public function getPortset()
    {
        return $this->portset;
    }
}