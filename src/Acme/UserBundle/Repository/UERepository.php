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
use Acme\UserBundle\Entity\UE;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog Grp information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class UERepository extends EntityRepository
{
    public function findLatest($limit = Post::NUM_ITEMS)
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

	public function findUeByName($name)
    {
		return $this
			->createQueryBuilder('p')
			->select('p.id')
			//->addSelect('t')
			->where('p.slug = :name')->setParameter('name', $name)
			->getQuery()
			->getSingleScalarResult();
    }
	
}
