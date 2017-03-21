<?php

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\PostRepository")
 *
 * Defines the properties of the Post entity to represent the blog posts.
 * See http://symfony.com/doc/current/book/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See http://symfony.com/doc/current/cookbook/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class Post
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
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Give your post a summary!")
     */
    private $summary;

	/**
     * @ORM\Column(type="string")
     */
    private $p1Titre;
	/**
     * @ORM\Column(type="string")
     */
    private $p1SousTitre;
    /**
     * @ORM\Column(type="text")
     */
    private $p1Content;
	/**
     * @ORM\Column(type="string")
     */
    private $p1Transition;

	/**
     * @ORM\Column(type="string")
     */
    private $p2Titre;
	/**
     * @ORM\Column(type="string")
     */
    private $p2SousTitre;
    /**
     * @ORM\Column(type="text")
     */
    private $p2Content;
	/**
     * @ORM\Column(type="string")
     */
    private $p2Transition;

	/**
     * @ORM\Column(type="string")
     */
    private $p3Titre;
	/**
     * @ORM\Column(type="string")
     */
    private $p3SousTitre;
    /**
     * @ORM\Column(type="text")
     */
    private $p3Content;
	/**
     * @ORM\Column(type="string")
     */
    private $p3Transition;

	/**
     * @ORM\Column(type="string")
     */
    private $p4Titre;
	/**
     * @ORM\Column(type="string")
     */
    private $p4SousTitre;
    /**
     * @ORM\Column(type="text")
     */
    private $p4Content;
	/**
     * @ORM\Column(type="string")
     */
    private $p4Transition;

	/**
     * @ORM\Column(type="string")
     */
    private $p5Titre;
	/**
     * @ORM\Column(type="string")
     */
    private $p5SousTitre;
    /**
     * @ORM\Column(type="text")
     */
    private $p5Content;
	/**
     * @ORM\Column(type="string")
     */
    private $p5Transition;

	/**
     * @ORM\Column(type="string")
     */
    private $p6Titre;
	/**
     * @ORM\Column(type="string")
     */
    private $p6SousTitre;
    /**
     * @ORM\Column(type="text")
     */
    private $p6Content;
	/**
     * @ORM\Column(type="string")
     */
    private $p6Transition;
	
	/**
     * @ORM\Column(type="string")
     */
    private $p7Titre;
	/**
     * @ORM\Column(type="string")
     */
    private $p7SousTitre;
    /**
     * @ORM\Column(type="text")
     */
    private $p7Content;
	/**
     * @ORM\Column(type="string")
     */
    private $p7Transition;

	
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *     min = "10",
     *     minMessage = "Post content is too short ({{ limit }} characters minimum)"
     * )
     */
    private $content;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email()
     */
    private $authorEmail;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $publishedAt;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Comment",
     *      mappedBy="post",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $comments;

	
	private $posts;

	public function __toString() {
    return $this->title;
	}
	
    public function __construct()
    {
		$this->posts = new ArrayCollection();
        $this->publishedAt = new \DateTime();
        $this->comments = new ArrayCollection();
        $this->answers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
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

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * Is the given User the author of this Post?
     *
     * @param User $user
     *
     * @return bool
     */
    public function isAuthor(User $user = null)
    {
        return $user->getEmail() == $this->getAuthorEmail();
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

	
    public function getComments()
    {
        return $this->comments;
    }

    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
        $comment->setPost($this);
    }

    public function removeComment(Comment $comments)
    {
        $this->comments->removeElement($comments);
        $comments->setPost(null);
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @ORM\OneToMany(
     *      targetEntity="Answer",
     *      mappedBy="post",
     *      orphanRemoval=true
     * )
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $answers;	
	
    public function getAnswers()
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer)
    {
        $this->answers->add($answer);
        $answer->setPost($this);
    }

    public function removeAnswer(answer $answers)
    {
        $this->answers->removeElement($answers);
        $answers->setPost(null);
    }

	
	
    public function getP1Titre()
    {
        return $this->p1Titre;
    }
    public function setP1Titre($p1Titre)
    {
        $this->p1Titre = $p1Titre;
    }
    public function getP1SousTitre()
    {
        return $this->p1SousTitre;
    }
    public function setP1SousTitre($p1SousTitre)
    {
        $this->p1SousTitre = $p1SousTitre;
    }
    public function getP1Content()
    {
        return $this->p1Content;
    }
    public function setP1Transition($p1Transition)
    {
        $this->p1Transition = $p1Transition;
    }
	public function getP1Transition()
    {
        return $this->p1Transition;
    }
    public function setP1Content($p1Transition)
    {
        $this->p1Transition = $p1Transition;
    }
/***/
    public function getP2Titre()
    {
        return $this->p2Titre;
    }
    public function setP2Titre($p2Titre)
    {
        $this->p2Titre = $p2Titre;
    }
    public function getP2SousTitre()
    {
        return $this->p2SousTitre;
    }
    public function setP2SousTitre($p2SousTitre)
    {
        $this->p2SousTitre = $p2SousTitre;
    }
    public function getP2Content()
    {
        return $this->p2Content;
    }
    public function setP2Transition($p2Transition)
    {
        $this->p2Transition = $p2Transition;
    }
	public function getP2Transition()
    {
        return $this->p2Transition;
    }
    public function setP2Content($p2Transition)
    {
        $this->p2Transition = $p2Transition;
    }
/***/
    public function getP3Titre()
    {
        return $this->p3Titre;
    }
    public function setP3Titre($p3Titre)
    {
        $this->p3Titre = $p3Titre;
    }
    public function getP3SousTitre()
    {
        return $this->p3SousTitre;
    }
    public function setP3SousTitre($p3SousTitre)
    {
        $this->p3SousTitre = $p3SousTitre;
    }
    public function getP3Content()
    {
        return $this->p3Content;
    }
    public function setP3Transition($p3Transition)
    {
        $this->p3Transition = $p3Transition;
    }
	public function getP3Transition()
    {
        return $this->p3Transition;
    }
    public function setP3Content($p3Transition)
    {
        $this->p3Transition = $p3Transition;
    }
/***/
    public function getP4Titre()
    {
        return $this->p4Titre;
    }
    public function setP4Titre($p4Titre)
    {
        $this->p4Titre = $p4Titre;
    }
    public function getP4SousTitre()
    {
        return $this->p4SousTitre;
    }
    public function setP4SousTitre($p4SousTitre)
    {
        $this->p4SousTitre = $p4SousTitre;
    }
    public function getP4Content()
    {
        return $this->p4Content;
    }
    public function setP4Transition($p4Transition)
    {
        $this->p4Transition = $p4Transition;
    }
	public function getP4Transition()
    {
        return $this->p4Transition;
    }
    public function setP4Content($p4Transition)
    {
        $this->p4Transition = $p4Transition;
    }
/***/
    public function getP5Titre()
    {
        return $this->p5Titre;
    }
    public function setP5Titre($p5Titre)
    {
        $this->p5Titre = $p5Titre;
    }
    public function getP5SousTitre()
    {
        return $this->p5SousTitre;
    }
    public function setP5SousTitre($p5SousTitre)
    {
        $this->p5SousTitre = $p5SousTitre;
    }
    public function getP5Content()
    {
        return $this->p5Content;
    }
    public function setP5Transition($p5Transition)
    {
        $this->p5Transition = $p5Transition;
    }
	public function getP5Transition()
    {
        return $this->p5Transition;
    }
    public function setP5Content($p5Transition)
    {
        $this->p5Transition = $p5Transition;
    }
/***/
    public function getP6Titre()
    {
        return $this->p6Titre;
    }
    public function setP6Titre($p6Titre)
    {
        $this->p6Titre = $p6Titre;
    }
    public function getP6SousTitre()
    {
        return $this->p6SousTitre;
    }
    public function setP6SousTitre($p6SousTitre)
    {
        $this->p6SousTitre = $p6SousTitre;
    }
    public function getP6Content()
    {
        return $this->p6Content;
    }
    public function setP6Transition($p6Transition)
    {
        $this->p6Transition = $p6Transition;
    }
	public function getP6Transition()
    {
        return $this->p6Transition;
    }
    public function setP6Content($p6Transition)
    {
        $this->p6Transition = $p6Transition;
    }
/***/
    public function getP7Titre()
    {
        return $this->p7Titre;
    }
    public function setP7Titre($p7Titre)
    {
        $this->p7Titre = $p7Titre;
    }
    public function getP7SousTitre()
    {
        return $this->p7SousTitre;
    }
    public function setP7SousTitre($p7SousTitre)
    {
        $this->p7SousTitre = $p7SousTitre;
    }
    public function getP7Content()
    {
        return $this->p7Content;
    }
    public function setP7Transition($p7Transition)
    {
        $this->p7Transition = $p7Transition;
    }
	public function getP7Transition()
    {
        return $this->p7Transition;
    }
    public function setP7Content($p7Transition)
    {
        $this->p7Transition = $p7Transition;
    }
/***/

	
/************************************************************************************************/	
	/**
    * @ORM\OneToMany(targetEntity="pGrp", mappedBy="post")
    */
    protected $pGrps;
	
}
