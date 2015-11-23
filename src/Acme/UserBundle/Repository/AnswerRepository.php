<?php

/*
 *
 *
 */

namespace Acme\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Acme\UserBundle\Entity\Answer;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog post information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class AnswerRepository extends EntityRepository
{
	
	public function findOneByGrpUserPost($grp,$user,$post)
	{
		return $q = $this
			->createQueryBuilder('a')
			->where('a.authorEmail = :user')->setParameter('user', $user->getEmail())
			->andwhere('a.grp = :grp')->setParameter('grp', $grp)
			->andwhere('a.post = :ps')->setParameter('ps', $post)
			->getQuery()
			->getScalarResult();
	}
	
	
	public function findOneByGrpUser($grp,$user)
	{
		return $q = $this
			->createQueryBuilder('a')
			->where('a.authorEmail = :user')->setParameter('user', $user->getEmail())
			->andwhere('a.grp = :grp')->setParameter('grp', $grp)
			->getQuery()
			->getScalarResult();
	}
	
	//a deporter dans un repository
	public function findAnswsersByPostId($postId)
    {
        return $this
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.id = :postId')->setParameter('postId', $postId)
            ->getQuery()
            ->getResult()
        ;
    }
	
	//Calcul les réponses par rapport à la table post
	public function statByGrpUser($grp, $user)
    {
        return $this
            ->createQueryBuilder('a')
			->leftJoin('a.post', 'ps')
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
