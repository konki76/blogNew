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

use Doctrine\ORM\EntityRepository;
use Acme\UserBundle\Entity\Grp;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog Grp information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class GrpRepository extends EntityRepository
{
    public function findLatest($limit = Grp::NUM_ITEMS)
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

	public function nextGrpCt($currentPid)
    {
		return $this->createQueryBuilder('p')
					->select('COUNT(p)')
					->where('p.id = :pid')->setParameter('pid', $currentPid)
					->getQuery()
					->getSingleScalarResult();
    }	
	
	public function getGrpIdBySlug($grpSlug)
	{
		return $this->createQueryBuilder('p')
					->select('p')
					->where('p.slug = :grpSlug')->setParameter('grpSlug', $grpSlug)
					->getQuery()
					->getSingleScalarResult();
    }	
	
    public function grpCt()
    {
		return $this->createQueryBuilder('p')
					->select('COUNT(p)')
					->getQuery()
					->getSingleScalarResult();
    }	

	
    public function nextGrp($currentPid)
    {
		return $this
			->createQueryBuilder('p')
			->select('p')
			->where('p.id = :pid')->setParameter('pid', $currentPid)
			->getQuery()
			->getOneOrNullResult();
    }	
	
	
}
