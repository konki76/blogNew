<?php
namespace Acme\UserBundle\Services;

use Acme\UserBundle\Entity\UE;
 use Doctrine\ORM\EntityManager;

 class slugToUe
 {
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
