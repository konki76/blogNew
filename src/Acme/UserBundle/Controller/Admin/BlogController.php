<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\UserBundle\Controller\Admin;

use Acme\UserBundle\Entity\Answer;
use Acme\UserBundle\Entity\Grp;
use Acme\UserBundle\Entity\pGrp;
use Acme\UserBundle\Entity\Post;
use Acme\UserBundle\Entity\Qcm;
use Acme\UserBundle\Entity\Skill;
use Acme\UserBundle\Entity\UE;
use Acme\UserBundle\Entity\ueGrp;
use Acme\UserBundle\Entity\UserSkill;
use Acme\UserBundle\Form\AnswerType;
use Acme\UserBundle\Form\GrpType;
use Acme\UserBundle\Form\pGrpType;
use Acme\UserBundle\Form\PostType;
use Acme\UserBundle\Form\QcmType;
use Acme\UserBundle\Form\SkillType;
use Acme\UserBundle\Form\ueGrpType;
use Acme\UserBundle\Form\UEType;
use Acme\UserBundle\Form\UserSkillType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller used to manage blog contents in the backend.
 *
 * @Route("/admin")
 * @Security("has_role('ROLE_SUPER_ADMIN')")
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class BlogController extends Controller
{
    /**
     * Lists all Post entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/", name="admin_index")
     * @Route("/", name="admin_post_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$posts = $em->getRepository('AcmeUserBundle:Post')->findAll();

        //return $this->render('admin/blog/index.html.twig', array('posts' => $posts));
        return $this->render('admin/blog/index.html.twig');
    }
    
    /**
     *
     * @Route("/{slug}/index", name="admin_ue")
     * @Method({"GET", "POST"})
     *
     */
    public function ueShowPageAction(Request $request, $slug)
    {
    
        //doit afficher les liens des groupes
    //	return new Response('<html>toto</html>');
        $em = $this->getDoctrine()->getManager();
        $ue = $em->getRepository('AcmeUserBundle:UE')->findOneBySlug($slug);
        //charger les groupes liés à l'ue
        //$em = $this->getDoctrine()->getManager();
        //var_dump($ue);
        //$grps = $em->getRepository('AcmeUserBundle:Grp')->findAllByUe($ue->getSlug());
        $grps = $em->getRepository('AcmeUserBundle:Grp')->findAllBySlug($slug);
        //var_dump($grps);

        return $this->render('admin/blog/ue_index.html.twig', array('ue' => $ue,'grps'=> $grps));
    }
    
    /**
     * @Route("/grp/{slug}/index", name="admin_grpPage")
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
        //contient les identifiants des posts du groupe de question
        $str_pGrpTab = $pGrpTab;
        $this->getRequest()->query->get('str_pGrpTab');
        
        //requete pour récupérer tous les titres des questions du groupes
        
        //$em = $this->getDoctrine()->getManager();
        //$currentPost = $em->getRepository('AcmeUserBundle:Post')->getPost($page);
        $postsRq = $conn->executeQuery("SELECT id, title FROM post WHERE id IN (".$str_pGrpTab.")");
        $posts = $postsRq->fetchAll(\PDO::FETCH_ASSOC);
        
        //var_dump($str_pGrpTab);
        //var_dump($posts);
        return $this->render('admin/blog/grp_index.html.twig', array('grp' => $grp,'pGrpNextId' => $pGrpNextId,'str_pGrpTab' => $str_pGrpTab,'posts' => $posts));
    }
    
    /**
     * Creates a new Post entity.
     *
     * @Route("/post/new", name="admin_post_new")
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function newAction(Request $request)
    {
        $post = new Post();
        $post->setAuthorEmail($this->getUser()->getEmail());
        $form = $this->createForm(new PostType(), $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setSlug($this->get('slugger')->slugify($post->getTitle()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('admin_post_index');
        }

        return $this->render('admin/blog/new.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Post entity.
     *
     * @Route("/post/{id}", requirements={"id" = "\d+"}, name="admin_post_show")
     * @Method("GET")
     * @Security("post.isAuthor(user)")
     *
     * NOTE: You can also centralize security logic by using a "voter"
     * See http://symfony.com/doc/current/cookbook/security/voters_data_permission.html
     */
    public function showAction(Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);

        return $this->render('admin/blog/show.html.twig', array(
            'post'        => $post,
            'delete_form' => $deleteForm->createView(),
        ));
    }

//	admin_userSkill_edit
    /**
     * Displays a form to edit an existing Post entity.
     *
     * @Route("/userSkill/{id}/edit", requirements={"id" = "\d+"}, name="admin_userSkill_edit")
//     * @Method({"GET", "POST"})
     */
    public function userSkillEditAction(UserSkill $userSkill, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new UserSkillType(), $userSkill);
        $deleteForm = $this->createDeleteUserSkillForm($userSkill);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            //$userSkill->setSlug($this->get('slugger')->slugify($userSkill->getTitle()));
            $em->flush();

            return $this->redirectToRoute('admin_userSkill_edit', array('id' => $userSkill->getId()));
        }

//	  return new Response('<html><body>n ueIndex  varDump[.var_dump($ues).]</body></html>');
        
        return $this->render('admin/blog/userSkillEdit.html.twig', array(
            'userSkill'   => $userSkill,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    
    /**
     * Displays a form to edit an existing Post entity.
     *
     * @Route("/post/{id}/edit", requirements={"id" = "\d+"}, name="admin_post_edit")
     * @Method({"GET", "POST"})
     * @Security("post.isAuthor(user)")
     */
    public function editAction(Post $post, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new PostType(), $post);
        $deleteForm = $this->createDeleteForm($post);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $post->setSlug($this->get('slugger')->slugify($post->getTitle()));
            $em->flush();

            return $this->redirectToRoute('admin_post_edit', array('id' => $post->getId()));
        }

        return $this->render('admin/blog/edit.html.twig', array(
            'post'        => $post,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Post entity.
     *
     * @Route("/post/{id}", name="admin_post_delete")
     * @Method("DELETE")
     * @Security("post.isAuthor(user)")
     *
     * The Security annotation value is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the Acme\UserBundle\Entity\Post entity.
     */
    public function deleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('admin_post_index');
    }

    /**
     * Deletes a grp entity.
     *
     * @Route("/grp/{id}", name="admin_grp_delete")
     * @Method("DELETE")
     * @Security("grp.isAuthor(user)")
     *
     * The Security annotation value is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the Acme\UserBundle\Entity\Grp entity.
     */
    public function deleteGrpAction(Request $request, Grp $grp)
    {
        $form = $this->createDeleteForm($grp);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($grp);
            $em->flush();
        }

        return $this->redirectToRoute('admin_grp_index');
    }
    /**
     * Creates a form to delete a Post entity by id.
     *
     * This is necessary because browsers don't support HTTP methods different
     * from GET and POST. Since the controller that removes the blog posts expects
     * a DELETE method, the trick is to create a simple form that *fakes* the
     * HTTP DELETE method.
     * See http://symfony.com/doc/current/cookbook/routing/method_parameters.html.
     *
     * @param Post $post The post object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    
    
    private function createDeleteUserSkillForm(UserSkill $userSkill)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_userSkill_delete', array('id' => $userSkill->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Deletes a UserSkill entity.
     *
     * @Route("/userSkill/{id}", name="admin_userSkill_delete")
     * @Method("DELETE")
//     * @Security("userSkill.isAuthor(userSkill)")
     *
     * The Security annotation value is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the Acme\UserBundle\Entity\UserSkill entity.
     */
    public function deleteUserSkillAction(Request $request, UserSkill $userSkill)
    {
        $form = $this->createDeleteUserSkillForm($userSkill);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($userSkill);
            $em->flush();
        }

        return $this->redirectToRoute('admin_userSkill_index');
    }

    
    /**
     * Creates a form to delete a Grp entity by id.
     *
     * This is necessary because browsers don't support HTTP methods different
     * from GET and POST. Since the controller that removes the blog posts expects
     * a DELETE method, the trick is to create a simple form that *fakes* the
     * HTTP DELETE method.
     * See http://symfony.com/doc/current/cookbook/routing/method_parameters.html.
     *
     * @param Grp $grp The grp object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteGrpForm(Grp $grp)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_grp_delete', array('id' => $grp->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all UE entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_ue_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/ue/indexa", name="admin_ue_index")
     * @Method("GET")
     */
    public function ueIndexAction()
    {
        //$em = $this->getDoctrine()->getManager();
       //$ues = $em->getRepository('AcmeUserBundle:ueGrp')->findGrpByUe($ue);
       $em = $this->getDoctrine()->getManager();
        $ues = $em->getRepository('AcmeUserBundle:UE')->findAll();

     //  return new Response('<html><body>n ueIndex  varDump['.var_dump($ues).']</body></html>');
       return $this->render('admin/blog/ueIndex.html.twig', array('ues' => $ues));
    }
    
    /**
     * Lists all Qcm entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_qcm_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/qcm/indexa", name="admin_qcm_index")
     * @Method("GET")
     */
    public function qcmIndexAction()
    {
        //$em = $this->getDoctrine()->getManager();
       //$qcms = $em->getRepository('AcmeUserBundle:qcmGrp')->findGrpByUe($qcm);
       $em = $this->getDoctrine()->getManager();
        $qcms = $em->getRepository('AcmeUserBundle:Qcm')->findAll();

     //  return new Response('<html><body>n qcmIndex  varDump['.var_dump($qcms).']</body></html>');
       return $this->render('admin/blog/qcmIndex.html.twig', array('qcms' => $qcms));
    }


    
    /**
     * Lists all ueGrp entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/uegrp/{id}/list", name="admin_uegrp_list")
     * @Method({"GET", "POST"})
     */
    public function ueGrpListAction(UE $ue, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ueGrps = $em->getRepository('AcmeUserBundle:ueGrp')->findGrpsByueGrpId($ue->getId());

        $ueGrpsCt = $em->getRepository('AcmeUserBundle:ueGrp')->nextueGrpCt($ue->getId());
        
        $ueGrp = $em->getRepository('AcmeUserBundle:ueGrp')->currentueGrp($ue->getId());
        
        return $this->render('admin/blog/ueGrpShow.html.twig', array('ueGrps' => $ueGrps,'ueGrp' => $ueGrp,'ueGrpsCt' => $ueGrpsCt, 'ueId' => $ue->getId(), 'ueTitle' => $ue->getTitle()));
    }
    
    /**
     * Creates a new ueGrp entity.
     *
     * @Route("/ueGrp/{ueId}/new", requirements={"ueId" = "\d+"}, name="admin_ueGrp_new")	 
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function ueGrpNewAction(Request $request)
    {
        $uegrp = new ueGrp();
        $form = $this->createForm(new ueGrpType(), $uegrp);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($uegrp);
            $em->flush();

            return $this->redirectToRoute('admin_ue_index');
        }

        return $this->render('admin/blog/ueGrpNew.html.twig', array(
            'uegrp' => $uegrp,
            'form' => $form->createView(),
        ));
    }
    /**
     * Creates a new UE entity.
     *
     * @Route("/ue/new", name="admin_ue_new")
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function ueNewAction(Request $request)
    {
        $group = new UE();
        //$group->setAuthorEmail($this->getUser()->getEmail());
        $form = $this->createForm(new UEType(), $group);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement du group
            $group->setSlug($this->get('slugger')->slugify($group->getTitle()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();
            return $this->redirectToRoute('admin_ue_index');
        }

        return $this->render('admin/blog/grpNew.html.twig', array(
            'group' => $group,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit UE entity.
     *
     * @Route("/ue/{id}/edit",requirements={"id" = "\d+"}, name="admin_ue_edit")
     * @Method({"GET", "POST"})
     
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function ueEditAction(UE $ue, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new UEType(), $ue);
        $deleteForm = $this->createDeleteUeForm($ue);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $ue->setSlug($this->get('slugger')->slugify($ue->getTitle()));
            $em->flush();

            return $this->redirectToRoute('admin_ue_edit', array('id' => $ue->getId()));
        }

        return $this->render('admin/blog/ueEdit.html.twig', array(
            'ue'        => $ue,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a UE entity by id.
     *
     * This is necessary because browsers don't support HTTP methods different
     * from GET and POST. Since the controller that removes the blog posts expects
     * a DELETE method, the trick is to create a simple form that *fakes* the
     * HTTP DELETE method.
     * See http://symfony.com/doc/current/cookbook/routing/method_parameters.html.
     *
     * @param UE $ue The UE object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteUEForm(UE $ue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_ue_delete', array('id' => $ue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

/**
     * Deletes a ue entity.
     *
     * @Route("/ue/{id}/delete", name="admin_ue_delete")
     * @Method("DELETE")
     * @Security("ue.isAuthor(user)")
     *
     * The Security annotation value is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the Acme\UserBundle\Entity\UE entity.
     */
    public function deleteUeAction(Request $request, UE $ue)
    {
        $form = $this->createDeleteForm($ue);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($grp);
            $em->flush();
        }

        return $this->redirectToRoute('admin_ue_index');
    }
/******************************************************************************/
    /**
     * Creates a new Qcm entity.
     *
     * @Route("/qcm/new", name="admin_qcm_new")
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function qcmNewAction(Request $request)
    {
        $qcm = new Qcm();
        //$qcm->setAuthorEmail($this->getUser()->getEmail());
        $form = $this->createForm(new QcmType(), $qcm);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement du qcm
            $qcm->setSlug($this->get('slugger')->slugify($qcm->getTitle()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($qcm);
            $em->flush();
            return $this->redirectToRoute('admin_qcm_index');
        }

        return $this->render('admin/blog/qcmNew.html.twig', array(
            'qcm' => $qcm,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit Qcm entity.
     *
     * @Route("/qcm/{id}/edit",requirements={"id" = "\d+"}, name="admin_qcm_edit")
     * @Method({"GET", "POST"})
     
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function qcmEditAction(Qcm $qcm, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new QcmType(), $qcm);
        $deleteForm = $this->createDeleteQcmForm($qcm);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $qcm->setSlug($this->get('slugger')->slugify($qcm->getTitle()));
            $em->flush();

            return $this->redirectToRoute('admin_qcm_edit', array('id' => $qcm->getId()));
        }

        return $this->render('admin/blog/qcmEdit.html.twig', array(
            'qcm'        => $qcm,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Qcm entity by id.
     *
     * This is necessary because browsers don't support HTTP methods different
     * from GET and POST. Since the controller that removes the blog posts expects
     * a DELETE method, the trick is to create a simple form that *fakes* the
     * HTTP DELETE method.
     * See http://symfony.com/doc/current/cookbook/routing/method_parameters.html.
     *
     * @param Qcm $qcm The Qcm object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteQcmForm(Qcm $qcm)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_qcm_delete', array('id' => $qcm->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

/**
     * Deletes a qcm entity.
     *
     * @Route("/qcm/{id}/delete", name="admin_qcm_delete")
     * @Method("DELETE")
     * @Security("qcm.isAuthor(user)")
     *
     * The Security annotation valqcm is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the Acme\UserBundle\Entity\Qcm entity.
     */
    public function deleteQcmAction(Request $request, Qcm $qcm)
    {
        $form = $this->createDeleteForm($qcm);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($grp);
            $em->flush();
        }

        return $this->redirectToRoute('admin_qcm_index');
    }
    
    
/******************************************************************************/
    /**
     * Displays a form to edit an existing Answers entity.
     *
     * @Route("/post/{id}/answsers", requirements={"id" = "\d+"}, name="admin_post_answer_list")
     * @Method({"GET", "POST"})
     * @Security("post.isAuthor(user)")
     */
    public function answsersAction(Post $post, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $answers = $em->getRepository('AcmeUserBundle:Answer')->findAnswsersByPostId($post->getId());

        //a mettre à jour
        //return $this->render('admin/blog/index.html.twig', array('posts' => $answers));
    }
    
//	admin_skill_index
    /**
     * Lists all Skill entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/skill", name="admin_skill_index")
     * @Method("GET")
     */
    public function skillIndexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $skills = $em->getRepository('AcmeUserBundle:Skill')->findAll();
        //return $this->render('admin/blog/skillIndex.html.twig');
        return $this->render('admin/blog/skillIndex.html.twig', array('skills' => $skills));
    }
    
    /**
     * Creates a new Skill entity.
     *
     * @Route("/skill/new", name="admin_skill_new")
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function skillNewAction(Request $request)
    {
        $skill = new Skill();
        //$skill->setAuthorEmail($this->getUser()->getEmail());
        $form = $this->createForm(new SkillType(), $skill);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement du skill
            $skill->setSlug($this->get('slugger')->slugify($skill->getTitle()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush();
            return $this->redirectToRoute('admin_skill_index');
        }

        return $this->render('admin/blog/skillNew.html.twig', array(
            'skill' => $skill,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit Skill entity.
     *
     * @Route("/skill/{id}/edit",requirements={"id" = "\d+"}, name="admin_skill_edit")
     * @Method({"GET", "POST"})
     
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function skillEditAction(Skill $skill, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new SkillType(), $skill);
        $deleteForm = $this->createDeleteSkillForm($skill);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $skill->setSlug($this->get('slugger')->slugify($skill->getTitle()));
            $em->flush();

            return $this->redirectToRoute('admin_skill_edit', array('id' => $skill->getId()));
        }

        return $this->render('admin/blog/skillEdit.html.twig', array(
            'skill'        => $skill,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    
    /**
     * Lists all Group entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/grp", name="admin_grp_index")
     * @Method("GET")
     */
    public function grpIndexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $groups = $em->getRepository('AcmeUserBundle:Grp')->findAll();
        //return $this->render('admin/blog/groupIndex.html.twig');
        return $this->render('admin/blog/grpIndex.html.twig', array('groups' => $groups));
    }
    
    /**
     * Creates a new Grp entity.
     *
     * @Route("/grp/new", name="admin_grp_new")
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function grpNewAction(Request $request)
    {
        $group = new Grp();
        //$group->setAuthorEmail($this->getUser()->getEmail());
        $form = $this->createForm(new GrpType(), $group);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement du group
            $group->setSlug($this->get('slugger')->slugify($group->getTitle()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();
            return $this->redirectToRoute('admin_grp_index');
        }

        return $this->render('admin/blog/grpNew.html.twig', array(
            'group' => $group,
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit Grp entity.
     *
     * @Route("/grp/{id}/edit",requirements={"id" = "\d+"}, name="admin_grp_edit")
     * @Method({"GET", "POST"})
     
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function grpEditAction(Grp $grp, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new GrpType(), $grp);
        $deleteForm = $this->createDeleteGrpForm($grp);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $grp->setSlug($this->get('slugger')->slugify($grp->getTitle()));
            $em->flush();

            return $this->redirectToRoute('admin_grp_edit', array('id' => $grp->getId()));
        }

        return $this->render('admin/blog/grpEdit.html.twig', array(
            'grp'        => $grp,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
//	admin_userSkill_list
    /**
     * Lists all userSkill entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/userSkill/{id}/list", name="admin_userSkill_list")
     * @Method({"GET", "POST"})
     */
    public function userSkillListAction(Skill $skill, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $skillId = $skill->getId();
        $userSkills = $em->getRepository('AcmeUserBundle:UserSkill')->findUsersBySkillId($skillId);

  //      $pGrpsCt = $em->getRepository('AcmeUserBundle:userSkill')->nextpGrpCt($skill->getId());
        
    //	$userSkill = $em->getRepository('AcmeUserBundle:userSkill')->currentpGrp($skill->getId());
    //	return
   // return $this->render('admin/blog/pGrpShow.html.twig', array('pGrps' => $pGrps,'pGrp' => $pGrp,'pGrpsCt' => $pGrpsCt, 'grpId' => $grp->getId()));
 // return new Response('<html><body>n ueIndex  varDump['.var_dump($skillId).']</body></html>');
  return $this->render('admin/blog/userSkillShow.html.twig', array('userSkills' => $userSkills,'skillId' => $skillId ));
    }

    
    //
    /**
     * Creates a new userSkill entity.
     *
     * @Route("/userSkill/{skillId}/new", requirements={"skillId" = "\d+"}, name="admin_userSkill_new")	 
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function userSkillNewAction(Request $request)
    {
        $userSkill = new UserSkill();
        $form = $this->createForm(new userSkillType(), $userSkill);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $group->setSlug($this->get('slugger')->slugify($group->getTitle()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($userSkill);
            $em->flush();

            return $this->redirectToRoute('admin_skill_index');
        }

        return $this->render('admin/blog/userSkillNew.html.twig', array(
            'userSkill' => $userSkill,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Lists all pGrp entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/pgrp/{id}/list", name="admin_pgrp_list")
     * @Method({"GET", "POST"})
     */
    public function pGrpListAction(Grp $grp, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pGrps = $em->getRepository('AcmeUserBundle:pGrp')->findPostsBypGrpId($grp->getId());

        $pGrpsCt = $em->getRepository('AcmeUserBundle:pGrp')->nextpGrpCt($grp->getId());
        
        $pGrp = $em->getRepository('AcmeUserBundle:pGrp')->currentpGrp($grp->getId());
        
        return $this->render('admin/blog/pGrpShow.html.twig', array('pGrps' => $pGrps,'pGrp' => $pGrp,'pGrpsCt' => $pGrpsCt, 'grpId' => $grp->getId()));
    }

    
    //
    /**
     * Creates a new pGrp entity.
     *
     * @Route("/pGrp/{grpId}/new", requirements={"grpId" = "\d+"}, name="admin_pGrp_new")	 
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function pGrpNewAction(Request $request)
    {
        $pgrp = new pGrp();
        $form = $this->createForm(new pGrpType(), $pgrp);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $group->setSlug($this->get('slugger')->slugify($group->getTitle()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($pgrp);
            $em->flush();

            return $this->redirectToRoute('admin_grp_index');
        }

        return $this->render('admin/blog/pGrpNew.html.twig', array(
            'pgrp' => $pgrp,
            'form' => $form->createView(),
        ));
    }
}
