<?php
namespace Acme\UserBundle\Services;
 use Doctrine\ORM\EntityManager;
use Acme\UserBundle\Entity\UE;
class slugToUe {
    
    public function __construct()
    {
    }
    
    public function getUeBySlug($ueSlug) 
    {
        return $this
            ->createQueryBuilder('p')
            ->where('p.slug = :ueSlug')->setParameter('ueSlug', $ueSlug)
            ->getQuery()
            ->getResult();
	}
 
}

