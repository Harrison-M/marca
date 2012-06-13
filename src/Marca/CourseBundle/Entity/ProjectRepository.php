<?php

namespace Marca\CourseBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectRepository extends EntityRepository
{
  public function findProjectsByCourse($course)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p.name,p.id from MarcaCourseBundle:Project p WHERE p.course = ?1 ORDER BY p.name')->setParameter('1',$course)->getResult();
    }
     
    
    //finds a project in a given course matching a particular sort order
    public function findProjectBySortOrder($course, $sortorder)
    {
        return $this->getEntityManager()->createQuery('SELECT p from MarcaCourseBundle:Project p WHERE p.course = ?1 AND p.sortOrder = ?2')->setParameter('1', $course)->setParameter('2', $sortorder)->getSingleResult();
    }
    
}
