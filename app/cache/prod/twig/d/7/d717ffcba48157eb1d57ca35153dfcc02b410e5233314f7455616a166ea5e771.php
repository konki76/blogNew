<?php

/* base.html.twig */
class __TwigTemplate_d717ffcba48157eb1d57ca35153dfcc02b410e5233314f7455616a166ea5e771 extends Twig_Template
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
        // line 94
        echo "
        <div class=\"container body-container\">
            ";
        // line 96
        $this->displayBlock('body', $context, $blocks);
        // line 109
        echo "        </div>

        ";
        // line 111
        $this->displayBlock('footer', $context, $blocks);
        // line 129
        echo "
        ";
        // line 130
        $this->displayBlock('javascripts', $context, $blocks);
        // line 148
        echo "
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "xTarget";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "        ";
        // line 19
        echo "
            <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/app.css"), "html", null, true);
        echo "\">
        ";
    }

    // line 25
    public function block_body_id($context, array $blocks = array())
    {
    }

    // line 27
    public function block_header($context, array $blocks = array())
    {
        // line 28
        echo "            <header>
                <div class=\"navbar navbar-default navbar-static-top\" role=\"navigation\">
                    <div class=\"container\">
                        <div class=\"navbar-header\">
                            <a class=\"navbar-brand\" href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">
                                xTarget
                            </a>

                            <button type=\"button\" class=\"navbar-toggle\"
                                    data-toggle=\"collapse\"
                                    data-target=\".navbar-collapse\">
                                <span class=\"sr-only\">Toggle navigation</span>
                                <!--span class=\"icon-bar\">nav1</span>
                                <span class=\"icon-bar\">nav2</span>
                                <span class=\"icon-bar\">nav3</span-->
                            </button>
                        </div>
                        <div class=\"navbar-collapse collapse\">
                            <ul class=\"nav navbar-nav navbar-right\">
                                ";
        // line 47
        $this->displayBlock('header_navigation_links', $context, $blocks);
        // line 80
        echo "
                                ";
        // line 81
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 82
            echo "                                    <li>
                                        <a href=\"";
            // line 83
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
                                            <i class=\"fa fa-sign-out\"></i> Logout
                                        </a>
                                    </li>
                                ";
        }
        // line 88
        echo "                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        ";
    }

    // line 47
    public function block_header_navigation_links($context, array $blocks = array())
    {
        // line 48
        echo "                                    <li>
                                        <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
                                            <i class=\"fa fa-home\"></i> Homepage
                                        </a>
                                    </li>
\t\t\t\t\t\t\t\t\t";
        // line 53
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 54
            echo "\t\t\t\t\t\t\t\t\t";
        } else {
            // line 55
            echo "                                    <li>
                                        <a href=\"";
            // line 56
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">
                                            <i class=\"fa fa-home\"></i> Se connecter
                                        </a>
                                    </li>
\t\t\t\t\t\t\t\t\t";
        }
        // line 61
        echo "                                    <li>
                                        <a href=\"";
        // line 62
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">
                                            <i class=\"fa fa-home\"></i> S'enregistrer
                                        </a>
                                    </li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t
                                    ";
        // line 72
        echo "                                    ";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
            // line 73
            echo "                                        <li>
                                            <a href=\"";
            // line 74
            echo $this->env->getExtension('routing')->getPath("admin_post_index");
            echo "\">
                                                <i class=\"fa fa-lock\"></i> Backend
                                            </a>
                                        </li>
                                    ";
        }
        // line 79
        echo "                                ";
    }

    // line 96
    public function block_body($context, array $blocks = array())
    {
        // line 97
        echo "                <div class=\"row\">
                    <div id=\"main\" class=\"col-sm-9\">
                        ";
        // line 99
        $this->displayBlock('main', $context, $blocks);
        // line 100
        echo "                    </div>

                    <div id=\"sidebar\" class=\"col-sm-3\">
                        ";
        // line 103
        $this->displayBlock('sidebar', $context, $blocks);
        // line 106
        echo "                    </div>
                </div>
            ";
    }

    // line 99
    public function block_main($context, array $blocks = array())
    {
    }

    // line 103
    public function block_sidebar($context, array $blocks = array())
    {
        // line 104
        echo "                            
                        ";
    }

    // line 111
    public function block_footer($context, array $blocks = array())
    {
        // line 112
        echo "            <footer>
                <div class=\"container\">
                    <div class=\"row\">
                        <div id=\"footer-copyright\" class=\"col-md-6\">
                            <p>&copy; ";
        // line 116
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - The Poncho Project</p>
                            <p>MIT License</p>
                        </div>
                        <div id=\"footer-resources\" class=\"col-md-6\">
                            <p>
                                <a href=\"https://twitter.com/ayaponcho\"><i class=\"fa fa-twitter\"></i></a>
                                <a href=\"https://www.facebook.com/\"><i class=\"fa fa-facebook\"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        ";
    }

    // line 130
    public function block_javascripts($context, array $blocks = array())
    {
        // line 131
        echo "        ";
        // line 139
        echo "
            <script src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/app.js"), "html", null, true);
        echo "\"></script>

            <script>
                \$(document).ready(function() {
                    hljs.initHighlightingOnLoad();
                });
            </script>
        ";
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
        return array (  286 => 140,  283 => 139,  281 => 131,  278 => 130,  261 => 116,  255 => 112,  252 => 111,  247 => 104,  244 => 103,  239 => 99,  233 => 106,  231 => 103,  226 => 100,  224 => 99,  220 => 97,  217 => 96,  213 => 79,  205 => 74,  202 => 73,  199 => 72,  191 => 62,  188 => 61,  180 => 56,  177 => 55,  174 => 54,  172 => 53,  165 => 49,  162 => 48,  159 => 47,  150 => 88,  142 => 83,  139 => 82,  137 => 81,  134 => 80,  132 => 47,  114 => 32,  108 => 28,  105 => 27,  100 => 25,  94 => 20,  91 => 19,  89 => 8,  86 => 7,  80 => 5,  73 => 148,  71 => 130,  68 => 129,  66 => 111,  62 => 109,  60 => 96,  56 => 94,  54 => 27,  49 => 25,  42 => 22,  40 => 7,  35 => 5,  29 => 1,);
    }
}
