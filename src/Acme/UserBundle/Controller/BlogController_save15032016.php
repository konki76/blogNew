<?php

namespace Acme\UserBundle\Controller;

use Acme\UserBundle\Entity\Answer;
use Acme\UserBundle\Entity\Comment;
use Acme\UserBundle\Entity\Grp;
use Acme\UserBundle\Entity\Post;
use Acme\UserBundle\Entity\UE;
use Acme\UserBundle\Form\AnswerType;
use Acme\UserBundle\Form\CommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/blog")
 */
class BlogController extends Controller
{

    /**
     * @Route("/pGrps", name="blog_grp_index")
     */
    public function grpIndexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pGrps = $em->getRepository('AcmeUserBundle:pGrp')->findAll();
        //$pGrpsTab =

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
    public function ueShowPageAction($slug)
    {
    

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
    public function grpShowPageAction(Request $request, $slug, Grp $grp)
    {
        //faire une boucle qui supprime les  remove($id) [ou pas]
        //générer un tableau avec les posts du groupe à partir de grpSlug (slug)
        $em = $this->getDoctrine()->getManager();
        $pGrps = $em->getRepository('AcmeUserBundle:pGrp')->findAllByGrpSlug($slug);

        //$pGrpTab = array();
        $conn = $this->get('database_connection');
        $pGrps = $conn->executeQuery("SELECT post_id FROM pGrp WHERE grpSlug='".$slug."'");
        $items = $pGrps->fetchAll(\PDO::FETCH_ASSOC);
        //echo '$pGrps['.$pGrps.']';
        /*
        $categories_par_id = array(2 => <objet catégorie id=2>,
            36 => <objet catégorie id=36>,
            8 => <objet catégorie id=8>);
        */
        //var_dump($items);
        $pGrpTab = '';
        $stop = 0;
        //$stopBis = 0;
        foreach ($items as $item) {
            //echo '$item['.$item['id'].']';
            if ($stop == 0) {
                $pGrpNextId = $item['post_id'];
                $pGrpTab = $pGrpTab.$item['post_id'];
            } else {
                $pGrpTab = $pGrpTab.','.$item['post_id'];
            }
            $stop = 1;
        }
        $str_pGrpTab = $pGrpTab;
        
        
        $this->getRequest()->query->get('str_pGrpTab');
//		var_dump($slug);

        return $this->render('blog/grp_index.html.twig', array('grp' => $grp,'pGrpNextId' => $pGrpNextId,'str_pGrpTab' => $str_pGrpTab));
    }
    
    
    /**
     * @Route("/ue/{id}", requirements={"id" = "\d+"}, name="blog_ueAllPage")
     */
    public function ueAllShowPageAction(UE $ue)
    {
        $em = $this->getDoctrine()->getManager();
        $ues = $em->getRepository('AcmeUserBundle:ueGrp')->findGrpByUe($ue);
        
        //return new Response('<html><body>ueIndex ue[var_dump($ue)] varDump['.var_dump($ues).']</body></html>');
        return $this->render('blog/ue_index.html.twig', array('ue' => $ue, 'ues' => $ues));
    }

    /**
     * @Route("/post/{page}", requirements={"id" = "\d+"}, name="answer")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function answerPageAction($page)
    {
        //recupere le contenu du post (à partir de page)
        $em = $this->getDoctrine()->getManager();
        $currentPost = $em->getRepository('AcmeUserBundle:Post')->getPost($page);
        //echo '['.var_dump($currentPost).']';
        //return new Response('<html><body>ueIndex ue[var_dump($ue)] varDump['.var_dump($ues).']</body></html>');
        return $this->render('blog/answer_show.html.twig', array('post' => $currentPost));
    }
    
    /**
     * @Route("/grp/{grpSlug}/post/{page}", name="blog_grpPostPage")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @ParamConverter("grp", options={"mapping": {"grpSlug": "slug"}})
     */
    public function grpPostShowPageAction(Request $request, $grpSlug, $page, Grp $grp)
    {
        //supprime les réponses de l'user/grp/post correspondant
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $answersToRemove = $em->getRepository('AcmeUserBundle:Answer')->findOneByGrpUserPost($grp, $user, $page);
        foreach ($answersToRemove as $answerToRemove) {
            $ansToDelete = $em->getRepository('AcmeUserBundle:Answer')->find($answerToRemove['a_id']);
            $em->remove($ansToDelete);
            $em->flush();
        }
//return new Response('<html><body>STAT page 0  $user['.$user.'] varDump['.var_dump($answersToRemove).']</body></html>');

        //recupere le contenu du post (à partir de page)
        $em = $this->getDoctrine()->getManager();
        $currentPost = $em->getRepository('AcmeUserBundle:Post')->getPost($page);
        
        /*
        //recupere l'id du prochain post : il s'agit du post le plus eleve dans le groupe grpId
        $em = $this->getDoctrine()->getManager();
        $nextCtPGrpId = 0;
        $nextCtPGrpId = $em->getRepository('AcmeUserBundle:pGrp')->nextPostCtpGrpId($grp,$page);// a revoir
        */
        
        //Récupère les identifiants des questions du groupes
        $str_pGrpTab = $request->request->get('str_pGrpTab');
//		echo '$str_pGrpTab['.$str_pGrpTab.']<br>';
        $pGrpTab=explode(",", $str_pGrpTab);//retourne un tableau
        $nextPostId = 0;
        for ($i = 0; $i < count($pGrpTab); $i++) {
            //			echo '===> $pGrpTab[$i]['.$pGrpTab[$i].']$page['.$page.']<br>';
            if ($pGrpTab[$i] == $page) {
                if (($i+1) != count($pGrpTab)) {
                    $nextPostId = $pGrpTab[$i+1];
                }
            }
        }
//		echo '==========> $nextPostId['.$nextPostId.']<br>';
        //unset($pGrpTab[0]);//vide l'élement du 1er tableau
        //$pGrpTab = array_values($pGrpTab);
//		$str_pGrpTab = implode(",", $pGrpTab);
        //echo '$2pGrpTab ['.$pGrpTab .']<br>';

        //calculer l'identifiant de la prochaine question (nextPostId)
        
        
        //$nextPostId = 0;
        $em = $this->getDoctrine()->getManager();
        $nextPGrpId = 1;
        //echo 'test 1';
        if ($page == 0) {
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
            foreach ($answers as $statUnit) {
                $scoreMax++;
                if ($statUnit['ps_answer1'] == $statUnit['a_answer1'] && $statUnit['ps_answer2'] == $statUnit['a_answer2'] && $statUnit['ps_answer3'] == $statUnit['a_answer3'] && $statUnit['ps_answer4'] == $statUnit['a_answer4']) {
                    $scoreUser++;
                }
            }
            //echo '['.var_dump($answers).']';
            return $this->render('blog/grp_stat.html.twig', array('answers' => $answers, 'grp' => $grp,'scoreMax' => $scoreMax, 'scoreUser' => $scoreUser));
//			return new Response('<html><body>STAT page 0  $user['.$user.'] $scoreMax['.$scoreMax.'] scoreUser['.$scoreUser.'] varDump[.var_dump($stat).]</body></html>');
        } else {
            return $this->render('blog/post_show_grp.html.twig', array('post' => $currentPost, 'str_pGrpTab'=> $str_pGrpTab, 'grpSlug' => $grpSlug, 'nextPostId' => $nextPostId));
        }
    }
    
    
    /**
     * @Route("/post/{page}", name="blog_postPage")
     */
    public function postShowPageAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $nextPidCt = $em->getRepository('AcmeUserBundle:Post')->nextPostCt($page);
        //return new Response('<html><body>test $page['.$page.'] $nextPidCt[' .$nextPidCt. ']</body></html>');
        $pGrpNextId = 0;
    
        if ($nextPidCt == 0) {
            //return new Response('<html><body>test $page[' .$page. '] $postNext[' .$postNext->getId(). ']</body></html>');
            return new Response('<html><body>test $page['.$page.'] $nextPidCt[' .$nextPidCt. ']</body></html>');
            //return $this->render('blog/post_result.html.twig', array('post' => $postNext,'pGrpNextId' => $pGrpNextId));
        } else {
            $em = $this->getDoctrine()->getManager();
            $postNext = $em->getRepository('AcmeUserBundle:Post')->nextPost($page);

            return $this->render('blog/post_show.html.twig', array('post' => $postNext,'pGrpNextId' => $pGrpNextId));
        }
    }
    
    /**
     * @Route("/posts/{slug}", name="blog_post")
     */
    public function postShowAction(Post $post)
    {
        return $this->render('blog/post_show.html.twig', array('post' => $post));
    }


    /**
     * @Route("/postAnswers/{slug}", name="blog_post_answer")
     */
    public function postShowAnswersAction(Post $post)
    {
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
    public function commentNewAction(Request $request, Post $post)
    {
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
    public function commentFormAction(Post $post)
    {
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
    public function answerGrpNewAction(Request $request, Post $post, $grpSlug, $nextPostId, Grp $grp)
    {
        $str_pGrpTab = $request->request->get('str_pGrpTab');
        echo '==================>$str_pGrpTab['.$str_pGrpTab.']';
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

            //ajouter en post :,'str_pGrpTab' => $str_pGrpTab
            return $this->redirectToRoute('blog_grpPostPage', array('grpSlug' => $grpSlug,'page' => $nextPostId, 'request'=> $request), 307);
        }

        return $this->render('blog/answer_form_error.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
        ));
    //	return new Response('<html><body>test $page['.$post->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');
    //	return new Response('<html><body>test</body></html>');
    //return $this->redirectToRoute('blog_postPage', array('page' => 2));
    }
    
    /**
     * @Route("/answer/{postSlug}/new", name = "answer_new")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @Method("POST")
     * @ParamConverter("post", options={"mapping": {"postSlug": "slug"}})
     */
    public function answerNewAction(Request $request, Post $post, $answer_grp_form)
    {
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
            return $this->redirectToRoute('blog_postPage', array('page' => '229'));
        }

        return $this->render('blog/answer_form_error.html.twig',
            array('post' => $post,'form' => $form->createView())
        );
    }

     /**
     * @param Post $post
     * @return Response
     */
    public function answerFormAction(Post $post)
    {
        $form = $this->createAnswerForm($post);

        return $this->render('blog/answer_form.html.twig',
            array('post' => $post,'form' => $form->createView())
        );
    }

    
     /**
     * @param Post $post
     * @return Response
     */
    public function answerGrpFormAction(Post $post, $grp, $nextPostId, $str_pGrpTab)
    {
        $form = $this->createAnswerForm($post);

        //return new Response('<html><body>test $page['.$post->getId().'] $grpSlug[' .$grpSlug. ']</body></html>');
        return $this->render('blog/answer_grp_form.html.twig',
            array( 'grp' => $grp,
                'nextPostId' => $nextPostId,
                'str_pGrpTab' => $str_pGrpTab,
                'post' => $post,
                'form' => $form->createView(),
            )
        );
    }
    
    private function createAnswerForm()
    {
        $form = $this->createForm(new AnswerType());
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
}
