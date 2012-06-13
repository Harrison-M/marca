<?php

namespace Marca\FileBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FileRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FileRepository extends EntityRepository
{
/**
 * First conditional catches sort order by name, project, tag or updated
 * Second conditional catches Recent Files listing (with no associated project defined so it can be omitted from seach.
 */
   public function findFilesByProject($project, $user, $sort, $scope, $course)
    {
       
       if($sort == 'name') {$sortOrder = 'f.name ASC';}
       elseif ($sort == 'tag') {$sortOrder = 't.name ASC';}
       elseif ($sort == 'project') {$sortOrder = 'p.name ASC';}
       elseif ($sort == 'owner') {$sortOrder = 'u.lastname,u.firstname ASC';}
       else {$sortOrder = 'f.updated DESC';};
       if($scope == 'all') {$scopeQuery = ' or f.access = 1';}
       else {$scopeQuery = '';};
       if($project == 'recent') {
         return $this->getEntityManager()
            ->createQuery('SELECT f.id,f.name,f.updated,d.id AS docid,p.name as project,t.name as tag, u.lastname, u.firstname, f.access
                FROM MarcaFileBundle:File f LEFT JOIN f.doc d LEFT JOIN f.project p LEFT JOIN f.tag t LEFT JOIN f.user u 
                WHERE f.course = ?1 AND (f.user = ?2'.$scopeQuery.')
                ORDER BY '.$sortOrder)
                ->setParameter('1',$course)->setParameter('2',$user)->setMaxResults(25)->getResult(); 
       } else {
          return $this->getEntityManager()
            ->createQuery('SELECT f.id,f.name,f.updated,d.id AS docid,p.name as project,t.name as tag, u.lastname, u.firstname, f.access
                FROM MarcaFileBundle:File f LEFT JOIN f.doc d LEFT JOIN f.project p LEFT JOIN f.tag t LEFT JOIN f.user u
                WHERE f.project = ?1 AND f.course = ?2 AND (f.user = ?3'.$scopeQuery.')
                ORDER BY '.$sortOrder)
                ->setParameter('1',$project)->setParameter('2',$course)->setParameter('3',$user)->setMaxResults(25)->getResult();
       };

    }
     
      
}