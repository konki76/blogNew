<?php

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\UserSkillRepository")
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
class UserSkill
{
    const NUM_ITEMS = 10;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

	
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
     *      targetEntity="Skill",
     *      mappedBy="UserSkill",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $skills;

	//invesrsedBy 'Users' doit être déclaré dans l'entité Skill.php 
    /**
     * @ORM\ManyToOne(targetEntity="Skill", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skill;
	
    /**
     * @ORM\OneToMany(
     *      targetEntity="User",
     *      mappedBy="UserSkill",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="skills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
	
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

	public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
	
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

	public function getUsers()
    {
        return $this->users;
    }

    public function addUser(User $user)
    {
        $this->ues->add($user);
        $ue->setUe($this);
    }

    public function removeUser(User $users)
    {
        $this->users->removeElement($users);
        $ues->setSkill(null);
    }

	public function getUser()
    {
        return $this->user;
    }
    public function setUser(User $user = null)
    {
        $this->user = $user;
    }
	
	public function getSkill()
    {
        return $this->skill;
    }
    public function setskill(Skill $skill = null)
    {
        $this->skill = $skill;
    }
}
