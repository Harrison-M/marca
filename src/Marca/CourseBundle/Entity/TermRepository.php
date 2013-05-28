<?php

namespace Marca\CourseBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TermRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TermRepository extends EntityRepository
{
       public function findDefault(){
        return $this->getEntityManager()
                ->createQuery('SELECT t from MarcaCourseBundle:Term t  WHERE t.status = 1')->setMaxResults(1)->getSingleResult();
    } 
}