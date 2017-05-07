<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\UserBundle\Repository;

use Acme\UserBundle\Entity\ueGrp;
use Doctrine\ORM\EntityRepository;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog ueGrp information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class ueGrpRepository extends EntityRepository
{
    public function findLatest($limit = ueGrp::NUM_ITEMS)
    {
        return $this
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.publishedAt <= :now')->setParameter('now', new \DateTime())
            ->orderBy('p.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function findGrpsByueGrpId($ueId)
    {
        return $this
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.ue = :ueGrpId')
            ->setParameter('ueGrpId', $ueId)
            ->orderBy('p.publishedAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function nextueGrpCt($currentPid)
    {
        return $this->createQueryBuilder('p')
                    ->select('COUNT(p)')
                    ->where('p.ue = :pid')->setParameter('pid', $currentPid)
                    ->getQuery()
                    ->getSingleScalarResult();
    }

    public function currentueGrp($currentPid)
    {
        return $this
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.id = :pid')->setParameter('pid', $currentPid)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
    public function nextGrpCtueGrpId($ueId, $page)
    {
        return $this->createQueryBuilder('p')
         ->select('COUNT(p)')
         ->where('p.ue = :ueid')->setParameter('ueid', $ueId)
            ->andwhere('p.grp > :page')->setParameter('page', $page)
         ->getQuery()
         ->getSingleScalarResult();
    }
    
    public function nextGrpueGrpId($ue, $page)
    {
        return $this
            ->createQueryBuilder('p')
            ->select('p.id')
            ->where('p.ue = :ue')->setParameter('ue', $ue)
            ->andwhere('p.grp > :page')->setParameter('page', $page)
            ->orderBy('p.grp', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleScalarResult();
    }
    
    public function ueIdByueGrpId($ueGrpId)
    {
        return $this
            ->createQueryBuilder('p')
            ->join('p.ue', 'ps')
            ->addSelect('ps')
            ->where('p.id = :ueGrpid')->setParameter('ueGrpid', $ueGrpId)
            ->setMaxResults(1)
            ->getQuery()
            ->getScalarResult();
    }
    
    //affiche les grp à partir des ue
    public function findGrpByUe($ue)
    {
        //return 0;
        
        return $this
            ->createQueryBuilder('p')
            ->join('p.grp', 'g')
            ->addSelect('g')
            ->where('p.ue = :ue')->setParameter('ue', $ue)
            ->orderBy('p.publishedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
