<?php

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
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
class UE
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
     *      targetEntity="ue",
     *      mappedBy="UE",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $ues;
	
    /**
     * @ORM\Column(type="string")
     */
    private $slug;
	
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *     min = "10",
     *     minMessage = "Post content is too short ({{ limit }} characters minimum)"
     * )
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
     * @ORM\Column(type="text")
     * @Assert\Length(
     *     min = "10",
     *     minMessage = "Post content is too short ({{ limit }} characters minimum)"
     * )
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

	private $grps;
    public function __construct()
    {
        $this->grps = new ArrayCollection();
    }
	public function __toString() {
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

}
