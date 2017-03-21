<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\UserBundle\Entity\Post;
use Acme\UserBundle\Entity\Answer;
use Acme\UserBundle\Form\AnswerType;
use Acme\UserBundle\Entity\Comment;
use Acme\UserBundle\Entity\Grp;
use Acme\UserBundle\Entity\UE;
use Acme\UserBundle\Form\CommentType;

/**
 * @Route("/blog")
 */
class BlogController extends Controller {

    /**
     * @Route("/pGrps", name="blog_grp_index")
     */
    public function grpIndexAction()
    {
        $em = $this->getDoctrine()->getManager();
		$pGrps = $em->getRepository('AcmeUserBundle:pGrp')->findAll();
		
        return $this->render('blog/index_showGrp.html.twig', array('pGrps' => $pGrps));
    }

    /**
     * @Route("/", name="blog_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
		$posts = $em->getRepository('AcmeUserBundle:Post')->findLatest(5);

		$em = $this->getDoctrine()->getManager();
        $grps = $em->getRepository('AcmeUserBundle:Grp')->findAll();
		//var_dump($grps);

		//$em = $this->getDoctrine()->getManager();
        //$grpCt = $em->getRepository('AcmeUserBundle:Grp')->grpCt();
		//$pGrp = $em->getRepository('AcmeUserBundle:pGrp')->currentpGrp($grp->getId());
        return $this->render('blog/index.html.twig', array('posts' => $posts, 'grps' => $grps, 'grpCt' => 2));
    }

	/**
     * @Route("/ue/{slug}/index", name="blog_uePage")
     */
    public function ueShowPageAction($slug) {    
	

		//faire une boucle qui supprime les  remove($id) [ou pas]
		$em = $this->getDoctrine()->getManager();
		$ue = $em->getRepository('AcmeUserBundle:UE')->findOneBySlug($slug);
		//charger les groupes liés à l'ue
		//$em = $this->getDoctrine()->getManager();
		//var_dump($ue);
		$grps = $em->getRepository('AcmeUserBundle:Grp')->findAllByUe($ue->getSlug());
		//$grps = $em->getRepository('AcmeUserBundle:Grp')->findAllBySlug($slug);
		//var_dump($grps);

		return $this->render('blog/ue_index.html.twig', array('ue' => $ue,'grps'=> $grps));
	}

	
	/**
     * @Route("/grp/{slug}/index", name="blog_grpPage")
     */
    public function grpShowPageAction($slug, Grp $grp) {    
	
		//faire une boucle qui supprime les  remove($id) [ou pas]
		
		//générer un tableau avec les posts du groupe à partir de grpSlug (slug)
		$em = $this->getDoctrine()->getManager();
		$pGrps = $em->getRepository('AcmeUserBundle:pGrp')->findAllByGrpSlug($slug);
		//var_dump($pGrps);
		
		//groupe => recupere les posts du groupe
		return $this->render('blog/grp_index.html.twig', array('grp' => $grp,'pGrps' => $pGrps));
	}
	
	/**
     * @Route("/ue/{id}", requirements={"id" = "\d+"}, name="blog_ueAllPage")
     */
    public function ueAllShowPageAction(UE $ue) {    
		$em = $this->getDoctrine()->getManager();
		$ues = $em->getRepository('AcmeUserBundle:ueGrp')->findGrpByUe($ue);
		
		//return new Response('<html><body>ueIndex ue[var_dump($ue)] varDump['.var_dump($ues).']</body></html>');
		return $this->render('blog/ue_index.html.twig', array('ue' => $ue, 'ues' => $ues));
	}
	
	/**
     * @Route("/grp/{grpSlug}/post/{page}", name="blog_grpPostPage")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
	 * @ParamConverter("grp", options={"mapping": {"grpSlug": "slug"}})
     */
    public function grpPostShowPageAction($grpSlug, $page, Grp $grp) {
		//supprime les réponses de l'user/grp/post correspondant
		$user = $this->getUser();
		$em = $this->getDoctrine()->getManager();
		$answersToRemove = $em->getRepository('AcmeUserBundle:Answer')->findOneByGrpUserPost($grp,$user,$page);
		foreach($answersToRemove as $answerToRemove) {
			$ansToDelete = $em->getRepository('AcmeUserBundle:Answer')->find($answerToRemove['a_id']);
			$em->remove($ansToDelete);
			$em->flush();
		}
//return new Response('<html><body>STAT page 0  $user['.$user.'] varDump['.var_dump($answersToRemove).']</body></html>');

		//recupere le contenu du post (à partir de page)
		$em = $this->getDoctrine()->getManager();
		$currentPost = $em->getRepository('AcmeUserBundle:Post')->getPost($page);
		
		//recupere l'id du prochain post : il s'agit du post le plus eleve dans le groupe grpId
		$em = $this->getDoctrine()->getManager();
		$nextCtPGrpId = 0;
		$nextCtPGrpId = $em->getRepository('AcmeUserBundle:pGrp')->nextPostCtpGrpId($grp,$page);			

		$em = $this->getDoctrine()->getManager();
		$nextPGrpId = 1;
		
		if($page == 0) {
			//calculer les stats à partir de la table answer
			$user = $this->getUser()->getEmail();

			//prerequis : pour chaque réponse un score est définir 0/1 => ok
			//récuperer les réponses en jointure avec les questions
			
			//faire une boucle qui calcule le score globale
			$emAns = $this->getDoctrine()->getManager();
			$answers = $emAns->getRepository('AcmeUserBundle:Answer')->statByGrpUser($grp, $user);
			$scoreMax = 0;
			$scoreUser = 0;
			foreach($answers as $statUnit) {
				$scoreMax++;
				if($statUnit['ps_answer1'] == $statUnit['a_answer1'] && $statUnit['ps_answer2'] == $statUnit['a_answer2'] && $statUnit['ps_answer3'] == $statUnit['a_answer3'] && $statUnit['ps_answer4'] == $statUnit['a_answer4'])
					$scoreUser++;
			}
			return $this->render('blog/grp_stat.html.twig', array('answers' => $answers, 'grp' => $grp,'scoreMax' => $scoreMax, 'scoreUser' => $scoreUser));			
//			return new Response('<html><body>STAT page 0  $user['.$user.'] $scoreMax['.$scoreMax.'] scoreUser['.$scoreUser.'] varDump[.var_dump($stat).]</body></html>');
		} 
		else if($nextCtPGrpId != 0) {
			$nextPGrpId = $em->getRepository('AcmeUserBundle:pGrp')->nextPostpGrpId($grp,$page);			
			$nextPost = $em->getRepository('AcmeUserBundle:pGrp')->postIdByPgrpId($nextPGrpId);
//			return new Response('<html><body>test grp $nextCtPGrpId['. $nextCtPGrpId .'] grpId['.$grpId.'] page['.$page.'] $nextPGrpId['.$nextPGrpId.'] nextPostId['.$nextPost[0]['ps_id'].']'.var_dump($nextPostId).'] </body></html>');
			$nextPostId = $nextPost[0]['ps_id'];
			return $this->render('blog/post_show_grp.html.twig', array('post' => $currentPost, 'grpSlug' => $grpSlug, 'nextPostId' => $nextPostId));
		} 
		else {
			//affiche la dernière question puis renvoi sur la page de synthèse
			//return new Response('<html><body>test end</body></html>');
//			$nextPost = $em->getRepository('AcmeUserBundle:pGrp')->postIdByPgrpId($nextPGrpId);
			$nextPostId = 0;
			return $this->render('blog/post_show_grp.html.twig', array('post' => $currentPost, 'grpSlug' => $grpSlug, 'nextPostId' => $nextPostId));
		}
		

		//$nextPostId = 0;
		//$nextPostId = $em->getRepository('UserBundle:post')->postByPGrpId($nextPGrpId);			

		//return new Response('<html><body>test $page['.$page.'] grpSlug['.$grpSlug.']nextPGrpId['.$nextPGrpId.']nextCtPGrpId['.$nextCtPGrpId.']</body></html>');
		//return $this->render('blog/post_show_grp.html.twig', array('post' => $currentPost, 'grpSlug' => $grpSlug, 'nextPostId' => $nextPGrpId));
	
	}
	
	
	/**
     * @Route("/post/{page}", name="blog_postPage")
     */
    public function postShowPageAction($page) {    
		$em = $this->getDoctrine()->getManager();
		$nextPidCt = $em->getRepository('AcmeUserBundle:Post')->nextPostCt($page);
		//return new Response('<html><body>test $page['.$page.'] $nextPidCt[' .$nextPidCt. ']</body></html>');
		$pGrpNextId = 0;
	
		if($nextPidCt == 0) {
			//return new Response('<html><body>test $page[' .$page. '] $postNext[' .$postNext->getId(). ']</body></html>');
			return new Response('<html><body>test $page['.$page.'] $nextPidCt[' .$nextPidCt. ']</body></html>');
			//return $this->render('blog/post_result.html.twig', array('post' => $postNext,'pGrpNextId' => $pGrpNextId));
		}
		else {
			$em = $this->getDoctrine()->getManager();
			$postNext = $em->getRepository('AcmeUserBundle:Post')->nextPost($page);

			return $this->render('blog/post_show.html.twig', array('post' => $postNext,'pGrpNextId' => $pGrpNextId));
		}
	
	}
	
    /**
     * @Route("/posts/{slug}", name="blog_post")
     */
    public function postShowAction(Post $post) {    
		return $this->render('blog/post_show.html.twig', array('post' => $post));
    }


	/**
     * @Route("/postAnswers/{slug}", name="blog_post_answer")
     */
    public function postShowAnswersAction(Post $post) {
		//affiche les réponses d'une question
        //return $this->render('blog/post_show_qcm.html.twig', array('post' => $post));
		return $this->render('blog/post_showAnswers.html.twig', array('post' => $post));
    }
	
	
    /**
     * @Route("/comment/{postSlug}/new", name = "comment_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @Method("POST")
     * @ParamConverter("post", options={"mapping": {"postSlug": "slug"}})
     */
    public function commentNewAction(Request $request, Post $post) {
        $form = $this->createCommentForm($post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Comment $comment */
            $comment = $form->getData();
            $comment->setAuthorEmail($this->getUser()->getEmail());
            $comment->setPost($post);
            $comment->setPublishedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('blog_post', array('slug' => $post->getSlug()));
        }

        return $this->render('blog/comment_form_error.html.twig', 
			array( 'post' => $post,'form' => $form->createView())
        );
    }

    /**
     * @param Post $post
     * @return Response
     */
    public function commentFormAction(Post $post) {
        $form = $this->createCommentForm($post);

        return $this->render('blog/comment_form.html.twig', 
			array('post' => $post, 'form' => $form->createView())
        );
    }

    private function createCommentForm()
    {
        $form = $this->createForm(new CommentType());
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
	
	/**
     * @Route("/grp/{grpSlug}/answer/new/{postSlug}/{nextPostId}", name = "answer_grp_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @Method("POST")
     * @ParamConverter("post", options={"mapping": {"postSlug": "slug"}})
	 * @ParamConverter("grp", options={"mapping": {"grpSlug": "slug"}})
     */
    public function answerGrpNewAction(Request $request, Post $post, $grpSlug, $nextPostId, Grp $grp) {
		$form = $this->createAnswerForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $answer = $form->getData();
            $answer->setAuthorEmail($this->getUser()->getEmail());
			//ajout du lien entre la réponse et le groupe de question grp
			//récupere l'identifiant associé à $grpSlug
            $answer->setGrp($grp);
			$answer->setPost($post);
            $answer->setPublishedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($answer);
            $em->flush();

			return $this->redirectToRoute('blog_grpPostPage', array('grpSlug' => $grpSlug,'page' => $nextPostId));
		}

        return $this->render('blog/answer_form_error.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
        ));		
	//	return new Response('<html><body>test $page['.$post->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');	
		return new Response('<html><body>test</body></html>');
	//return $this->redirectToRoute('blog_postPage', array('page' => 2));

    }
	
    /**
     * @Route("/answer/{postSlug}/new", name = "answer_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @Method("POST")
     * @ParamConverter("post", options={"mapping": {"postSlug": "slug"}})
     */
    public function answerNewAction(Request $request, Post $post) {
        $form = $this->createAnswerForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $answer = $form->getData();
            $answer->setAuthorEmail($this->getUser()->getEmail());
            $answer->setPost($post);
            $answer->setPublishedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($answer);
            $em->flush();

			//post' => $currentPost, 'grpSlug' => $grpSlug
			//$request->request->get('post', '1');
			//$grpSlug = $request->request->get('grpSlug', 'index');
			//$grpSlug = $request->query->get('grpSlug');
			//return new Response('<html><body>test $page['.$post->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');	
			return $this->redirectToRoute('blog_postPage', array('page' => $post->getId()+1));
        }

        return $this->render('blog/answer_form_error.html.twig', 
			array('post' => $post,'form' => $form->createView())
        );		
    }

	 /**
     * @param Post $post
     * @return Response
     */
    public function answerFormAction(Post $post) {
        $form = $this->createAnswerForm($post);

        return $this->render('blog/answer_form.html.twig', 
			array('post' => $post,'form' => $form->createView())
        );	
    }

	
	 /**
     * @param Post $post
     * @return Response
     */
    public function answerGrpFormAction(Post $post,$grp,$nextPostId) {
        $form = $this->createAnswerForm($post);

		//return new Response('<html><body>test $page['.$post->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');	
        return $this->render('blog/answer_grp_form.html.twig', 
			array( 'grp' => $grp,
				'nextPostId' => $nextPostId,
				'post' => $post,
				'form' => $form->createView(),
			)
        );	

    }
	
    private function createAnswerForm() {
        $form = $this->createForm(new AnswerType());
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
	
	
}
