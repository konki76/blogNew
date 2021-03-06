<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CoreBundle\Tests\Form\Type;

use Sonata\CoreBundle\Date\MomentFormatConverter;
use Sonata\CoreBundle\Form\Type\DatePickerType;

/**
 * Class DatePickerTypeTest.
 *
 *
 * @author Hugo Briand <briand@ekino.com>
 */
class DatePickerTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $type = new DatePickerType(new MomentFormatConverter());

        $this->assertEquals('sonata_type_date_picker', $type->getName());
    }
}
