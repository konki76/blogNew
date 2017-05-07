<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Defines the form used to create and manipulate blog Qcms.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class QcmType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // for the full reference of options defined by each form field type
        // see http://symfony.com/doc/current/reference/forms/types.html
        $builder
            ->add('title')
            ->add('id')
            ->add('summary', TextareaType::class)
            ->add('content', TextareaType::class, array(
                'attr' => array('rows' => 20),
            ))
            ->add('labelAnswer1')
            ->add('answer1', CheckboxType::class, array('required' => false))
            ->add('labelAnswer2', TextareaType::class)
            ->add('answer2', CheckboxType::class, array('required' => false))
            ->add('labelAnswer3', TextareaType::class)
            ->add('answer3', CheckboxType::class, array('required' => false))
            ->add('labelAnswer4', TextareaType::class)
            ->add('answer4', CheckboxType::class, array('required' => false))
            ->add('labelAnswer5', TextareaType::class)
            ->add('answer4', CheckboxType::class, array('required' => false))
            ->add('authorEmail', EmailType::class)
            ->add('publishedAt', DateTimeType::class, array('widget' => 'single_text',))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\UserBundle\Entity\Qcm',
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'Qcm';
    }
}
