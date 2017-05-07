<?php

namespace Acme\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\ueGrpRepository")
 *
 * Defines the properties of the ueGrp entity to represent the blog ueGrps.
 * See http://symfony.com/doc/current/book/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See http://symfony.com/doc/current/cookbook/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class ueGrp
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
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $publishedAt;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Grp",
     *      mappedBy="ueGrp",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $grps;

    //invesrsedBy 'ues' doit être déclaré dans l'entité Grp.php
    /**
     * @ORM\ManyToOne(targetEntity="Grp", inversedBy="ues")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grp;
    
    /**
     * @ORM\OneToMany(
     *      targetEntity="UE",
     *      mappedBy="ueGrp",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $ues;

    /**
     * @ORM\ManyToOne(targetEntity="UE", inversedBy="ueGrps_ue")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ue;
    
    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    public function getUes()
    {
        return $this->ues;
    }

    public function addUe(Ue $ue)
    {
        $this->ues->add($ue);
        $ue->setUe($this);
    }

    public function removeUe(UE $ues)
    {
        $this->ues->removeElement($ues);
        $ues->setGrp(null);
    }

    public function getUe()
    {
        return $this->ue;
    }
    public function setUe(UE $ue = null)
    {
        $this->ue = $ue;
    }
    
    public function getGrp()
    {
        return $this->grp;
    }
    public function setGrp(Grp $grp = null)
    {
        $this->grp = $grp;
    }
}
