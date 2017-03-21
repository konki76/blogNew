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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('summary', 'textarea')
            ->add('p1Titre','text', array('attr' => array('class' => 'fieldClass')))
			->add('p1SousTitre')
			->add('p1Content', 'textarea')
			->add('p1Transition')
            ->add('p2Titre')
			->add('p2SousTitre')
			->add('p2Content', 'textarea')
			->add('p2Transition')
            ->add('p3Titre')
			->add('p3SousTitre')
			->add('p3Content', 'textarea')
			->add('p3Transition')
			->add('p4Titre')
			->add('p4SousTitre')
			->add('p4Content', 'textarea')
			->add('p4Transition')
			->add('p5Titre')
			->add('p5SousTitre')
			->add('p5Content', 'textarea')
			->add('p5Transition')			
			->add('p6Titre')
			->add('p6SousTitre')
			->add('p6Content', 'textarea')
			->add('p6Transition')			
			->add('p7Titre')
			->add('p7SousTitre')
			->add('p7Content', 'textarea')
			->add('p7Transition')
			->add('content', 'textarea', array(
                'attr' => array('rows' => 20),
            ))
            ->add('authorEmail', 'email')
            ->add('publishedAt', 'datetime', array('widget' => 'single_text',))
        ;
    }
	
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\UserBundle\Entity\Post',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'post';
    }
}
