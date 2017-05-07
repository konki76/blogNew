<?php

namespace Acme\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\GrpRepository")
 *
 * Defines the properties of the pGrp entity to represent the blog pGrps.
 * See http://symfony.com/doc/current/book/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See http://symfony.com/doc/current/cookbook/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class Grp
{
    const NUM_ITEMS = 10;
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
     *      targetEntity="pGrp",
     *      mappedBy="Group",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $posts;

    /**
     * @ORM\OneToMany(
     *      targetEntity="ueGrp",
     *      mappedBy="Group",
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
    
    /**
     * @ORM\Column(type="string")
     */
    private $ue;
    public function getUe()
    {
        return $this->ue;
    }

    public function setUe($ue)
    {
        $this->ue = $ue;
    }
    
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
    /*
    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }
    */
    private $ueGrps;
    private $pGrps;
    public function __construct()
    {
        $this->pGrps = new ArrayCollection();
        $this->ueGrps = new ArrayCollection();
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

    ///
     // @ORM\OneToMany(targetEntity="Answer", inversedBy="grp")
     // @ORM\JoinColumn(nullable=true)
     ///
    //private $answers;
}
