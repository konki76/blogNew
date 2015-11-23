<?php

/* blog/index.html.twig */
class __TwigTemplate_152af3e5ade5ec2c643989ffa6d1ed658a03ca34a71286e60c5fc725c85b14b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "blog/index.html.twig", 1);
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
        $__internal_df457c1f3d10ec347f17d2291b9dea327a56ac4f4cc1d955a2caca5aa3267b9d = $this->env->getExtension("native_profiler");
        $__internal_df457c1f3d10ec347f17d2291b9dea327a56ac4f4cc1d955a2caca5aa3267b9d->enter($__internal_df457c1f3d10ec347f17d2291b9dea327a56ac4f4cc1d955a2caca5aa3267b9d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_df457c1f3d10ec347f17d2291b9dea327a56ac4f4cc1d955a2caca5aa3267b9d->leave($__internal_df457c1f3d10ec347f17d2291b9dea327a56ac4f4cc1d955a2caca5aa3267b9d_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_3c35a2dfd364c88220f4a8415a73d02836e858965bfdd76a883207780b3e30f0 = $this->env->getExtension("native_profiler");
        $__internal_3c35a2dfd364c88220f4a8415a73d02836e858965bfdd76a883207780b3e30f0->enter($__internal_3c35a2dfd364c88220f4a8415a73d02836e858965bfdd76a883207780b3e30f0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "blog_index";
        
        $__internal_3c35a2dfd364c88220f4a8415a73d02836e858965bfdd76a883207780b3e30f0->leave($__internal_3c35a2dfd364c88220f4a8415a73d02836e858965bfdd76a883207780b3e30f0_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_10514a0398f1a206a2c0e5e1b684f512a6a744b60b1ec6fd8135b977375af797 = $this->env->getExtension("native_profiler");
        $__internal_10514a0398f1a206a2c0e5e1b684f512a6a744b60b1ec6fd8135b977375af797->enter($__internal_10514a0398f1a206a2c0e5e1b684f512a6a744b60b1ec6fd8135b977375af797_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 7
            echo "        <article class=\"post\">
            <h2>
                <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("blog_post", array("slug" => $this->getAttribute($context["post"], "slug", array()))), "html", null, true);
            echo "\">
                    ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
            echo "
                </a>
            </h2>
\t\t\t
\t\t\t";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "summary", array()), "html", null, true);
            echo "
\t\t\t\t\t\t
\t\t\t<div class=\"well\">
\t\t\t";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "content", array()), "html", null, true);
            echo "
\t\t\t</div>

\t
\t\t\t";
            // line 21
            if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
                // line 22
                echo "\t\t\t\t";
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AcmeUserBundle:Blog:answerForm", array("id" => $this->getAttribute($context["post"], "id", array()))));
                echo "
\t\t\t";
            } else {
                // line 24
                echo "\t\t\t\t<p>
\t\t\t\t\t<a class=\"btn btn-success\" href=\"";
                // line 25
                echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
                echo "\">
\t\t\t\t\t\t<i class=\"fa fa-sign-in\"></i> Se connecter
\t\t\t\t\t</a>
\t\t\t\t\tpour répondre à la question.
\t\t\t\t</p>
\t\t\t";
            }
            // line 31
            echo "\t\t\t
        </article>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_10514a0398f1a206a2c0e5e1b684f512a6a744b60b1ec6fd8135b977375af797->leave($__internal_10514a0398f1a206a2c0e5e1b684f512a6a744b60b1ec6fd8135b977375af797_prof);

    }

    // line 36
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_8717e1b43dbab5ff21c75649bb108b61a0450a871bfdf97d6396214e198bd736 = $this->env->getExtension("native_profiler");
        $__internal_8717e1b43dbab5ff21c75649bb108b61a0450a871bfdf97d6396214e198bd736->enter($__internal_8717e1b43dbab5ff21c75649bb108b61a0450a871bfdf97d6396214e198bd736_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 37
        echo "\t";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
    
\t<div class=\"section about\">
\t\t<div class=\"well well-lg\">
\t";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["grps"]) ? $context["grps"] : $this->getContext($context, "grps")));
        foreach ($context['_seq'] as $context["_key"] => $context["grp"]) {
            // line 42
            echo "\t\t<p>
\t\t\t<a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("blog_grpPage", array("slug" => $this->getAttribute($context["grp"], "slug", array()))), "html", null, true);
            echo "\" >
\t\t\t\t<i class=\"fa fa-plus\"></i> ";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["grp"], "title", array()), "html", null, true);
            echo "
\t\t\t</a> 
\t\t</p>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['grp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "\t\t</div>
\t</div>
";
        
        $__internal_8717e1b43dbab5ff21c75649bb108b61a0450a871bfdf97d6396214e198bd736->leave($__internal_8717e1b43dbab5ff21c75649bb108b61a0450a871bfdf97d6396214e198bd736_prof);

    }

    public function getTemplateName()
    {
        return "blog/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 48,  145 => 44,  141 => 43,  138 => 42,  134 => 41,  126 => 37,  120 => 36,  107 => 31,  98 => 25,  95 => 24,  89 => 22,  87 => 21,  80 => 17,  74 => 14,  67 => 10,  63 => 9,  59 => 7,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
