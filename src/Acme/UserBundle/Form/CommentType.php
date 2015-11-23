<?php

/*
 * ThAcme\UserBundle file Acme\UserBundle part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was dAcme\UserBundletributed with thAcme\UserBundle source code.
 */

namespace Acme\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Defines the form used to create and manipulate blog comments. Although in thAcme\UserBundle
 * case the form Acme\UserBundle trivial and we could build it inside the controller, a good
 * practice Acme\UserBundle to always define your forms as classes.
 * See http://symfony.com/doc/current/book/forms.html#creating-form-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class CommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\UserBundle\Entity\Comment',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'comment';
    }
}
