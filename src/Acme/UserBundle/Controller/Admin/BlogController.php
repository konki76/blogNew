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

use Acme\UserBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Acme\UserBundle\Entity\Post;
use Acme\UserBundle\Entity\Answer;
use Acme\UserBundle\Entity\UE;
use Acme\UserBundle\Entity\Grp;
use Acme\UserBundle\Entity\ueGrp;
use Acme\UserBundle\Entity\pGrp;
use Acme\UserBundle\Form\AnswerType;
use Acme\UserBundle\Form\GrpType;
use Acme\UserBundle\Form\UEType;
use Acme\UserBundle\Form\pGrpType;
use Acme\UserBundle\Form\ueGrpType;
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
        $posts = $em->getRepository('AcmeUserBundle:Post')->findAll();

        return $this->render('admin/blog/index.html.twig', array('posts' => $posts));
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
/******************************************************************************/

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
     * @Route("/ue/index", name="admin_ue_index")
     * @Method("GET")
     */
    public function ueIndexAction()
    {
       //$em = $this->getDoctrine()->getManager();
       //$ues = $em->getRepository('AcmeUserBundle:ueGrp')->findGrpByUe($ue);
       $em = $this->getDoctrine()->getManager();
       $ues = $em->getRepository('AcmeUserBundle:UE')->findAll();
				
	   //return new Response('<html><body>ueIndex  varDump['.var_dump($ues).']</body></html>');
       return $this->render('admin/blog/ueIndex.html.twig', array('ues' => $ues));
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
		
        return $this->render('admin/blog/ueGrpShow.html.twig', array('ueGrps' => $ueGrps,'ueGrp' => $ueGrp,'ueGrpsCt' => $ueGrpsCt, 'ueId' => $ue->getId()));
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
    public function ueEditAction(UE $ue,Request $request)
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
    public function grpEditAction(Grp $grp,Request $request)
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
