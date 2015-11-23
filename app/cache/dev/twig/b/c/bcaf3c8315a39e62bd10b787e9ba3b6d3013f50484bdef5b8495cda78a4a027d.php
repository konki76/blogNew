<?php

/* blog/post_show_grp.html.twig */
class __TwigTemplate_bcaf3c8315a39e62bd10b787e9ba3b6d3013f50484bdef5b8495cda78a4a027d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "blog/post_show_grp.html.twig", 1);
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
        $__internal_1cf07427aaaea06e1a027b0e28f144c9e0191027f93f66f3be6060d9470fcf2a = $this->env->getExtension("native_profiler");
        $__internal_1cf07427aaaea06e1a027b0e28f144c9e0191027f93f66f3be6060d9470fcf2a->enter($__internal_1cf07427aaaea06e1a027b0e28f144c9e0191027f93f66f3be6060d9470fcf2a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/post_show_grp.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1cf07427aaaea06e1a027b0e28f144c9e0191027f93f66f3be6060d9470fcf2a->leave($__internal_1cf07427aaaea06e1a027b0e28f144c9e0191027f93f66f3be6060d9470fcf2a_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_7b6301f0b7be436de48c5cc2222e6eb89a3d593839623541356130969819b9e1 = $this->env->getExtension("native_profiler");
        $__internal_7b6301f0b7be436de48c5cc2222e6eb89a3d593839623541356130969819b9e1->enter($__internal_7b6301f0b7be436de48c5cc2222e6eb89a3d593839623541356130969819b9e1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "blog_post_show";
        
        $__internal_7b6301f0b7be436de48c5cc2222e6eb89a3d593839623541356130969819b9e1->leave($__internal_7b6301f0b7be436de48c5cc2222e6eb89a3d593839623541356130969819b9e1_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_98bb325ebe16c5ecd7988fc596e393bb2b28b8fd557f7d59d856ec428628f77c = $this->env->getExtension("native_profiler");
        $__internal_98bb325ebe16c5ecd7988fc596e393bb2b28b8fd557f7d59d856ec428628f77c->enter($__internal_98bb325ebe16c5ecd7988fc596e393bb2b28b8fd557f7d59d856ec428628f77c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "title", array()), "html", null, true);
        echo "</h1>


    <div id=\"post-add-answer\" class=\"well\">
        ";
        // line 16
        echo "        ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "content", array()), "html", null, true);
        echo "<br>
\t
\t\t";
        // line 18
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 19
            echo "   \t\t
\t\t";
            // line 20
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AcmeUserBundle:Blog:answerGrpForm", array("id" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()), "grp" => (isset($context["grpSlug"]) ? $context["grpSlug"] : $this->getContext($context, "grpSlug")), "nextPostId" => (isset($context["nextPostId"]) ? $context["nextPostId"] : $this->getContext($context, "nextPostId")))));
            echo "
        
\t\t<!--legend>grpSlug[";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["grpSlug"]) ? $context["grpSlug"] : $this->getContext($context, "grpSlug")), "html", null, true);
            echo "] nextPostId[";
            echo twig_escape_filter($this->env, (isset($context["nextPostId"]) ? $context["nextPostId"] : $this->getContext($context, "nextPostId")), "html", null, true);
            echo "]</legend-->
\t\t";
        }
        // line 24
        echo "    </div>
\t
\t
\t <h3>";
        // line 27
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "comments", array())), "html", null, true);
        echo " commentaire pour cette question :</h3>

    ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "comments", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 30
            echo "        <div class=\"row post-comment\">
            <h4 class=\"col-sm-3\">
                <strong>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "authorEmail", array()), "html", null, true);
            echo "</strong> commenté le
                <strong>";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["comment"], "publishedAt", array()), "jS M \\à g:i a"), "html", null, true);
            echo "</strong>
            </h4>
            <div class=\"col-sm-9\">
                ";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "content", array()), "html", null, true);
            echo "
            </div>
        </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 40
            echo "        <div class=\"post-comment\">
            <p>Des remarques sur cette question ?</p>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "\t
\t<div id=\"post-add-comment\" class=\"well\">
        ";
        // line 52
        echo "        ";
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 53
            echo "            ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AcmeUserBundle:Blog:commentForm", array("id" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()))));
            echo "
        ";
        } else {
            // line 55
            echo "            <p>
                <a class=\"btn btn-success\" href=\"";
            // line 56
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">
                    <i class=\"fa fa-sign-in\"></i> Se connecter
                </a>
                pour commenter
            </p>
        ";
        }
        // line 62
        echo "    </div>

   
\t
";
        
        $__internal_98bb325ebe16c5ecd7988fc596e393bb2b28b8fd557f7d59d856ec428628f77c->leave($__internal_98bb325ebe16c5ecd7988fc596e393bb2b28b8fd557f7d59d856ec428628f77c_prof);

    }

    // line 68
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_a3ef01c0d1c64f2f6e068e8aa2e7568262fe9031e982575cd145439291addd5e = $this->env->getExtension("native_profiler");
        $__internal_a3ef01c0d1c64f2f6e068e8aa2e7568262fe9031e982575cd145439291addd5e->enter($__internal_a3ef01c0d1c64f2f6e068e8aa2e7568262fe9031e982575cd145439291addd5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 69
        echo "    ";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()) && $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "isAuthor", array(0 => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())), "method"))) {
            // line 70
            echo "        <div class=\"section\">
            <a class=\"btn btn-lg btn-block btn-success\" href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_post_edit", array("id" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()))), "html", null, true);
            echo "\">
                <i class=\"fa fa-edit\"></i> Edit post
            </a>
        </div>
    ";
        }
        // line 76
        echo "
    ";
        // line 80
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

";
        
        $__internal_a3ef01c0d1c64f2f6e068e8aa2e7568262fe9031e982575cd145439291addd5e->leave($__internal_a3ef01c0d1c64f2f6e068e8aa2e7568262fe9031e982575cd145439291addd5e_prof);

    }

    public function getTemplateName()
    {
        return "blog/post_show_grp.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 80,  188 => 76,  180 => 71,  177 => 70,  174 => 69,  168 => 68,  157 => 62,  148 => 56,  145 => 55,  139 => 53,  136 => 52,  132 => 44,  123 => 40,  114 => 36,  108 => 33,  104 => 32,  100 => 30,  95 => 29,  90 => 27,  85 => 24,  78 => 22,  73 => 20,  70 => 19,  68 => 18,  62 => 16,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
