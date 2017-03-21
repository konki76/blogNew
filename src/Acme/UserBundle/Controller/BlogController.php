<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\UserBundle\Entity\Qcm;
use Acme\UserBundle\Entity\Answer;
use Acme\UserBundle\Form\AnswerType;
use Acme\UserBundle\Entity\Comment;
use Acme\UserBundle\Entity\Grp;
use Acme\UserBundle\Entity\UE;
use Acme\UserBundle\Form\CommentType;
use Acme\UserBundle\Entity\Post;
/**
 * @Route("/")
 */
class BlogController extends Controller {

	/**
     * @Route("/", name="Home")
     */
    public function homeAction()
    {
		$em = $this->getDoctrine()->getManager();
		$posts = $em->getRepository('AcmeUserBundle:Post')->findLatest(3);

		$ues = $em->getRepository('AcmeUserBundle:UE')->findLatest(4);

		
		//return $this->render('default/homepage.html.twig');
		return $this->render('default/homepage.html.twig', array('ues' => $ues, 'posts' => $posts));
    }

	/**
     * @Route("/user", name="user")
     */
    public function userAction()
    {
		$em = $this->getDoctrine()->getManager();
//		$posts = $em->getRepository('AcmeUserBundle:Post')->findLatest(3);

		$ues = $em->getRepository('AcmeUserBundle:UE')->findLatest(4);	
		//return $this->render('default/homepage.html.twig');
		return $this->render('default/user.html.twig', array('ues' => $ues));
    }

	/**
     * @Route("/post/{id}", requirements={"id" = "\d+"}, name="blog_post")
     */
    public function postAction($id)
    {
		$em = $this->getDoctrine()->getManager();
		$post = $em->getRepository('AcmeUserBundle:Post')->getPost($id);
		return $this->render('blog/post_show.html.twig', array('post' => $post));
    }
	
	
    /**
     * @Route("/blog/pGrps", name="blog_grp_index")
     */
    public function grpIndexAction()
    {
        $em = $this->getDoctrine()->getManager();
		$pGrps = $em->getRepository('AcmeUserBundle:pGrp')->findAll();
		//$pGrpsTab = 

		return $this->render('blog/index_showGrp.html.twig', array('pGrps' => $pGrps));
    }

    /**
     * @Route("/blog/", name="blog_index")
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
     * @Route("/blog/ue/{slug}/index", name="blog_uePage")
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
     * @Route("/blog/grp/{slug}/index", name="blog_grpPage")
     */
    public function grpShowPageAction(Request $request,$slug, Grp $grp) {    



		//faire une boucle qui supprime les  remove($id) [ou pas]
		//générer un tableau avec les Qcms du groupe à partir de grpSlug (slug)
		$em = $this->getDoctrine()->getManager();
		$pGrps = $em->getRepository('AcmeUserBundle:pGrp')->findAllByGrpSlug($slug);

		//$pGrpTab = array();
		$conn = $this->get('database_connection');
		$pGrps = $conn->executeQuery("SELECT Qcm_id FROM pGrp WHERE grpSlug='".$slug."'");
		$items = $pGrps->fetchAll(\PDO::FETCH_ASSOC);
		//echo '$pGrps['.$pGrps.']';
		//var_dump($items);	
		$pGrpTab = '';
		$stop = 0;
		//$stopBis = 0;
		foreach ($items as $item) 
		{	
			//echo '$item['.$item['id'].']';	
			if($stop == 0)
			{
				$pGrpNextId = $item['Qcm_id'];
				$pGrpTab = $pGrpTab.$item['Qcm_id'];
			}
			else
			{

					$pGrpTab = $pGrpTab.','.$item['Qcm_id'];
			}
			$stop = 1;
		}
		$str_pGrpTab = $pGrpTab;
		
		
		$this->getRequest()->query->get('str_pGrpTab');
//		var_dump($slug);
//return new Response('<html><body>TEST</body></html>');		
		return $this->render('blog/grp_index.html.twig', array('grp' => $grp,'pGrpNextId' => $pGrpNextId,'str_pGrpTab' => $str_pGrpTab));
	}
	
	
	/**
     * @Route("/blog/ue/{id}", requirements={"id" = "\d+"}, name="blog_ueAllPage")
     */
    public function ueAllShowPageAction(UE $ue) 
	{    
		$em = $this->getDoctrine()->getManager();
		$ues = $em->getRepository('AcmeUserBundle:ueGrp')->findGrpByUe($ue);
		
		//return new Response('<html><body>ueIndex ue[var_dump($ue)] varDump['.var_dump($ues).']</body></html>');
		return $this->render('blog/ue_index.html.twig', array('ue' => $ue, 'ues' => $ues));
	}

	/**
     * @Route("/blog/Qcm/{page}", requirements={"id" = "\d+"}, name="answer")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function answerPageAction($page) 
	{   
		//recupere le contenu du Qcm (à partir de page)
		$em = $this->getDoctrine()->getManager();
		$currentQcm = $em->getRepository('AcmeUserBundle:Qcm')->getQcm($page);
		//echo '['.var_dump($currentQcm).']';
		//return new Response('<html><body>ueIndex ue[var_dump($ue)] varDump['.var_dump($ues).']</body></html>');
		return $this->render('blog/answer_show.html.twig', array('qcm' => $currentQcm));
	}
	
	/**
     * @Route("/blog/grp/{grpSlug}/Qcm/{page}", name="blog_grpQcmPage")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
	 * @ParamConverter("grp", options={"mapping": {"grpSlug": "slug"}})
     */
    public function grpQcmShowPageAction(Request $request,$grpSlug, $page, Grp $grp) 
	{
	//supprime les réponses de l'user/grp/Qcm correspondant
		$user = $this->getUser();
		$em = $this->getDoctrine()->getManager();
		$answersToRemove = $em->getRepository('AcmeUserBundle:Answer')->findOneByGrpUserQcm($grp,$user,$page);
		foreach($answersToRemove as $answerToRemove) 
		{
			$ansToDelete = $em->getRepository('AcmeUserBundle:Answer')->find($answerToRemove['a_id']);
			$em->remove($ansToDelete);
			$em->flush();
		}
//return new Response('<html><body>STAT page 0  $user['.$user.'] varDump['.var_dump($answersToRemove).']</body></html>');

		//recupere le contenu du Qcm (à partir de page)
		$em = $this->getDoctrine()->getManager();
		$currentQcm = $em->getRepository('AcmeUserBundle:Qcm')->getQcm($page);
		
		/*
		//recupere l'id du prochain Qcm : il s'agit du Qcm le plus eleve dans le groupe grpId
		$em = $this->getDoctrine()->getManager();
		$nextCtPGrpId = 0;
		$nextCtPGrpId = $em->getRepository('AcmeUserBundle:pGrp')->nextQcmCtpGrpId($grp,$page);// a revoir
		*/
		
		//Récupère les identifiants des questions du groupes
		$str_pGrpTab = $request->request->get('str_pGrpTab');		
//		echo '$str_pGrpTab['.$str_pGrpTab.']<br>';
		$pGrpTab=explode(",",$str_pGrpTab);//retourne un tableau
		$nextQcmId = 0;
		for ($i = 0; $i < count($pGrpTab); $i++) 
		{
//			echo '===> $pGrpTab[$i]['.$pGrpTab[$i].']$page['.$page.']<br>';
			if($pGrpTab[$i] == $page)
			{
				if(($i+1) != count($pGrpTab))
					$nextQcmId = $pGrpTab[$i+1];
			}
		}
//		echo '==========> $nextQcmId['.$nextQcmId.']<br>';
		//unset($pGrpTab[0]);//vide l'élement du 1er tableau
		//$pGrpTab = array_values($pGrpTab);
//		$str_pGrpTab = implode(",", $pGrpTab);
		//echo '$2pGrpTab ['.$pGrpTab .']<br>';

		//calculer l'identifiant de la prochaine question (nextQcmId)
		
		
		//$nextQcmId = 0;
		$em = $this->getDoctrine()->getManager();
		$nextPGrpId = 1;
		//echo 'test 1';
		if($page == 0) 
		{
//			echo 'test page0';
		//calculer les stats à partir de la table answer
			$user = $this->getUser()->getEmail();

			//prerequis : pour chaque réponse un score est définir 0/1 => ok
			//récuperer les réponses en jointure avec les questions
			
			//faire une boucle qui calcule le score globale
			$emAns = $this->getDoctrine()->getManager();
			$answers = $emAns->getRepository('AcmeUserBundle:Answer')->statByGrpUser($grp, $user);
			$scoreMax = 0;
			$scoreUser = 0;
			foreach($answers as $statUnit) 
			{
				$scoreMax++;
				if($statUnit['ps_answer1'] == $statUnit['a_answer1'] && $statUnit['ps_answer2'] == $statUnit['a_answer2'] && $statUnit['ps_answer3'] == $statUnit['a_answer3'] && $statUnit['ps_answer4'] == $statUnit['a_answer4'])
					$scoreUser++;
			}
			//echo '['.var_dump($answers).']';
			return $this->render('blog/grp_stat.html.twig', array('answers' => $answers, 'grp' => $grp,'scoreMax' => $scoreMax, 'scoreUser' => $scoreUser));			
//			return new Response('<html><body>STAT page 0  $user['.$user.'] $scoreMax['.$scoreMax.'] scoreUser['.$scoreUser.'] varDump[.var_dump($stat).]</body></html>');
		} 
		else 
		{
			//echo '['.var_dump($answers).']';
			return $this->render('blog/qcm_show_grp.html.twig', array('qcm' => $currentQcm, 'str_pGrpTab'=> $str_pGrpTab, 'grpSlug' => $grpSlug, 'nextQcmId' => $nextQcmId));
		}
	}
	
	
	/**
     * @Route("/blog/Qcm/{page}", name="blog_QcmPage")
     */
    public function QcmShowPageAction($page) {    
		$em = $this->getDoctrine()->getManager();
		$nextPidCt = $em->getRepository('AcmeUserBundle:Qcm')->nextQcmCt($page);
		//return new Response('<html><body>test $page['.$page.'] $nextPidCt[' .$nextPidCt. ']</body></html>');
		$pGrpNextId = 0;
	
		if($nextPidCt == 0) {
			//return new Response('<html><body>test $page[' .$page. '] $QcmNext[' .$QcmNext->getId(). ']</body></html>');
			return new Response('<html><body>test $page['.$page.'] $nextPidCt[' .$nextPidCt. ']</body></html>');
			//return $this->render('blog/Qcm_result.html.twig', array('Qcm' => $QcmNext,'pGrpNextId' => $pGrpNextId));
		}
		else {
			$em = $this->getDoctrine()->getManager();
			$QcmNext = $em->getRepository('AcmeUserBundle:Qcm')->nextQcm($page);

			return $this->render('blog/Qcm_show.html.twig', array('Qcm' => $QcmNext,'pGrpNextId' => $pGrpNextId));
		}
	
	}
	
    /**
     * @Route("/blog/Qcms/{slug}", name="blog_Qcm")
     */
    public function QcmShowAction(Qcm $Qcm) {    
		return $this->render('blog/Qcm_show.html.twig', array('Qcm' => $Qcm));
    }


	/**
     * @Route("/QcmAnswers/{slug}", name="blog_Qcm_answer")
     */
    public function QcmShowAnswersAction(Qcm $Qcm) {
		//affiche les réponses d'une question
        //return $this->render('blog/Qcm_show_qcm.html.twig', array('Qcm' => $Qcm));
		return $this->render('blog/Qcm_showAnswers.html.twig', array('Qcm' => $Qcm));
    }
	
	
    /**
     * @Route("/blog/{postSlug}/comment/new", name = "comment_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @ParamConverter("post", options={"mapping": {"slug": "postSlug"}})
     */
    public function commentNewAction(Request $request,$postSlug) 
	{
// * @ParamConverter("Post", class="AcmeUserBundle:Post" ,options={"mapping": {"postSlug": "slug"}})
		//$post = $request->attributes->get('post');

		//return new Response('<html><body>commentNewAction postSlug['.$postSlug.']</body></html>');
		
		$form = $this->createCommentForm(new CommentType());
		$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
		{
		//	$postId = $post->getId();
		$em = $this->getDoctrine()->getManager();
		$post = $em->getRepository('AcmeUserBundle:Post')->findOneBySlug($postSlug);
		
            $comment = $form->getData();
            $comment->setAuthorEmail($this->getUser()->getEmail());
            $comment->setPost($post);
            $comment->setPublishedAt(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('blog_post', array('id' => $post->getId()));
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
     * @Route("/blog/grp/{grpSlug}/answer/new/{qcmSlug}/{nextQcmId}", name = "answer_grp_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @Method("POST")
     * @ParamConverter("qcm", options={"mapping": {"qcmSlug": "slug"}})
	 * @ParamConverter("grp", options={"mapping": {"grpSlug": "slug"}})
     */
    public function answerGrpNewAction(Request $request, Qcm $qcm, $grpSlug, $nextQcmId, Grp $grp) 
	{
		$str_pGrpTab = $request->request->get('str_pGrpTab');
		echo '==================>$str_pGrpTab['.$str_pGrpTab.']';
		$form = $this->createAnswerForm($qcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
		{	
            $answer = $form->getData();
            $answer->setAuthorEmail($this->getUser()->getEmail());
			//ajout du lien entre la réponse et le groupe de question grp
			//récupere l'identifiant associé à $grpSlug
            $answer->setGrp($grp);
			$answer->setQcm($qcm);
            $answer->setPublishedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($answer);
            $em->flush();

			//ajouter en qcm :,'str_pGrpTab' => $str_pGrpTab
			return $this->redirectToRoute('blog_grpQcmPage', array('grpSlug' => $grpSlug,'page' => $nextQcmId, 'request'=> $request),307);
		}

        return $this->render('blog/answer_form_error.html.twig', array(
            'qcm' => $qcm,
            'form' => $form->createView(),
        ));		
	//	return new Response('<html><body>test $page['.$Qcm->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');	
	//	return new Response('<html><body>test</body></html>');
	//return $this->redirectToRoute('blog_QcmPage', array('page' => 2));

    }
	
    /**
     * @Route("/blog/answer/{QcmSlug}/new", name = "answer_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @Method("POST")
     * @ParamConverter("Qcm", options={"mapping": {"QcmSlug": "slug"}})
     */
    public function answerNewAction(Request $request, Qcm $qcm, $answer_grp_form) 
	{
        $form = $this->createAnswerForm($qcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
		{
            $answer = $form->getData();
            $answer->setAuthorEmail($this->getUser()->getEmail());
            $answer->setQcm($qcm);
            $answer->setPublishedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($answer);
            $em->flush();

			//Qcm' => $currentQcm, 'grpSlug' => $grpSlug
			//$request->request->get('Qcm', '1');
			//$grpSlug = $request->request->get('grpSlug', 'index');
			//$grpSlug = $request->query->get('grpSlug');
			//return new Response('<html><body>test $page['.$Qcm->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');	
			return $this->redirectToRoute('blog_QcmPage', array('page' => '229'));
        }

        return $this->render('blog/answer_form_error.html.twig', 
			array('qcm' => $qcm,'form' => $form->createView())
        );		
    }

	 /**
     * @param comment $comment
     * @return Response
     */
    public function answerFormAction(Comment $comment) {
        $form = $this->createAnswerForm($comment);

        return $this->render('blog/answer_form.html.twig', 
			array('comment' => $comment,'form' => $form->createView())
        );	
    }

	
	 /**
     * @param qcm $qcm
     * @return Response
     */
    public function answerGrpFormAction(Qcm $qcm,$grp,$nextQcmId,$str_pGrpTab) 
	{
        $form = $this->createAnswerForm($qcm);

		//return new Response('<html><body>test $page['.$qcm->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');	
        return $this->render('blog/answer_grp_form.html.twig', 
			array( 'grp' => $grp,
				'nextQcmId' => $nextQcmId,
				'str_pGrpTab' => $str_pGrpTab,
				'qcm' => $qcm,
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
