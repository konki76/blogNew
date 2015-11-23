<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
 
class RegistrationFormType extends BaseType
{
   

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		parent::buildForm($builder, $options);
        $builder
            ->add('lastname','text' , array('label' => 'form.lastname', 'translation_domain' => 'AcmeUserBundle'))
            ->add('firstname','text' , array('label' => 'form.firstname','translation_domain' => 'AcmeUserBundle'));
    }

    public function getName()
    {
        return 'apl_user_registration';
    }
    public function getLastname()
    {
        return 'apl_user_registration';
    }
    public function getFirstname()
    {
        return 'apl_user_registration';
    }
	
}
