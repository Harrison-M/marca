<?php

namespace Marca\PortfolioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PortsetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PortsetRepository extends EntityRepository
{
    
   public function findDefault(){
        return $this->getEntityManager()
                ->createQuery('SELECT p from MarcaPortfolioBundle:Portset p  WHERE p.shared = 2')->getSingleResult();
    }   
}