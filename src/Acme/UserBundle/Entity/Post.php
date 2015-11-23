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

	/**
	* @ORM\Column(name="labelAnswer1", type="text", nullable=true)
	*/
	private $labelAnswer1;
	/**
	* @ORM\Column(name="labelAnswer2", type="text", nullable=true)
	*/
	private $labelAnswer2;
	/**
	* @ORM\Column(name="labelAnswer3", type="text", nullable=true)
	*/
	private $labelAnswer3;
	/**
	* @ORM\Column(name="labelAnswer4", type="text", nullable=true)
	*/
	private $labelAnswer4;
	/**
	* @ORM\Column(name="labelAnswer5", type="text", nullable=true)
	*/
	private $labelAnswer5;
	
	public function getLabelAnswer1()
    {
        return $this->labelAnswer1;
    }
    public function setLabelAnswer1($labelAnswer1)
    {
        $this->labelAnswer1 = $labelAnswer1;
    }
	
    public function getLabelAnswer2()
    {
        return $this->labelAnswer2;
    }
    public function setLabelAnswer2($labelAnswer2)
    {
        $this->labelAnswer2 = $labelAnswer2;
    }
	
    public function getLabelAnswer3()
    {
        return $this->labelAnswer3;
    }
    public function setLabelAnswer3($labelAnswer3)
    {
        $this->labelAnswer3 = $labelAnswer3;
    }
	
    public function getLabelAnswer4()
    {
        return $this->labelAnswer4;
    }
    public function setLabelAnswer4($labelAnswer4)
    {
        $this->labelAnswer4 = $labelAnswer4;
    }

    public function getLabelAnswer5()
    {
        return $this->labelAnswer5;
    }
    public function setLabelAnswer5($labelAnswer5)
    {
        $this->labelAnswer5 = $labelAnswer5;
    }
		
	
/************************************************************************************************/	
	/**
	* @ORM\Column(name="answer1", type="boolean", nullable=true)
	*/
	private $answer1;
	/**
	* @ORM\Column(name="answer2", type="boolean", nullable=true)
	*/
	private $answer2;
	/**
	* @ORM\Column(name="answer3", type="boolean", nullable=true)
	*/
	private $answer3;
	/**
	* @ORM\Column(name="answer4", type="boolean", nullable=true)
	*/
	private $answer4;
	/**
	* @ORM\Column(name="answer5", type="boolean", nullable=true)
	*/
	private $answer5;

    public function getAnswer1()
    {
        return $this->answer1;
    }
    public function setAnswer1($answer1)
    {
        $this->answer1 = $answer1;
    }
	
    public function getAnswer2()
    {
        return $this->answer2;
    }
    public function setAnswer2($answer2)
    {
        $this->answer2 = $answer2;
    }
	
    public function getAnswer3()
    {
        return $this->answer3;
    }
    public function setAnswer3($answer3)
    {
        $this->answer3 = $answer3;
    }
	
    public function getAnswer4()
    {
        return $this->answer4;
    }
    public function setAnswer4($answer4)
    {
        $this->answer4 = $answer4;
    }
	
    public function getAnswer5()
    {
        return $this->answer5;
    }
    public function setAnswer5($answer5)
    {
        $this->answer5 = $answer5;
    }
	

	/**
	* @ORM\Column(name="commentAnswer1", type="text", nullable=true)
	*/
	private $commentAnswer1;
	/**
	* @ORM\Column(name="commentAnswer2", type="text", nullable=true)
	*/
	private $commentAnswer2;
	/**
	* @ORM\Column(name="commentAnswer3", type="text", nullable=true)
	*/
	private $commentAnswer3;
	/**
	* @ORM\Column(name="commentAnswer4", type="text", nullable=true)
	*/
	private $commentAnswer4;
	/**
	* @ORM\Column(name="commentAnswer5", type="text", nullable=true)
	*/
	private $commentAnswer5;	
	public function getCommentAnswer1()
    {
        return $this->commentAnswer1;
    }
    public function setCommentAnswer1($commentAnswer1)
    {
        $this->commentAnswer1 = $commentAnswer1;
    }
	
    public function getCommentAnswer2()
    {
        return $this->commentAnswer2;
    }
    public function setCommentAnswer2($commentAnswer2)
    {
        $this->commentAnswer2 = $commentAnswer2;
    }
	
    public function getCommentAnswer3()
    {
        return $this->commentAnswer3;
    }
    public function setCommentAnswer3($commentAnswer3)
    {
        $this->commentAnswer3 = $commentAnswer3;
    }
	
    public function getCommentAnswer4()
    {
        return $this->commentAnswer4;
    }
    public function setCommentAnswer4($commentAnswer4)
    {
        $this->commentAnswer4 = $commentAnswer4;
    }	

    public function getCommentAnswer5()
    {
        return $this->commentAnswer5;
    }
    public function setCommentAnswer5($commentAnswer5)
    {
        $this->commentAnswer5 = $commentAnswer5;
    }	
	
	/**
    * @ORM\OneToMany(targetEntity="pGrp", mappedBy="post")
    */
    protected $pGrps;
	
}
