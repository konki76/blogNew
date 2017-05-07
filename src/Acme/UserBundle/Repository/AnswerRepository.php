<?php

/*
 *
 *
 */

namespace Acme\UserBundle\Repository;

use Acme\UserBundle\Entity\Answer;
use Doctrine\ORM\EntityRepository;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog qcm information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class AnswerRepository extends EntityRepository
{
    public function findOneByGrpUserQcm($grp, $user, $qcm)
    {
        return $q = $this
            ->createQueryBuilder('a')
            ->where('a.authorEmail = :user')->setParameter('user', $user->getEmail())
            ->andwhere('a.grp = :grp')->setParameter('grp', $grp)
            ->andwhere('a.qcm = :ps')->setParameter('ps', $qcm)
            ->getQuery()
            ->getScalarResult();
    }
    
    
    public function findOneByGrpUser($grp, $user)
    {
        return $q = $this
            ->createQueryBuilder('a')
            ->where('a.authorEmail = :user')->setParameter('user', $user->getEmail())
            ->andwhere('a.grp = :grp')->setParameter('grp', $grp)
            ->getQuery()
            ->getScalarResult();
    }
    
    //a deporter dans un repository
    public function findAnswsersByQcmId($qcmId)
    {
        return $this
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.id = :qcmId')->setParameter('qcmId', $qcmId)
            ->getQuery()
            ->getResult()
        ;
    }
    
    //Calcul les réponses par rapport à la table qcm
    public function statByGrpUser($grp, $user)
    {
        return $this
            ->createQueryBuilder('a')
            ->leftJoin('a.qcm', 'ps')
            ->addSelect('ps')
            ->where('a.authorEmail = :user')->setParameter('user', $user)
            ->andwhere('a.grp = :grp')->setParameter('grp', $grp)
            ->getQuery()
            ->getScalarResult();
        /*
        return $this
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.authorEmail = :user')->setParameter('user', $user)
            ->getQuery()
            ->getResult();*/
    }
}
