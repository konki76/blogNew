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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Defines the form used to create and manipulate blog posts.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class PostType extends AbstractType
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
            ->add('p1Titre', TextType::class, array('attr' => array('class' => 'fieldClass')))
            ->add('p1SousTitre')
            ->add('p1Content', TextareaType::class)
            ->add('p1Transition')
            ->add('p2Titre')
            ->add('p2SousTitre')
            ->add('p2Content', TextareaType::class)
            ->add('p2Transition')
            ->add('p3Titre')
            ->add('p3SousTitre')
            ->add('p3Content', TextareaType::class)
            ->add('p3Transition')
            ->add('p4Titre')
            ->add('p4SousTitre')
            ->add('p4Content', TextareaType::class)
            ->add('p4Transition')
            ->add('p5Titre')
            ->add('p5SousTitre')
            ->add('p5Content', TextareaType::class)
            ->add('p5Transition')
            ->add('p6Titre')
            ->add('p6SousTitre')
            ->add('p6Content', TextareaType::class)
            ->add('p6Transition')
            ->add('p7Titre')
            ->add('p7SousTitre')
            ->add('p7Content', TextareaType::class)
            ->add('p7Transition')
            ->add('content', TextareaType::class, array(
                'attr' => array('rows' => 20),
            ))
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
            'data_class' => 'Acme\UserBundle\Entity\Post',
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'post';
    }
}
