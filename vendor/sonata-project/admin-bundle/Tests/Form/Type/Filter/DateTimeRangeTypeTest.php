<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\AdminBundle\Tests\Form\Type;

use Sonata\AdminBundle\Form\Type\Filter\DateTimeRangeType;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateTimeRangeTypeTest extends TypeTestCase
{
    public function testGetDefaultOptions()
    {
        $stub = $this->getMock('Symfony\Component\Translation\TranslatorInterface');

        $formType = new DateTimeRangeType($stub);

        $resolver = new OptionsResolver();

        $formType->setDefaultOptions($resolver);

        $options = $resolver->resolve();

        $expected = array(
            'field_type'       => 'sonata_type_datetime_range',
            'field_options'    => array('date_format' => 'yyyy-MM-dd'),
        );
        $this->assertEquals($expected, $options);
    }
}
