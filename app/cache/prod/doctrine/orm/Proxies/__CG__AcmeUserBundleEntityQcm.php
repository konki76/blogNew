<?php

namespace Proxies\__CG__\Acme\UserBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Qcm extends \Acme\UserBundle\Entity\Qcm implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'id', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'title', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'slug', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'summary', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'content', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'authorEmail', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'publishedAt', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'comments', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'Qcms', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answers', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer1', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer2', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer3', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer4', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer5', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer1', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer2', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer3', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer4', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer5', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer1', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer2', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer3', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer4', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer5', 'pGrps');
        }

        return array('__isInitialized__', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'id', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'title', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'slug', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'summary', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'content', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'authorEmail', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'publishedAt', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'comments', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'Qcms', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answers', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer1', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer2', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer3', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer4', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'labelAnswer5', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer1', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer2', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer3', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer4', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'answer5', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer1', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer2', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer3', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer4', '' . "\0" . 'Acme\\UserBundle\\Entity\\Qcm' . "\0" . 'commentAnswer5', 'pGrps');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Qcm $proxy) {
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
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
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
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
    public function getSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlug', array());

        return parent::getSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlug', array($slug));

        return parent::setSlug($slug);
    }

    /**
     * {@inheritDoc}
     */
    public function getContent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContent', array());

        return parent::getContent();
    }

    /**
     * {@inheritDoc}
     */
    public function setContent($content)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContent', array($content));

        return parent::setContent($content);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorEmail', array());

        return parent::getAuthorEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthorEmail($authorEmail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAuthorEmail', array($authorEmail));

        return parent::setAuthorEmail($authorEmail);
    }

    /**
     * {@inheritDoc}
     */
    public function isAuthor(\Acme\UserBundle\Entity\User $user = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isAuthor', array($user));

        return parent::isAuthor($user);
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
    public function getComments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComments', array());

        return parent::getComments();
    }

    /**
     * {@inheritDoc}
     */
    public function addComment(\Acme\UserBundle\Entity\Comment $comment)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addComment', array($comment));

        return parent::addComment($comment);
    }

    /**
     * {@inheritDoc}
     */
    public function removeComment(\Acme\UserBundle\Entity\Comment $comments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeComment', array($comments));

        return parent::removeComment($comments);
    }

    /**
     * {@inheritDoc}
     */
    public function getSummary()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSummary', array());

        return parent::getSummary();
    }

    /**
     * {@inheritDoc}
     */
    public function setSummary($summary)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSummary', array($summary));

        return parent::setSummary($summary);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswers', array());

        return parent::getAnswers();
    }

    /**
     * {@inheritDoc}
     */
    public function addAnswer(\Acme\UserBundle\Entity\Answer $answer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAnswer', array($answer));

        return parent::addAnswer($answer);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAnswer(\Acme\UserBundle\Entity\Answer $answers)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAnswer', array($answers));

        return parent::removeAnswer($answers);
    }

    /**
     * {@inheritDoc}
     */
    public function getLabelAnswer1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLabelAnswer1', array());

        return parent::getLabelAnswer1();
    }

    /**
     * {@inheritDoc}
     */
    public function setLabelAnswer1($labelAnswer1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLabelAnswer1', array($labelAnswer1));

        return parent::setLabelAnswer1($labelAnswer1);
    }

    /**
     * {@inheritDoc}
     */
    public function getLabelAnswer2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLabelAnswer2', array());

        return parent::getLabelAnswer2();
    }

    /**
     * {@inheritDoc}
     */
    public function setLabelAnswer2($labelAnswer2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLabelAnswer2', array($labelAnswer2));

        return parent::setLabelAnswer2($labelAnswer2);
    }

    /**
     * {@inheritDoc}
     */
    public function getLabelAnswer3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLabelAnswer3', array());

        return parent::getLabelAnswer3();
    }

    /**
     * {@inheritDoc}
     */
    public function setLabelAnswer3($labelAnswer3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLabelAnswer3', array($labelAnswer3));

        return parent::setLabelAnswer3($labelAnswer3);
    }

    /**
     * {@inheritDoc}
     */
    public function getLabelAnswer4()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLabelAnswer4', array());

        return parent::getLabelAnswer4();
    }

    /**
     * {@inheritDoc}
     */
    public function setLabelAnswer4($labelAnswer4)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLabelAnswer4', array($labelAnswer4));

        return parent::setLabelAnswer4($labelAnswer4);
    }

    /**
     * {@inheritDoc}
     */
    public function getLabelAnswer5()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLabelAnswer5', array());

        return parent::getLabelAnswer5();
    }

    /**
     * {@inheritDoc}
     */
    public function setLabelAnswer5($labelAnswer5)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLabelAnswer5', array($labelAnswer5));

        return parent::setLabelAnswer5($labelAnswer5);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswer1', array());

        return parent::getAnswer1();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer1($answer1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnswer1', array($answer1));

        return parent::setAnswer1($answer1);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswer2', array());

        return parent::getAnswer2();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer2($answer2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnswer2', array($answer2));

        return parent::setAnswer2($answer2);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswer3', array());

        return parent::getAnswer3();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer3($answer3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnswer3', array($answer3));

        return parent::setAnswer3($answer3);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer4()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswer4', array());

        return parent::getAnswer4();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer4($answer4)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnswer4', array($answer4));

        return parent::setAnswer4($answer4);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswer5()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswer5', array());

        return parent::getAnswer5();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer5($answer5)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnswer5', array($answer5));

        return parent::setAnswer5($answer5);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommentAnswer1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommentAnswer1', array());

        return parent::getCommentAnswer1();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommentAnswer1($commentAnswer1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommentAnswer1', array($commentAnswer1));

        return parent::setCommentAnswer1($commentAnswer1);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommentAnswer2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommentAnswer2', array());

        return parent::getCommentAnswer2();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommentAnswer2($commentAnswer2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommentAnswer2', array($commentAnswer2));

        return parent::setCommentAnswer2($commentAnswer2);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommentAnswer3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommentAnswer3', array());

        return parent::getCommentAnswer3();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommentAnswer3($commentAnswer3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommentAnswer3', array($commentAnswer3));

        return parent::setCommentAnswer3($commentAnswer3);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommentAnswer4()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommentAnswer4', array());

        return parent::getCommentAnswer4();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommentAnswer4($commentAnswer4)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommentAnswer4', array($commentAnswer4));

        return parent::setCommentAnswer4($commentAnswer4);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommentAnswer5()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommentAnswer5', array());

        return parent::getCommentAnswer5();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommentAnswer5($commentAnswer5)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommentAnswer5', array($commentAnswer5));

        return parent::setCommentAnswer5($commentAnswer5);
    }

}
