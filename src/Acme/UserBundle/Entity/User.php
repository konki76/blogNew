<?php

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
//use FOS\UserBundle\Model\User as BaseUser;
//use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="acme_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

   

    /**
     * Returns the salt that was originally used to encode the password.
     */
    public function getSalt()
    {
        // See "Do you need to use a Salt?" at http://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one

        return;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }
    public function __construct()
    {
        parent::__construct();
        // your own logic
		$this->skills = new ArrayCollection();
    }
	
	/**
	* @ORM\Column(name="lastname", type="string", nullable=true)
	*/
	private $lastname;
	public function getLastname()
    {
        return $this->lastname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
	
	/**
	* @ORM\Column(name="firstname", type="string", nullable=true)
	*/
	private $firstname;
	public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
	
//	/**
//	* @ORM\Column(name="coach", type="boolean", nullable=false)
//	*/
//	private $coach;
//	public function getCoach()
 //   {
  //      return $this->coach;
   // }
//    public function setCoach($coach)
 //   {
  //      $this->coach = $coach;
   // }

     /**
     * @ORM\OneToMany(
     *      targetEntity="UserSkill",
     *      mappedBy="user",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $skills;
	public function addSkill(Skill $skill)
    {
        $tag->addUser($this); // synchronously updating inverse side
        $this->skills[] = $skill;
    }

   
}