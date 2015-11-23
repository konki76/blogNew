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
use Acme\UserBundle\Entity\pGrp;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog pGrp information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class pGrpRepository extends EntityRepository
{
    public function findLatest($limit = pGrp::NUM_ITEMS)
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
	
    public function findPostsBypGrpId($grpId)
    {
        return $this
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.grp = :pGrpId')
			->setParameter('pGrpId', $grpId)
            ->orderBy('p.publishedAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
	
	public function nextpGrpCt($currentPid)
    {
		return $this->createQueryBuilder('p')
					->select('COUNT(p)')
					->where('p.grp = :pid')->setParameter('pid', $currentPid)
					->getQuery()
					->getSingleScalarResult();
    }	

/*
	public function getGrpIdByPgrpId($pgrpId)
	{
		return $this->createQueryBuilder('p')
					->join('p.grp', 'gp')
					->addSelect('gp')
					->select('p')
					->where('p.id = :pgrpid')->setParameter('pgrpid', $pgrpId)
					->getQuery()
					->getOneOrNullResult();
    }	
*/
    public function currentpGrp($currentPid)
    {
		return $this
			->createQueryBuilder('p')
			->select('p')
			->where('p.id = :pid')->setParameter('pid', $currentPid)
			->getQuery()
			->getOneOrNullResult();
    }	
	
	public function nextPostCtpGrpId($grpId,$page)
	{
		return $this->createQueryBuilder('p')
		 ->select('COUNT(p)')
		 ->where('p.grp = :grpid')->setParameter('grpid', $grpId)
			->andwhere('p.post > :page')->setParameter('page', $page)
		 ->getQuery()
		 ->getSingleScalarResult();
	}
	
	public function nextPostpGrpId($grp,$page)
	{
		return $this
			->createQueryBuilder('p')
			//->leftJoin('p.grp', 'g')
			->select('p.id')
			//->select('p.grp')
			->where('p.grp = :grp')->setParameter('grp', $grp)
			->andwhere('p.post > :page')->setParameter('page', $page)
			->orderBy('p.post', 'ASC')
			->setMaxResults(1)
			->getQuery()
			//->getOneOrNullResult();
			//->getScalarResult();
			->getSingleScalarResult();
	}
	
	public function postIdByPgrpId($pgrpId)
	{
		return $this
			->createQueryBuilder('p')
			->join('p.post', 'ps')
			->addSelect('ps')
			->where('p.id = :pgrpid')->setParameter('pgrpid', $pgrpId)
			->setMaxResults(1)
			->getQuery()
			//->getOneOrNullResult();
			->getScalarResult();
			//->getSingleScalarResult();
	}
	
	public function resultByGrpId($pgrpId)
	{
	
	
	}
	
}
