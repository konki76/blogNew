<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Cache\Adapter\Cache;

use Sonata\Cache\CacheElement;

/**
 * Handles APC cache
 */
class ApcCache extends BaseCacheHandler
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var array
     */
    protected $servers;

    /**
     * @var boolean
     */
    protected $currentOnly;

    /**
     * @var array
     */
    protected $timeout = array();

    /**
     * Constructor
     *
     * @param string $url     A router instance
     * @param string $prefix  A prefix to avoid clash between instances
     * @param array  $servers An array of servers
     * @param array  $timeout An array of timeout options
     */
    public function __construct($url, $prefix, array $servers, array $timeout = array())
    {
        $this->url     = $url;
        $this->prefix  = $prefix;
        $this->servers = $servers;

        $defaultTimeout = array(
            'sec'  => 5,
            'usec' => 0,
        );

        $this->timeout['RCV'] = isset($timeout['RCV']) ? array_merge($defaultTimeout, $timeout['RCV']) : $defaultTimeout;
        $this->timeout['SND'] = isset($timeout['SND']) ? array_merge($defaultTimeout, $timeout['SND']) : $defaultTimeout;
    }

    /**
     * @param boolean $bool
     */
    public function setCurrentOnly($bool)
    {
        $this->currentOnly = $bool;
    }

    /**
     * {@inheritdoc}
     */
    public function flushAll()
    {
        if ($this->currentOnly) {
            return apc_clear_cache('user') && apc_clear_cache();
        }

        $result = true;

        foreach ($this->servers as $server) {
            if (count(explode('.', $server['ip'])) == 4) {
                $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            } else {
                $socket = socket_create(AF_INET6, SOCK_STREAM, SOL_TCP);
            }

            // generate the raw http request
            $command = sprintf("GET %s HTTP/1.1\r\n", $this->getUrl());
            $command .= sprintf("Host: %s\r\n", $server['domain']);

            if ($server['basic']) {
                $command .= sprintf("Authorization: Basic %s\r\n", $server['basic']);
            }

            $command .= "Connection: Close\r\n\r\n";

            // setup the default timeout (avoid max execution time)
            socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, $this->timeout['SND']);
            socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, $this->timeout['RCV']);

            socket_connect($socket, $server['ip'], $server['port']);
            socket_write($socket, $command);

            $content = '';

            do {
                $buffer = socket_read($socket, 1024);
                $content .= $buffer;
            } while (!empty($buffer));

            if ($result) {
                $result = substr($content, -2) == 'ok';
            }
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function flush(array $keys = array())
    {
        if ($this->currentOnly) {
            return apc_delete($this->computeCacheKeys($keys));
        }

        return $this->flushAll();
    }

    /**
     * {@inheritdoc}
     */
    public function has(array $keys)
    {
        return apc_exists($this->computeCacheKeys($keys));
    }

    /**
     * {@inheritdoc}
     */
    public function set(array $keys, $data, $ttl = CacheElement::DAY, array $contextualKeys = array())
    {
        $cacheElement = new CacheElement($keys, $data, $ttl);

        apc_store(
            $this->computeCacheKeys($keys),
            $cacheElement,
            $cacheElement->getTtl()
        );

        return $cacheElement;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $keys)
    {
        return $this->handleGet($keys, apc_fetch($this->computeCacheKeys($keys)));
    }

    /**
     * {@inheritdoc}
     */
    public function isContextual()
    {
        return false;
    }

    /**
     * @return string
     */
    protected function getUrl()
    {
        return $this->url;
    }

    /**
     * Computes the given cache keys
     *
     * @param array $keys
     *
     * @return string
     */
    private function computeCacheKeys($keys)
    {
        ksort($keys);

        return md5($this->prefix.serialize($keys));
    }
}
