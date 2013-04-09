<?php

namespace Marca\NoteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * NoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NoteRepository extends EntityRepository
{
    public function findNotes($user, $course)
    {  
       return $this->getEntityManager()
               ->createQuery('SELECT n from MarcaNoteBundle:Note n WHERE n.user = ?1 AND n.course = ?2 ORDER BY n.updated DESC')
               ->setParameters(array('1' => $user, '2' => $course))->getResult();
    }
}