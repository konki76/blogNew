<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevDebugProjectContainerUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_post_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_ue' => array (  0 =>   array (    0 => 'slug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueShowPageAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/index',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'slug',    ),    2 =>     array (      0 => 'text',      1 => '/admin',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_grpPage' => array (  0 =>   array (    0 => 'slug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpShowPageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/index',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'slug',    ),    2 =>     array (      0 => 'text',      1 => '/admin/grp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_post_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::newAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/post/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_post_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::showAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/post',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_userSkill_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::userSkillEditAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/userSkill',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_post_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::editAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/post',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_post_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/post',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_grp_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteGrpAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/grp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_userSkill_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteUserSkillAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/userSkill',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_ue_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueIndexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/ue/indexa',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_qcm_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::qcmIndexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/qcm/indexa',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_uegrp_list' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueGrpListAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/list',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/uegrp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_ueGrp_new' => array (  0 =>   array (    0 => 'ueId',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueGrpNewAction',  ),  2 =>   array (    'ueId' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/new',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'ueId',    ),    2 =>     array (      0 => 'text',      1 => '/admin/ueGrp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_ue_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueNewAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/ue/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_ue_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::ueEditAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/ue',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_ue_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteUeAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/ue',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_qcm_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::qcmNewAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/qcm/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_qcm_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::qcmEditAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/qcm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_qcm_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::deleteQcmAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/qcm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_post_answer_list' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::answsersAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/answsers',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/post',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_skill_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::skillIndexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/skill',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_skill_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::skillNewAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/skill/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_skill_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::skillEditAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/skill',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_grp_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpIndexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/grp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_grp_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpNewAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/grp/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_grp_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::grpEditAction',  ),  2 =>   array (    'id' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/grp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_userSkill_list' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::userSkillListAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/list',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/userSkill',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_userSkill_new' => array (  0 =>   array (    0 => 'skillId',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::userSkillNewAction',  ),  2 =>   array (    'skillId' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/new',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'skillId',    ),    2 =>     array (      0 => 'text',      1 => '/admin/userSkill',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_pgrp_list' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::pGrpListAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/list',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/pgrp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_pGrp_new' => array (  0 =>   array (    0 => 'grpId',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\Admin\\BlogController::pGrpNewAction',  ),  2 =>   array (    'grpId' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/new',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'grpId',    ),    2 =>     array (      0 => 'text',      1 => '/admin/pGrp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'registerCoach' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::registerCoachAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/registerCoach/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::userAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_post' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::postAction',  ),  2 =>   array (    'id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/post',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_grp_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::grpIndexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/blog/pGrps',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/blog/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_uePage' => array (  0 =>   array (    0 => 'slug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::ueShowPageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/index',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'slug',    ),    2 =>     array (      0 => 'text',      1 => '/blog/ue',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_grpPage' => array (  0 =>   array (    0 => 'slug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::grpShowPageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/index',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'slug',    ),    2 =>     array (      0 => 'text',      1 => '/blog/grp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_ueAllPage' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::ueAllShowPageAction',  ),  2 =>   array (    'id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/blog/ue',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'answer' => array (  0 =>   array (    0 => 'page',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::answerPageAction',  ),  2 =>   array (    'id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'page',    ),    1 =>     array (      0 => 'text',      1 => '/blog/Qcm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_grpQcmPage' => array (  0 =>   array (    0 => 'grpSlug',    1 => 'page',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::grpQcmShowPageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'page',    ),    1 =>     array (      0 => 'text',      1 => '/Qcm',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'grpSlug',    ),    3 =>     array (      0 => 'text',      1 => '/blog/grp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_QcmPage' => array (  0 =>   array (    0 => 'page',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::QcmShowPageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'page',    ),    1 =>     array (      0 => 'text',      1 => '/blog/Qcm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_Qcm' => array (  0 =>   array (    0 => 'slug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::QcmShowAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'slug',    ),    1 =>     array (      0 => 'text',      1 => '/blog/Qcms',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blog_Qcm_answer' => array (  0 =>   array (    0 => 'slug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::QcmShowAnswersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'slug',    ),    1 =>     array (      0 => 'text',      1 => '/QcmAnswers',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'comment_new' => array (  0 =>   array (    0 => 'postSlug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::commentNewAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/comment/new',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'postSlug',    ),    2 =>     array (      0 => 'text',      1 => '/blog',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'answer_grp_new' => array (  0 =>   array (    0 => 'grpSlug',    1 => 'qcmSlug',    2 => 'nextQcmId',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::answerGrpNewAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'nextQcmId',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'qcmSlug',    ),    2 =>     array (      0 => 'text',      1 => '/answer/new',    ),    3 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'grpSlug',    ),    4 =>     array (      0 => 'text',      1 => '/blog/grp',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'answer_new' => array (  0 =>   array (    0 => 'QcmSlug',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\BlogController::answerNewAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/new',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'QcmSlug',    ),    2 =>     array (      0 => 'text',      1 => '/blog/answer',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction',    'template' => 'default/homepage.html.twig',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\SecurityController::checkAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\SecurityController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_show' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_edit' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_register' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::registerAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirm' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::confirmAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/register/confirm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirmed' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\RegistrationController::confirmedAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/confirmed',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_request' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/request',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_send_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/send-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_reset' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/resetting/reset',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_change_password' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/change-password',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'hello_the_world' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\UserBundle\\Controller\\AdvertController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/hello-world',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
