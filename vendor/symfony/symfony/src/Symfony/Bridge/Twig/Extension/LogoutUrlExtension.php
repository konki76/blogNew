<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\Twig\Extension;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Logout\LogoutUrlGenerator;

/**
 * LogoutUrlHelper provides generator functions for the logout URL to Twig.
 *
 * @author Jeremy Mikola <jmikola@gmail.com>
 */
class LogoutUrlExtension extends \Twig_Extension
{
    private $generator;

    public function __construct(LogoutUrlGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('logout_url', array($this, 'getLogoutUrl')),
            new \Twig_SimpleFunction('logout_path', array($this, 'getLogoutPath')),
        );
    }

    /**
     * Generates the relative logout URL for the firewall.
     *
     * @param string|null $key The firewall key or null to use the current firewall key
     *
     * @return string The relative logout URL
     */
    public function getLogoutPath($key = null)
    {
        return $this->generator->getLogoutPath($key, UrlGeneratorInterface::ABSOLUTE_PATH);
    }

    /**
     * Generates the absolute logout URL for the firewall.
     *
     * @param string|null $key The firewall key or null to use the current firewall key
     *
     * @return string The absolute logout URL
     */
    public function getLogoutUrl($key = null)
    {
        return $this->generator->getLogoutUrl($key, UrlGeneratorInterface::ABSOLUTE_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'logout_url';
    }
}
