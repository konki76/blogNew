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
use Acme\UserBundle\Entity\Qcm;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog Qcm information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class QcmRepository extends EntityRepository
{
    public function findLatest($limit = Qcm::NUM_ITEMS)
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

	public function nextQcmCt($currentPid)
    {
		return $this->createQueryBuilder('p')
					->select('COUNT(p)')
					->where('p.id = :pid')->setParameter('pid', $currentPid)
					->getQuery()
					->getSingleScalarResult();
    }	
	

	public function getQcm($currentPid)
    {
		return $this
			->createQueryBuilder('p')
			->select('p')
			->where('p.id = :pid')->setParameter('pid', $currentPid)
			->getQuery()
			->getOneOrNullResult();
    }	
	
	
    public function nextQcm($currentPid)
    {
		return $this
			->createQueryBuilder('p')
			->select('p')
			->where('p.id = :pid')->setParameter('pid', $currentPid)
			->getQuery()
			->getOneOrNullResult();
    }	

	public function QcmByPGrpId($currentPid)
    {
		return $this
			->createQueryBuilder('p')
			->select('p.id')
			->join('p.pGrps', 't')
			//->addSelect('t')
			->where('t.id = :tid')->setParameter('tid', $pGrpId)
			->getQuery()
			->getOneOrNullResult();
    }
	
	/*
	public function QcmByPGrpId($pGrpId)
    {
		return $this
			->createQueryBuilder('p')
			->select('p.id')
			->join('p.pGrps', 't')
			//->addSelect('t')
			->where('t.id = :tid')->setParameter('tid', $pGrpId)
			->getQuery()
			->getSingleScalarResult();
    }	

	public function QcmByPGrpId($pGrpId)
    {
		return $this
			->createQueryBuilder('p')
			->select('p.id')
			->join('p.pGrps', 't')
			//->addSelect('t')
			->where('t.id = :tid')->setParameter('tid', $pGrpId)
			->getQuery()
			->getSingleScalarResult();
    }	
*/	
}
