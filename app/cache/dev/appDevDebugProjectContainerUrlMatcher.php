<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // admin_index
            if (rtrim($pathinfo, '/') === '/admin') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_index');
                }

                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::indexAction',  '_route' => 'admin_index',);
            }
            not_admin_index:

            // admin_post_index
            if (rtrim($pathinfo, '/') === '/admin') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_post_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_post_index');
                }

                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::indexAction',  '_route' => 'admin_post_index',);
            }
            not_admin_post_index:

            // admin_ue
            if (preg_match('#^/admin/(?P<slug>[^/]++)/index$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admin_ue;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ue')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueShowPageAction',));
            }
            not_admin_ue:

            // admin_grpPage
            if (0 === strpos($pathinfo, '/admin/grp') && preg_match('#^/admin/grp/(?P<slug>[^/]++)/index$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_grpPage')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpShowPageAction',));
            }

            if (0 === strpos($pathinfo, '/admin/post')) {
                // admin_post_new
                if ($pathinfo === '/admin/post/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_post_new;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::newAction',  '_route' => 'admin_post_new',);
                }
                not_admin_post_new:

                // admin_post_show
                if (preg_match('#^/admin/post/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_post_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_post_show')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::showAction',));
                }
                not_admin_post_show:

            }

            // admin_userSkill_edit
            if (0 === strpos($pathinfo, '/admin/userSkill') && preg_match('#^/admin/userSkill/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admin_userSkill_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_userSkill_edit')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::userSkillEditAction',));
            }
            not_admin_userSkill_edit:

            if (0 === strpos($pathinfo, '/admin/post')) {
                // admin_post_edit
                if (preg_match('#^/admin/post/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_post_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_post_edit')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::editAction',));
                }
                not_admin_post_edit:

                // admin_post_delete
                if (preg_match('#^/admin/post/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_admin_post_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_post_delete')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteAction',));
                }
                not_admin_post_delete:

            }

            // admin_grp_delete
            if (0 === strpos($pathinfo, '/admin/grp') && preg_match('#^/admin/grp/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_admin_grp_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_grp_delete')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteGrpAction',));
            }
            not_admin_grp_delete:

            if (0 === strpos($pathinfo, '/admin/u')) {
                // admin_userSkill_delete
                if (0 === strpos($pathinfo, '/admin/userSkill') && preg_match('#^/admin/userSkill/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_admin_userSkill_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_userSkill_delete')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteUserSkillAction',));
                }
                not_admin_userSkill_delete:

                // admin_ue_index
                if ($pathinfo === '/admin/ue/indexa') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_ue_index;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueIndexAction',  '_route' => 'admin_ue_index',);
                }
                not_admin_ue_index:

            }

            // admin_qcm_index
            if ($pathinfo === '/admin/qcm/indexa') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_qcm_index;
                }

                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::qcmIndexAction',  '_route' => 'admin_qcm_index',);
            }
            not_admin_qcm_index:

            if (0 === strpos($pathinfo, '/admin/ue')) {
                // admin_uegrp_list
                if (0 === strpos($pathinfo, '/admin/uegrp') && preg_match('#^/admin/uegrp/(?P<id>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_uegrp_list;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_uegrp_list')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueGrpListAction',));
                }
                not_admin_uegrp_list:

                // admin_ueGrp_new
                if (0 === strpos($pathinfo, '/admin/ueGrp') && preg_match('#^/admin/ueGrp/(?P<ueId>\\d+)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_ueGrp_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ueGrp_new')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueGrpNewAction',));
                }
                not_admin_ueGrp_new:

                // admin_ue_new
                if ($pathinfo === '/admin/ue/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_ue_new;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueNewAction',  '_route' => 'admin_ue_new',);
                }
                not_admin_ue_new:

                // admin_ue_edit
                if (preg_match('#^/admin/ue/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_ue_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ue_edit')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueEditAction',));
                }
                not_admin_ue_edit:

                // admin_ue_delete
                if (preg_match('#^/admin/ue/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_admin_ue_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_ue_delete')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteUeAction',));
                }
                not_admin_ue_delete:

            }

            if (0 === strpos($pathinfo, '/admin/qcm')) {
                // admin_qcm_new
                if ($pathinfo === '/admin/qcm/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_qcm_new;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::qcmNewAction',  '_route' => 'admin_qcm_new',);
                }
                not_admin_qcm_new:

                // admin_qcm_edit
                if (preg_match('#^/admin/qcm/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_qcm_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_qcm_edit')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::qcmEditAction',));
                }
                not_admin_qcm_edit:

                // admin_qcm_delete
                if (preg_match('#^/admin/qcm/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_admin_qcm_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_qcm_delete')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteQcmAction',));
                }
                not_admin_qcm_delete:

            }

            // admin_post_answer_list
            if (0 === strpos($pathinfo, '/admin/post') && preg_match('#^/admin/post/(?P<id>\\d+)/answsers$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admin_post_answer_list;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_post_answer_list')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::answsersAction',));
            }
            not_admin_post_answer_list:

            if (0 === strpos($pathinfo, '/admin/skill')) {
                // admin_skill_index
                if ($pathinfo === '/admin/skill') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_skill_index;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::skillIndexAction',  '_route' => 'admin_skill_index',);
                }
                not_admin_skill_index:

                // admin_skill_new
                if ($pathinfo === '/admin/skill/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_skill_new;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::skillNewAction',  '_route' => 'admin_skill_new',);
                }
                not_admin_skill_new:

                // admin_skill_edit
                if (preg_match('#^/admin/skill/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_skill_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_skill_edit')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::skillEditAction',));
                }
                not_admin_skill_edit:

            }

            if (0 === strpos($pathinfo, '/admin/grp')) {
                // admin_grp_index
                if ($pathinfo === '/admin/grp') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_grp_index;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpIndexAction',  '_route' => 'admin_grp_index',);
                }
                not_admin_grp_index:

                // admin_grp_new
                if ($pathinfo === '/admin/grp/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_grp_new;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpNewAction',  '_route' => 'admin_grp_new',);
                }
                not_admin_grp_new:

                // admin_grp_edit
                if (preg_match('#^/admin/grp/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_grp_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_grp_edit')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpEditAction',));
                }
                not_admin_grp_edit:

            }

            if (0 === strpos($pathinfo, '/admin/userSkill')) {
                // admin_userSkill_list
                if (preg_match('#^/admin/userSkill/(?P<id>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_userSkill_list;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_userSkill_list')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::userSkillListAction',));
                }
                not_admin_userSkill_list:

                // admin_userSkill_new
                if (preg_match('#^/admin/userSkill/(?P<skillId>\\d+)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_userSkill_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_userSkill_new')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::userSkillNewAction',));
                }
                not_admin_userSkill_new:

            }

            if (0 === strpos($pathinfo, '/admin/p')) {
                // admin_pgrp_list
                if (0 === strpos($pathinfo, '/admin/pgrp') && preg_match('#^/admin/pgrp/(?P<id>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_pgrp_list;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pgrp_list')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::pGrpListAction',));
                }
                not_admin_pgrp_list:

                // admin_pGrp_new
                if (0 === strpos($pathinfo, '/admin/pGrp') && preg_match('#^/admin/pGrp/(?P<grpId>\\d+)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_pGrp_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pGrp_new')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::pGrpNewAction',));
                }
                not_admin_pGrp_new:

            }

        }

        // registerCoach
        if (rtrim($pathinfo, '/') === '/registerCoach') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'registerCoach');
            }

            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::registerCoachAction',  '_route' => 'registerCoach',);
        }

        // Home
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'Home');
            }

            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::homeAction',  '_route' => 'Home',);
        }

        // user
        if ($pathinfo === '/user') {
            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::userAction',  '_route' => 'user',);
        }

        // blog_post
        if (0 === strpos($pathinfo, '/post') && preg_match('#^/post/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_post')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::postAction',));
        }

        if (0 === strpos($pathinfo, '/blog')) {
            // blog_grp_index
            if ($pathinfo === '/blog/pGrps') {
                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::grpIndexAction',  '_route' => 'blog_grp_index',);
            }

            // blog_index
            if (rtrim($pathinfo, '/') === '/blog') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'blog_index');
                }

                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::indexAction',  '_route' => 'blog_index',);
            }

            // blog_uePage
            if (0 === strpos($pathinfo, '/blog/ue') && preg_match('#^/blog/ue/(?P<slug>[^/]++)/index$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_uePage')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::ueShowPageAction',));
            }

            // blog_grpPage
            if (0 === strpos($pathinfo, '/blog/grp') && preg_match('#^/blog/grp/(?P<slug>[^/]++)/index$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_grpPage')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::grpShowPageAction',));
            }

            // blog_ueAllPage
            if (0 === strpos($pathinfo, '/blog/ue') && preg_match('#^/blog/ue/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_ueAllPage')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::ueAllShowPageAction',));
            }

            // answer
            if (0 === strpos($pathinfo, '/blog/Qcm') && preg_match('#^/blog/Qcm/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'answer')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::answerPageAction',));
            }

            // blog_grpQcmPage
            if (0 === strpos($pathinfo, '/blog/grp') && preg_match('#^/blog/grp/(?P<grpSlug>[^/]++)/Qcm/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_grpQcmPage')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::grpQcmShowPageAction',));
            }

            if (0 === strpos($pathinfo, '/blog/Qcm')) {
                // blog_QcmPage
                if (preg_match('#^/blog/Qcm/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_QcmPage')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::QcmShowPageAction',));
                }

                // blog_Qcm
                if (0 === strpos($pathinfo, '/blog/Qcms') && preg_match('#^/blog/Qcms/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_Qcm')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::QcmShowAction',));
                }

            }

        }

        // blog_Qcm_answer
        if (0 === strpos($pathinfo, '/QcmAnswers') && preg_match('#^/QcmAnswers/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_Qcm_answer')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::QcmShowAnswersAction',));
        }

        if (0 === strpos($pathinfo, '/blog')) {
            // comment_new
            if (preg_match('#^/blog/(?P<postSlug>[^/]++)/comment/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'comment_new')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::commentNewAction',));
            }

            // answer_grp_new
            if (0 === strpos($pathinfo, '/blog/grp') && preg_match('#^/blog/grp/(?P<grpSlug>[^/]++)/answer/new/(?P<qcmSlug>[^/]++)/(?P<nextQcmId>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_answer_grp_new;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'answer_grp_new')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::answerGrpNewAction',));
            }
            not_answer_grp_new:

            // answer_new
            if (0 === strpos($pathinfo, '/blog/answer') && preg_match('#^/blog/answer/(?P<QcmSlug>[^/]++)/new$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_answer_new;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'answer_new')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::answerNewAction',));
            }
            not_answer_new:

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction',  'template' => 'default/homepage.html.twig',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // hello_the_world
        if ($pathinfo === '/hello-world') {
            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\AdvertController::indexAction',  '_route' => 'hello_the_world',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
