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
 * Sort is not currently working; need to refactor the join
 */
   public function findFilesByProject($project, $user, $scope, $course, $tag)
    {
       if($scope == 'all') {$scopeQuery = ' or f.access = 1';}
       else {$scopeQuery = '';};
       if($project == 'recent') {
         return $this->getEntityManager()
            ->createQuery('SELECT f FROM MarcaFileBundle:File f WHERE f.course = ?1 AND (f.user = ?2'.$scopeQuery.') ORDER BY f.updated ASC')
                ->setParameter('1',$course)->setParameter('2',$user)->setMaxResults(25)->getResult(); 
       } else {
          return $this->getEntityManager()
            ->createQuery('SELECT f FROM MarcaFileBundle:File f WHERE f.project = ?1 AND f.course = ?2 AND (f.user = ?3'.$scopeQuery.') ORDER BY f.name ASC')
                ->setParameter('1',$project)->setParameter('2',$course)->setParameter('3',$user)->setMaxResults(25)->getResult();
       };

    }

    
   public function findFilesByTag($project, $user, $scope, $course, $tag)
    {
       if($scope == 'all') {$scopeQuery = ' or f.access = 1';}
       else {$scopeQuery = '';};
       if($tag == '0') {
         return $this->getEntityManager()
            ->createQuery('SELECT f FROM MarcaFileBundle:File f WHERE f.course = ?1 AND (f.user = ?2'.$scopeQuery.') ORDER BY f.name ASC')
                ->setParameter('1',$course)->setParameter('2',$user)->setMaxResults(25)->getResult(); 
       } else {
          return $this->getEntityManager()
            ->createQuery('SELECT f FROM MarcaFileBundle:File f JOIN f.tag t WHERE t.id = ?1 AND f.course = ?2 AND (f.user = ?3'.$scopeQuery.') ORDER BY f.name ASC')
                ->setParameter('1',$tag)->setParameter('2',$course)->setParameter('3',$user)->setMaxResults(25)->getResult();
       };

    }    
}