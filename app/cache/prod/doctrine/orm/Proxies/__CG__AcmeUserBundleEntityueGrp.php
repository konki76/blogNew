<?php

namespace Proxies\__CG__\Acme\UserBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ueGrp extends \Acme\UserBundle\Entity\ueGrp implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'id', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'title', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'publishedAt', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'grps', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'grp', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'ues', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'ue');
        }

        return array('__isInitialized__', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'id', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'title', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'publishedAt', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'grps', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'grp', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'ues', '' . "\0" . 'Acme\\UserBundle\\Entity\\ueGrp' . "\0" . 'ue');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ueGrp $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', array());

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', array($title));

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublishedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublishedAt', array());

        return parent::getPublishedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublishedAt($publishedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublishedAt', array($publishedAt));

        return parent::setPublishedAt($publishedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUes', array());

        return parent::getUes();
    }

    /**
     * {@inheritDoc}
     */
    public function addUe(\Acme\UserBundle\Entity\UE $ue)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUe', array($ue));

        return parent::addUe($ue);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUe(\Acme\UserBundle\Entity\UE $ues)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUe', array($ues));

        return parent::removeUe($ues);
    }

    /**
     * {@inheritDoc}
     */
    public function getUe()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUe', array());

        return parent::getUe();
    }

    /**
     * {@inheritDoc}
     */
    public function setUe(\Acme\UserBundle\Entity\UE $ue = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUe', array($ue));

        return parent::setUe($ue);
    }

    /**
     * {@inheritDoc}
     */
    public function getGrp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGrp', array());

        return parent::getGrp();
    }

    /**
     * {@inheritDoc}
     */
    public function setGrp(\Acme\UserBundle\Entity\Grp $grp = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGrp', array($grp));

        return parent::setGrp($grp);
    }

}
