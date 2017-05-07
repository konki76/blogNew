<?php

namespace Acme\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\UERepository")
 *
 * Defines the properties of the UE entity to represent the blog UE.
 * See http://symfony.com/doc/current/book/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See http://symfony.com/doc/current/cookbook/doctrine/reverse_engineering.html
 *
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $publishedAt;

    /**
     * @ORM\OneToMany(
     *      targetEntity="skill",
     *      mappedBy="Skill",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $skills;
    
    /**
     * @ORM\Column(type="string")
     */
    private $slug;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $startContent;
    
    public function getStartContent()
    {
        return $this->startContent;
    }

    public function setStartContent($startContent)
    {
        $this->startContent = $startContent;
    }

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $endContent;
    
    public function getEndContent()
    {
        return $this->endContent;
    }

    public function setEndContent($endContent)
    {
        $this->endContent = $endContent;
    }

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->title;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    
    /**
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $ordre;
    public function getOrdre()
    {
        return $this->ordre;
    }

    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    private $users;
    public function addUser(User $user)
    {
        $this->users[] = $user;
    }
}
