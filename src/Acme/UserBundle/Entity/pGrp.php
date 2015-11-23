<?php

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\pGrpRepository")
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
class pGrp
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
     *      targetEntity="Post",
     *      mappedBy="pGrp",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $posts;

	
	//pGrps_post ==> pGrps
    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="pGrps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;
	
	
	/*	
	 * @ORM\ManyToOne(targetEntity="Pays", inversedBy="groupes")
	 * @ORM\JoinColumn(name="pays_id", referencedColumnName="pays_id")
	protected $pays_id;
	*/
	
    /**
     * @ORM\OneToMany(
     *      targetEntity="Grp",
     *      mappedBy="pGrp",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $grps;

    /**
     * @ORM\ManyToOne(targetEntity="Grp", inversedBy="pGrps_grp")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grp;
	
    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }
	
/*
public function __toString()
{
    return $this->name;
}
*/

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

	public function getGrps()
    {
        return $this->grps;
    }

    public function addGrp(Grp $grp)
    {
        $this->grps->add($grp);
        $grp->setGrp($this);
    }

    public function removeGrp(Grp $grps)
    {
        $this->grps->removeElement($grps);
        $grps->setGrp(null);
    }

	public function getGrp()
    {
        return $this->grp;
    }
    public function setGrp(Grp $grp = null)
    {
        $this->grp = $grp;
    }
	
	public function getPost()
    {
        return $this->post;
    }
    public function setPost(Post $post = null)
    {
        $this->post = $post;
    }
}
