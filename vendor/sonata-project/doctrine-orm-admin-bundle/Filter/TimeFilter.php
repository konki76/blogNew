<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\DoctrineORMAdminBundle\Filter;

class TimeFilter extends AbstractDateFilter
{
    /**
     * This filter has no range.
     *
     * @var bool
     */
    protected $range = false;

    /**
     * This filter does not allow filtering by time.
     *
     * @var bool
     */
    protected $time = true;

    /**
     * {@inheritdoc}
     */
    public function getFieldType()
    {
        return $this->getOption('field_type', 'time');
    }
}
