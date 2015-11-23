<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\AnswerRepository")
 *
 * Defines the properties of the Answer entity to represent the blog Answers.
 * See http://symfony.com/doc/current/book/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See http://symfony.com/doc/current/cookbook/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="Grp", inversedBy="answers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $grp;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *     max = "10000",
     *     maxMessage = "Answer is too long ({{ limit }} characters maximum)"
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

    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }

    /**
     * @Assert\True(message = "The content of this Answer is considered spam.")
     */
    public function isLegitAnswer()
    {
        $containsInvalidCharacters = false !== strpos($this->content, '@');

        return !$containsInvalidCharacters;
    }

    public function getId()
    {
        return $this->id;
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

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    public function getPost()
    {
        return $this->post;
    }
    public function setPost(Post $post = null)
    {
        $this->post = $post;
    }

    public function getGrp()
    {
        return $this->grp;
    }
    public function setGrp(Grp $grp)
    {
        $this->grp = $grp;
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
	/**
	* @ORM\Column(name="answer6", type="boolean", nullable=true)
	*/
	private $answer6;
	/**
	* @ORM\Column(name="answer7", type="boolean", nullable=true)
	*/
	private $answer7;
	/**
	* @ORM\Column(name="answer8", type="boolean", nullable=true)
	*/
	private $answer8;
	/**
	* @ORM\Column(name="answer9", type="boolean", nullable=true)
	*/
	private $answer9;
	/**
	* @ORM\Column(name="answer10", type="boolean", nullable=true)
	*/
	private $answer10;	

	
	/**
	* @ORM\Column(name="score", type="integer", nullable=true)
	*/
	private $score;	
	
	public function getScore()
    {
        return $this->score;
    }
    public function setScore($score)
    {
        $this->score = $score;
    }
	
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
	
    public function getAnswer6()
    {
        return $this->answer6;
    }
    public function setAnswer6($answer6)
    {
        $this->answer6 = $answer6;
    }

	
    public function getAnswer7()
    {
        return $this->answer7;
    }
    public function setAnswer7($answer7)
    {
        $this->post = $answer7;
    }
	
    public function getAnswer8()
    {
        return $this->answer8;
    }
    public function setAnswer8($answer8)
    {
        $this->post = $answer8;
    }
	
    public function getAnswer9()
    {
        return $this->answer9;
    }
    public function setAnswer9($answer9)
    {
        $this->post = $answer9;
    }	

	public function getAnswer10()
    {
        return $this->answer10;
    }
    public function setAnswer10($answer10)
    {
        $this->post = $answer10;
    }	
	
}
