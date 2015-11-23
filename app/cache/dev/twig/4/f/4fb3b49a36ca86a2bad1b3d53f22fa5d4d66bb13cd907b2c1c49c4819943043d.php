<?php

/* default/homepage.html.twig */
class __TwigTemplate_4fb3b49a36ca86a2bad1b3d53f22fa5d4d66bb13cd907b2c1c49c4819943043d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/homepage.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'header' => array($this, 'block_header'),
            'header_navigation_links' => array($this, 'block_header_navigation_links'),
            'footer' => array($this, 'block_footer'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_81f0b0d770f685a9b9d0911e416f633ed014fe1e4b0849cf67386b938c97f126 = $this->env->getExtension("native_profiler");
        $__internal_81f0b0d770f685a9b9d0911e416f633ed014fe1e4b0849cf67386b938c97f126->enter($__internal_81f0b0d770f685a9b9d0911e416f633ed014fe1e4b0849cf67386b938c97f126_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/homepage.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_81f0b0d770f685a9b9d0911e416f633ed014fe1e4b0849cf67386b938c97f126->leave($__internal_81f0b0d770f685a9b9d0911e416f633ed014fe1e4b0849cf67386b938c97f126_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_d40838081fea2346f417956c00b31e572316fc76b7531ce1b39b143b8fd2d053 = $this->env->getExtension("native_profiler");
        $__internal_d40838081fea2346f417956c00b31e572316fc76b7531ce1b39b143b8fd2d053->enter($__internal_d40838081fea2346f417956c00b31e572316fc76b7531ce1b39b143b8fd2d053_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "homepage";
        
        $__internal_d40838081fea2346f417956c00b31e572316fc76b7531ce1b39b143b8fd2d053->leave($__internal_d40838081fea2346f417956c00b31e572316fc76b7531ce1b39b143b8fd2d053_prof);

    }

    // line 9
    public function block_header($context, array $blocks = array())
    {
        $__internal_0bc10b121d0989f2da306832a441bac49bfb16f4e6e7904cf4b0364979ed3e5e = $this->env->getExtension("native_profiler");
        $__internal_0bc10b121d0989f2da306832a441bac49bfb16f4e6e7904cf4b0364979ed3e5e->enter($__internal_0bc10b121d0989f2da306832a441bac49bfb16f4e6e7904cf4b0364979ed3e5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 10
        echo "<header>
\t<div class=\"navbar navbar-default navbar-static-top\" role=\"navigation\">
\t\t<div class=\"container\">
\t\t\t<div class=\"navbar-header\">
\t\t\t\t<a class=\"navbar-brand\" href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">
\t\t\t\t\tMédecine - QCM
\t\t\t\t</a>

\t\t\t\t<button type=\"button\" class=\"navbar-toggle\"
\t\t\t\t\t\tdata-toggle=\"collapse\"
\t\t\t\t\t\tdata-target=\".navbar-collapse\">
\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t<span class=\"icon-bar\">nav1</span>
\t\t\t\t\t<span class=\"icon-bar\">nav2</span>
\t\t\t\t\t<span class=\"icon-bar\">nav3</span>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<div class=\"navbar-collapse collapse\">
\t\t\t\t<ul class=\"nav navbar-nav navbar-right\">
\t\t\t\t\t";
        // line 29
        $this->displayBlock('header_navigation_links', $context, $blocks);
        // line 59
        echo "
\t\t\t\t\t";
        // line 60
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 61
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 62
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-sign-out\"></i> Logout
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 67
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>
</header>
";
        
        $__internal_0bc10b121d0989f2da306832a441bac49bfb16f4e6e7904cf4b0364979ed3e5e->leave($__internal_0bc10b121d0989f2da306832a441bac49bfb16f4e6e7904cf4b0364979ed3e5e_prof);

    }

    // line 29
    public function block_header_navigation_links($context, array $blocks = array())
    {
        $__internal_18e5ddc3a909df491ab1e500fe9df5ccb1de9faa0c058bdad0304d6be7f763d7 = $this->env->getExtension("native_profiler");
        $__internal_18e5ddc3a909df491ab1e500fe9df5ccb1de9faa0c058bdad0304d6be7f763d7->enter($__internal_18e5ddc3a909df491ab1e500fe9df5ccb1de9faa0c058bdad0304d6be7f763d7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header_navigation_links"));

        // line 30
        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-home\"></i> Homepage
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
        echo "\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-home\"></i> Se connecter
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-home\"></i> S'enregistrer
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 51
        echo "\t\t\t\t\t\t";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()) && $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
            // line 52
            echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 53
            echo $this->env->getExtension('routing')->getPath("admin_post_index");
            echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-lock\"></i> Backend
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 58
        echo "\t\t\t\t\t";
        
        $__internal_18e5ddc3a909df491ab1e500fe9df5ccb1de9faa0c058bdad0304d6be7f763d7->leave($__internal_18e5ddc3a909df491ab1e500fe9df5ccb1de9faa0c058bdad0304d6be7f763d7_prof);

    }

    // line 73
    public function block_footer($context, array $blocks = array())
    {
        $__internal_32159d16df19621171368cdfc803a317ddbbad5480e10541545d8e5d2c7fb98d = $this->env->getExtension("native_profiler");
        $__internal_32159d16df19621171368cdfc803a317ddbbad5480e10541545d8e5d2c7fb98d->enter($__internal_32159d16df19621171368cdfc803a317ddbbad5480e10541545d8e5d2c7fb98d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 74
        echo "\t<footer>
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div id=\"footer-copyright\" class=\"col-md-6\">
\t\t\t\t\t<p>&copy; ";
        // line 78
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - The Poncho Project - MIT License</p>
\t\t\t\t\t<p>
\t\t\t\t\t\t<a href=\"";
        // line 80
        echo $this->env->getExtension('routing')->getPath("admin_index");
        echo "\">
\t\t\t\t\t\t\t<i class=\"fa fa-lock\"></i> Backend
\t\t\t\t\t\t</a>
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t\t<div id=\"footer-resources\" class=\"col-md-6\">
\t\t\t\t\t<p>
\t\t\t\t\t\t<a href=\"https://twitter.com/poncho\"><i class=\"fa fa-twitter\"></i></a>
\t\t\t\t\t\t<a href=\"https://www.facebook.com/Poncho\"><i class=\"fa fa-facebook\"></i></a>
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</footer>
";
        
        $__internal_32159d16df19621171368cdfc803a317ddbbad5480e10541545d8e5d2c7fb98d->leave($__internal_32159d16df19621171368cdfc803a317ddbbad5480e10541545d8e5d2c7fb98d_prof);

    }

    // line 96
    public function block_body($context, array $blocks = array())
    {
        $__internal_0e6f350d611420ba8714c6118afcd92c8b51513d86f9ed14f9d2e12def753292 = $this->env->getExtension("native_profiler");
        $__internal_0e6f350d611420ba8714c6118afcd92c8b51513d86f9ed14f9d2e12def753292->enter($__internal_0e6f350d611420ba8714c6118afcd92c8b51513d86f9ed14f9d2e12def753292_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 97
        echo "


    <div class=\"page-header\">
        <h1>QCM médecine</h1>
\t\tAccéder à votre espace d'<strong>Unité d'Enseignement</strong>
    </div>
\t
    <div class=\"row\">
        <div class=\"col-md-3\">
            <div class=\"jumbotron\">
                <p>
                    <strong> UE 1 </strong>
                </p>
\t\t\t\tChimie-organique et biochimie
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 113
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
                        <i class=\"fa fa-users\"></i> UE 1
                    </a>
                </p>
            </div>
        </div>
\t\t
\t\t<div class=\"col-md-3\">
            <div class=\"jumbotron\">
                <p>
                     <strong> UE 2 </strong>
                </p>
\t\t\t\tBiologie
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 127
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
                        <i class=\"fa fa-users\"></i> UE 2
                    </a>
                </p>
\t\t\t\t<br/>
            </div>
        </div>
\t\t
\t\t<div class=\"col-md-3\">
            <div class=\"jumbotron\">
                <p>
                     <strong> UE 3 </strong>
                </p>
\t\t\t\tPhysique
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 142
        echo $this->env->getExtension('routing')->getPath("blog_grpPage", array("slug" => "ue3"));
        echo "\">
                        <i class=\"fa fa-users\"></i> UE 3
                    </a>
                </p>
\t\t\t\t<br/>
            </div>
        </div>
\t\t<div class=\"col-md-3\">
            <div class=\"jumbotron\">
                <p>
                     <strong> UE 4 </strong>
                </p>
 \t\t\t    Statistiques
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 156
        echo $this->env->getExtension('routing')->getPath("blog_grpPage", array("slug" => "ue4"));
        echo "\">
                        <i class=\"fa fa-users\"></i> UE 4
                    </a>
                </p>
\t\t\t\t<br/>
            </div>
        </div>
\t\t<div class=\"col-md-3\">
            <div class=\"jumbotron\">
                <p>
                     <strong> UE 5 </strong>
                </p>
\t\t\t\tAnatomie
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 170
        echo $this->env->getExtension('routing')->getPath("blog_grpPage", array("slug" => "ue5"));
        echo "\">
                        <i class=\"fa fa-users\"></i> UE 5
                    </a>
                </p>
            </div>
        </div>
\t\t<div class=\"col-md-3\">
            <div class=\"jumbotron\">
                <p>
                     <strong> UE 6 </strong>
                </p>
\t\t\t\tPharmacologie
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 183
        echo $this->env->getExtension('routing')->getPath("blog_grpPage", array("slug" => "ue6"));
        echo "\">
                        <i class=\"fa fa-users\"></i> UE 6
                    </a>
                </p>
            </div>
        </div>
\t\t<div class=\"col-md-3\">
            <div>
                <p>
                     <strong> UE 7 </strong>
                </p>
\t\t\t\tHistoire de la médecine et de la biologie végétale
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 196
        echo $this->env->getExtension('routing')->getPath("blog_grpPage", array("slug" => "ue7"));
        echo "\">
                        <i class=\"fa fa-users\"></i> UE 7
                    </a>
                </p>
            </div>
        </div>
\t\t<div class=\"col-md-3\">
            <div class=\"jumbotron\">
                <p>
                     <strong> UE MOFSK </strong>
                </p>
\t\t\t\tOdontologie, sage-femme, kiné
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 209
        echo $this->env->getExtension('routing')->getPath("blog_grpPage", array("slug" => "ueMOFSK"));
        echo "\">
                        <i class=\"fa fa-users\"></i> UE MOFSK
                    </a>
                </p>
            </div>
        </div>
    </div>
";
        
        $__internal_0e6f350d611420ba8714c6118afcd92c8b51513d86f9ed14f9d2e12def753292->leave($__internal_0e6f350d611420ba8714c6118afcd92c8b51513d86f9ed14f9d2e12def753292_prof);

    }

    public function getTemplateName()
    {
        return "default/homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  344 => 209,  328 => 196,  312 => 183,  296 => 170,  279 => 156,  262 => 142,  244 => 127,  227 => 113,  209 => 97,  203 => 96,  181 => 80,  176 => 78,  170 => 74,  164 => 73,  157 => 58,  149 => 53,  146 => 52,  143 => 51,  135 => 41,  127 => 36,  119 => 31,  116 => 30,  110 => 29,  98 => 67,  90 => 62,  87 => 61,  85 => 60,  82 => 59,  80 => 29,  62 => 14,  56 => 10,  50 => 9,  38 => 3,  11 => 1,);
    }
}
