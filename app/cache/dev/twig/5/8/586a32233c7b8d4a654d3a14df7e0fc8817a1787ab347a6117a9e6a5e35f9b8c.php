<?php

/* blog/post_show.html.twig */
class __TwigTemplate_586a32233c7b8d4a654d3a14df7e0fc8817a1787ab347a6117a9e6a5e35f9b8c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "blog/post_show.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'main' => array($this, 'block_main'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5528f153873ec1a2c3f47c64e9fa23413226aa5c9abd4b8831f8f3a30d6f40ca = $this->env->getExtension("native_profiler");
        $__internal_5528f153873ec1a2c3f47c64e9fa23413226aa5c9abd4b8831f8f3a30d6f40ca->enter($__internal_5528f153873ec1a2c3f47c64e9fa23413226aa5c9abd4b8831f8f3a30d6f40ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/post_show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5528f153873ec1a2c3f47c64e9fa23413226aa5c9abd4b8831f8f3a30d6f40ca->leave($__internal_5528f153873ec1a2c3f47c64e9fa23413226aa5c9abd4b8831f8f3a30d6f40ca_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_6d492ee6e38a6748081e0b76f3f1489f9193db8ce2afa827a1da710f3e4a6d5f = $this->env->getExtension("native_profiler");
        $__internal_6d492ee6e38a6748081e0b76f3f1489f9193db8ce2afa827a1da710f3e4a6d5f->enter($__internal_6d492ee6e38a6748081e0b76f3f1489f9193db8ce2afa827a1da710f3e4a6d5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "blog_post_show";
        
        $__internal_6d492ee6e38a6748081e0b76f3f1489f9193db8ce2afa827a1da710f3e4a6d5f->leave($__internal_6d492ee6e38a6748081e0b76f3f1489f9193db8ce2afa827a1da710f3e4a6d5f_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_dd44abef451e47752321733b25ada151e7b56dbbdae9483b4084a518e7609640 = $this->env->getExtension("native_profiler");
        $__internal_dd44abef451e47752321733b25ada151e7b56dbbdae9483b4084a518e7609640->enter($__internal_dd44abef451e47752321733b25ada151e7b56dbbdae9483b4084a518e7609640_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "title", array()), "html", null, true);
        echo " /simple/</h1>
//md2html ko
    ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "content", array()), "html", null, true);
        echo "
\t
    <div id=\"post-add-answer\" class=\"well\">
        ";
        // line 17
        echo "       
\t\t";
        // line 18
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 19
            echo "\t\t";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AcmeUserBundle:Blog:answerForm", array("id" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()))));
            echo "
        ";
        }
        // line 21
        echo "    </div>
\t
\t
\t <h3>";
        // line 24
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "comments", array())), "html", null, true);
        echo " commentaires.</h3>

    ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "comments", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 27
            echo "        <div class=\"row post-comment\">
            <h4 class=\"col-sm-3\">
                <strong>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "authorEmail", array()), "html", null, true);
            echo "</strong>
                <strong>";
            // line 30
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["comment"], "publishedAt", array()), "M jS \\a\\t g:i a"), "html", null, true);
            echo "</strong>
            </h4>
            <div class=\"col-sm-9\">
                ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "content", array()), "html", null, true);
            echo " //md2html ko
            </div>
        </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 37
            echo "        <div class=\"post-comment\">
            <p>Des remarques ?</p>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "\t
\t<div id=\"post-add-comment\" class=\"well\">
        ";
        // line 49
        echo "        ";
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 50
            echo "            ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AcmeUserBundle:Blog:commentForm", array("id" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()))));
            echo "
        ";
        } else {
            // line 52
            echo "            <p>
                <a class=\"btn btn-success\" href=\"";
            // line 53
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">
                    <i class=\"fa fa-sign-in\"></i> Se connecter 
                </a>
                pour ajouter un commentaire.
            </p>
        ";
        }
        // line 59
        echo "    </div>

   
\t
";
        
        $__internal_dd44abef451e47752321733b25ada151e7b56dbbdae9483b4084a518e7609640->leave($__internal_dd44abef451e47752321733b25ada151e7b56dbbdae9483b4084a518e7609640_prof);

    }

    // line 65
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_943975af3886aaae081ab1fa2a28161f09659556183b4997d0e127f93598a76b = $this->env->getExtension("native_profiler");
        $__internal_943975af3886aaae081ab1fa2a28161f09659556183b4997d0e127f93598a76b->enter($__internal_943975af3886aaae081ab1fa2a28161f09659556183b4997d0e127f93598a76b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 66
        echo "    ";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()) && $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "isAuthor", array(0 => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())), "method"))) {
            // line 67
            echo "        <div class=\"section\">
            <a class=\"btn btn-lg btn-block btn-success\" href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_post_edit", array("id" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()))), "html", null, true);
            echo "\">
                <i class=\"fa fa-edit\"></i> Editer la question
            </a>
        </div>
    ";
        }
        // line 73
        echo "
    ";
        // line 77
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

";
        
        $__internal_943975af3886aaae081ab1fa2a28161f09659556183b4997d0e127f93598a76b->leave($__internal_943975af3886aaae081ab1fa2a28161f09659556183b4997d0e127f93598a76b_prof);

    }

    public function getTemplateName()
    {
        return "blog/post_show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 77,  180 => 73,  172 => 68,  169 => 67,  166 => 66,  160 => 65,  149 => 59,  140 => 53,  137 => 52,  131 => 50,  128 => 49,  124 => 41,  115 => 37,  106 => 33,  100 => 30,  96 => 29,  92 => 27,  87 => 26,  82 => 24,  77 => 21,  71 => 19,  69 => 18,  66 => 17,  60 => 8,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
