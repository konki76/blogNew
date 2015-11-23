<?php

/* base.html.twig */
class __TwigTemplate_c99bfe106292109f8566900257b195b5a7877009f03cd95daf1d0567ea4701a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body_id' => array($this, 'block_body_id'),
            'header' => array($this, 'block_header'),
            'header_navigation_links' => array($this, 'block_header_navigation_links'),
            'body' => array($this, 'block_body'),
            'main' => array($this, 'block_main'),
            'sidebar' => array($this, 'block_sidebar'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b4ab769e7ac11eabb46622b686c640a26e9d4662dd6131743b7a1bf48c59226d = $this->env->getExtension("native_profiler");
        $__internal_b4ab769e7ac11eabb46622b686c640a26e9d4662dd6131743b7a1bf48c59226d->enter($__internal_b4ab769e7ac11eabb46622b686c640a26e9d4662dd6131743b7a1bf48c59226d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>

    <body id=\"";
        // line 25
        $this->displayBlock('body_id', $context, $blocks);
        echo "\">

        ";
        // line 27
        $this->displayBlock('header', $context, $blocks);
        // line 91
        echo "
        <div class=\"container body-container\">
            ";
        // line 93
        $this->displayBlock('body', $context, $blocks);
        // line 107
        echo "        </div>

        ";
        // line 109
        $this->displayBlock('footer', $context, $blocks);
        // line 127
        echo "
        ";
        // line 128
        $this->displayBlock('javascripts', $context, $blocks);
        // line 146
        echo "
    </body>
</html>
";
        
        $__internal_b4ab769e7ac11eabb46622b686c640a26e9d4662dd6131743b7a1bf48c59226d->leave($__internal_b4ab769e7ac11eabb46622b686c640a26e9d4662dd6131743b7a1bf48c59226d_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_147a33db934bddcd8474526c6af3530bf6d36a1e6aebd6acc195f22ec6d29bc9 = $this->env->getExtension("native_profiler");
        $__internal_147a33db934bddcd8474526c6af3530bf6d36a1e6aebd6acc195f22ec6d29bc9->enter($__internal_147a33db934bddcd8474526c6af3530bf6d36a1e6aebd6acc195f22ec6d29bc9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Médecine - QCM";
        
        $__internal_147a33db934bddcd8474526c6af3530bf6d36a1e6aebd6acc195f22ec6d29bc9->leave($__internal_147a33db934bddcd8474526c6af3530bf6d36a1e6aebd6acc195f22ec6d29bc9_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_a95f5589a9192792175f04b5adfc9367ecb4465e752c70a29d52329150ed8074 = $this->env->getExtension("native_profiler");
        $__internal_a95f5589a9192792175f04b5adfc9367ecb4465e752c70a29d52329150ed8074->enter($__internal_a95f5589a9192792175f04b5adfc9367ecb4465e752c70a29d52329150ed8074_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        echo "        ";
        // line 19
        echo "
            <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/app.css"), "html", null, true);
        echo "\">
        ";
        
        $__internal_a95f5589a9192792175f04b5adfc9367ecb4465e752c70a29d52329150ed8074->leave($__internal_a95f5589a9192792175f04b5adfc9367ecb4465e752c70a29d52329150ed8074_prof);

    }

    // line 25
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_d39425681e312d5fcc11ffd2b188349646bbeb209fa562ff35b8e3b883402126 = $this->env->getExtension("native_profiler");
        $__internal_d39425681e312d5fcc11ffd2b188349646bbeb209fa562ff35b8e3b883402126->enter($__internal_d39425681e312d5fcc11ffd2b188349646bbeb209fa562ff35b8e3b883402126_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        
        $__internal_d39425681e312d5fcc11ffd2b188349646bbeb209fa562ff35b8e3b883402126->leave($__internal_d39425681e312d5fcc11ffd2b188349646bbeb209fa562ff35b8e3b883402126_prof);

    }

    // line 27
    public function block_header($context, array $blocks = array())
    {
        $__internal_33114ae4aee8e44c0c696fb6d15272bf51c0ddf6e9ec6c74618b0c70c5217571 = $this->env->getExtension("native_profiler");
        $__internal_33114ae4aee8e44c0c696fb6d15272bf51c0ddf6e9ec6c74618b0c70c5217571->enter($__internal_33114ae4aee8e44c0c696fb6d15272bf51c0ddf6e9ec6c74618b0c70c5217571_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 28
        echo "            <header>
                <div class=\"navbar navbar-default navbar-static-top\" role=\"navigation\">
                    <div class=\"container\">
                        <div class=\"navbar-header\">
                            <a class=\"navbar-brand\" href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">
                                Médecine - QCM
                            </a>

                            <button type=\"button\" class=\"navbar-toggle\"
                                    data-toggle=\"collapse\"
                                    data-target=\".navbar-collapse\">
                                <span class=\"sr-only\">Toggle navigation</span>
                                <span class=\"icon-bar\">nav1</span>
                                <span class=\"icon-bar\">nav2</span>
                                <span class=\"icon-bar\">nav3</span>
                            </button>
                        </div>
                        <div class=\"navbar-collapse collapse\">
                            <ul class=\"nav navbar-nav navbar-right\">
                                ";
        // line 47
        $this->displayBlock('header_navigation_links', $context, $blocks);
        // line 77
        echo "
                                ";
        // line 78
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 79
            echo "                                    <li>
                                        <a href=\"";
            // line 80
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
                                            <i class=\"fa fa-sign-out\"></i> Logout
                                        </a>
                                    </li>
                                ";
        }
        // line 85
        echo "                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        ";
        
        $__internal_33114ae4aee8e44c0c696fb6d15272bf51c0ddf6e9ec6c74618b0c70c5217571->leave($__internal_33114ae4aee8e44c0c696fb6d15272bf51c0ddf6e9ec6c74618b0c70c5217571_prof);

    }

    // line 47
    public function block_header_navigation_links($context, array $blocks = array())
    {
        $__internal_30faad5b34c791ffa61cdde050ab4ffd1c0a3064f9e13d09f80991e06ee761e0 = $this->env->getExtension("native_profiler");
        $__internal_30faad5b34c791ffa61cdde050ab4ffd1c0a3064f9e13d09f80991e06ee761e0->enter($__internal_30faad5b34c791ffa61cdde050ab4ffd1c0a3064f9e13d09f80991e06ee761e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header_navigation_links"));

        // line 48
        echo "                                    <li>
                                        <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
                                            <i class=\"fa fa-home\"></i> Homepage
                                        </a>
                                    </li>
                                    <li>
                                        <a href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
        echo "\">
                                            <i class=\"fa fa-home\"></i> Se connecter
                                        </a>
                                    </li>
                                    <li>
                                        <a href=\"";
        // line 59
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">
                                            <i class=\"fa fa-home\"></i> S'enregistrer
                                        </a>
                                    </li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t
                                    ";
        // line 69
        echo "                                    ";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()) && $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
            // line 70
            echo "                                        <li>
                                            <a href=\"";
            // line 71
            echo $this->env->getExtension('routing')->getPath("admin_post_index");
            echo "\">
                                                <i class=\"fa fa-lock\"></i> Backend
                                            </a>
                                        </li>
                                    ";
        }
        // line 76
        echo "                                ";
        
        $__internal_30faad5b34c791ffa61cdde050ab4ffd1c0a3064f9e13d09f80991e06ee761e0->leave($__internal_30faad5b34c791ffa61cdde050ab4ffd1c0a3064f9e13d09f80991e06ee761e0_prof);

    }

    // line 93
    public function block_body($context, array $blocks = array())
    {
        $__internal_0560de7e88e2c0056d0d40634e2a508dab5d2d745d29ed6d5de60469dd523adb = $this->env->getExtension("native_profiler");
        $__internal_0560de7e88e2c0056d0d40634e2a508dab5d2d745d29ed6d5de60469dd523adb->enter($__internal_0560de7e88e2c0056d0d40634e2a508dab5d2d745d29ed6d5de60469dd523adb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 94
        echo "\t\t\t<h1>Version test</h1>
                <div class=\"row\">
                    <div id=\"main\" class=\"col-sm-9\">
                        ";
        // line 97
        $this->displayBlock('main', $context, $blocks);
        // line 98
        echo "                    </div>

                    <div id=\"sidebar\" class=\"col-sm-3\">
                        ";
        // line 101
        $this->displayBlock('sidebar', $context, $blocks);
        // line 104
        echo "                    </div>
                </div>
            ";
        
        $__internal_0560de7e88e2c0056d0d40634e2a508dab5d2d745d29ed6d5de60469dd523adb->leave($__internal_0560de7e88e2c0056d0d40634e2a508dab5d2d745d29ed6d5de60469dd523adb_prof);

    }

    // line 97
    public function block_main($context, array $blocks = array())
    {
        $__internal_847ef2c38d72966262295a4f38b62c737d434c141f1e85e84ee9b0e8f039bf40 = $this->env->getExtension("native_profiler");
        $__internal_847ef2c38d72966262295a4f38b62c737d434c141f1e85e84ee9b0e8f039bf40->enter($__internal_847ef2c38d72966262295a4f38b62c737d434c141f1e85e84ee9b0e8f039bf40_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        
        $__internal_847ef2c38d72966262295a4f38b62c737d434c141f1e85e84ee9b0e8f039bf40->leave($__internal_847ef2c38d72966262295a4f38b62c737d434c141f1e85e84ee9b0e8f039bf40_prof);

    }

    // line 101
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_f16ac8a92bf42f23f681ab3a503741e346bd8ea731e86d033905c055f476eb0e = $this->env->getExtension("native_profiler");
        $__internal_f16ac8a92bf42f23f681ab3a503741e346bd8ea731e86d033905c055f476eb0e->enter($__internal_f16ac8a92bf42f23f681ab3a503741e346bd8ea731e86d033905c055f476eb0e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 102
        echo "                            
                        ";
        
        $__internal_f16ac8a92bf42f23f681ab3a503741e346bd8ea731e86d033905c055f476eb0e->leave($__internal_f16ac8a92bf42f23f681ab3a503741e346bd8ea731e86d033905c055f476eb0e_prof);

    }

    // line 109
    public function block_footer($context, array $blocks = array())
    {
        $__internal_d8c2e1412143abf72ab529f5843f7f8130f2e323eb72a01ce8d1f6ca3bbb9a32 = $this->env->getExtension("native_profiler");
        $__internal_d8c2e1412143abf72ab529f5843f7f8130f2e323eb72a01ce8d1f6ca3bbb9a32->enter($__internal_d8c2e1412143abf72ab529f5843f7f8130f2e323eb72a01ce8d1f6ca3bbb9a32_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 110
        echo "            <footer>
                <div class=\"container\">
                    <div class=\"row\">
                        <div id=\"footer-copyright\" class=\"col-md-6\">
                            <p>&copy; ";
        // line 114
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - The Poncho Project</p>
                            <p>MIT License</p>
                        </div>
                        <div id=\"footer-resources\" class=\"col-md-6\">
                            <p>
                                <a href=\"https://twitter.com/poncho\"><i class=\"fa fa-twitter\"></i></a>
                                <a href=\"https://www.facebook.com/Poncho\"><i class=\"fa fa-facebook\"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        ";
        
        $__internal_d8c2e1412143abf72ab529f5843f7f8130f2e323eb72a01ce8d1f6ca3bbb9a32->leave($__internal_d8c2e1412143abf72ab529f5843f7f8130f2e323eb72a01ce8d1f6ca3bbb9a32_prof);

    }

    // line 128
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_54bcbedfac1a27308eba337e0f5440b40a6746d68fe9a762763051213427f22a = $this->env->getExtension("native_profiler");
        $__internal_54bcbedfac1a27308eba337e0f5440b40a6746d68fe9a762763051213427f22a->enter($__internal_54bcbedfac1a27308eba337e0f5440b40a6746d68fe9a762763051213427f22a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 129
        echo "        ";
        // line 137
        echo "
            <script src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/app.js"), "html", null, true);
        echo "\"></script>

            <script>
                \$(document).ready(function() {
                    hljs.initHighlightingOnLoad();
                });
            </script>
        ";
        
        $__internal_54bcbedfac1a27308eba337e0f5440b40a6746d68fe9a762763051213427f22a->leave($__internal_54bcbedfac1a27308eba337e0f5440b40a6746d68fe9a762763051213427f22a_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  340 => 138,  337 => 137,  335 => 129,  329 => 128,  309 => 114,  303 => 110,  297 => 109,  289 => 102,  283 => 101,  272 => 97,  263 => 104,  261 => 101,  256 => 98,  254 => 97,  249 => 94,  243 => 93,  236 => 76,  228 => 71,  225 => 70,  222 => 69,  214 => 59,  206 => 54,  198 => 49,  195 => 48,  189 => 47,  177 => 85,  169 => 80,  166 => 79,  164 => 78,  161 => 77,  159 => 47,  141 => 32,  135 => 28,  129 => 27,  118 => 25,  109 => 20,  106 => 19,  104 => 8,  98 => 7,  86 => 5,  76 => 146,  74 => 128,  71 => 127,  69 => 109,  65 => 107,  63 => 93,  59 => 91,  57 => 27,  52 => 25,  45 => 22,  43 => 7,  38 => 5,  32 => 1,);
    }
}
