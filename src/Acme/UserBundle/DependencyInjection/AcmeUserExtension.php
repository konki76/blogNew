<?php
// src/Acme\UserBundle/DependencyInjection/AppExtension.php

namespace Acme\UserBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AcmeUserExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        //$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
    //$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../../../../app/config'));
    //=>OK $loader = new Loader\YamlFileLoader($container, new FileLocator('C:\wamp\www\blogNew\app\config'));
                                                                           //C:\wamp\www\blogNew\app\config
    $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));                               //C:\wamp\www\blogNew\src\Acme\UserBundle\DependencyInjection
//$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../../../../app/config'));

    $loader->load('services.yml');
    }
}
