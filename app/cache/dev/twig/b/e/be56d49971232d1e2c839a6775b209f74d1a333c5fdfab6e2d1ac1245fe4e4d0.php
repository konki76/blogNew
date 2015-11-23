<?php

/* blog/grp_stat.html.twig */
class __TwigTemplate_be56d49971232d1e2c839a6775b209f74d1a333c5fdfab6e2d1ac1245fe4e4d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "blog/grp_stat.html.twig", 1);
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
        $__internal_d5a3bd8d7a4ddefe96811e16ed540e7bf958f392b145f28ecee5aca68c7acfe8 = $this->env->getExtension("native_profiler");
        $__internal_d5a3bd8d7a4ddefe96811e16ed540e7bf958f392b145f28ecee5aca68c7acfe8->enter($__internal_d5a3bd8d7a4ddefe96811e16ed540e7bf958f392b145f28ecee5aca68c7acfe8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/grp_stat.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d5a3bd8d7a4ddefe96811e16ed540e7bf958f392b145f28ecee5aca68c7acfe8->leave($__internal_d5a3bd8d7a4ddefe96811e16ed540e7bf958f392b145f28ecee5aca68c7acfe8_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_bc60ad15375f6a00ccec0f5a73d64f11c3db43b98f40f71ebee92a070d220cf5 = $this->env->getExtension("native_profiler");
        $__internal_bc60ad15375f6a00ccec0f5a73d64f11c3db43b98f40f71ebee92a070d220cf5->enter($__internal_bc60ad15375f6a00ccec0f5a73d64f11c3db43b98f40f71ebee92a070d220cf5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "blog_index";
        
        $__internal_bc60ad15375f6a00ccec0f5a73d64f11c3db43b98f40f71ebee92a070d220cf5->leave($__internal_bc60ad15375f6a00ccec0f5a73d64f11c3db43b98f40f71ebee92a070d220cf5_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_f4e48a37caae723021f3675549169ed05255ba66a59aea4babc988ed6ced69af = $this->env->getExtension("native_profiler");
        $__internal_f4e48a37caae723021f3675549169ed05255ba66a59aea4babc988ed6ced69af->enter($__internal_f4e48a37caae723021f3675549169ed05255ba66a59aea4babc988ed6ced69af_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "
    <h2>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grp"]) ? $context["grp"] : $this->getContext($context, "grp")), "title", array()), "html", null, true);
        echo "</h2>
\t<p>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grp"]) ? $context["grp"] : $this->getContext($context, "grp")), "startContent", array()), "html", null, true);
        echo "</p>

\tVous avez ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["scoreUser"]) ? $context["scoreUser"] : $this->getContext($context, "scoreUser")), "html", null, true);
        echo " sur ";
        echo twig_escape_filter($this->env, (isset($context["scoreMax"]) ? $context["scoreMax"] : $this->getContext($context, "scoreMax")), "html", null, true);
        echo ".<br/><br/>

\tVous avez fait des erreurs sur les questions suivantes :<br/>
\t";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["answers"]) ? $context["answers"] : $this->getContext($context, "answers")));
        foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
            // line 14
            echo "\t\t";
            if (($this->getAttribute($context["answer"], "a_score", array()) == 0)) {
                // line 15
                echo "\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "ps_content", array()), "html", null, true);
                echo "<br/>
\t\t";
            }
            // line 17
            echo "\t\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_f4e48a37caae723021f3675549169ed05255ba66a59aea4babc988ed6ced69af->leave($__internal_f4e48a37caae723021f3675549169ed05255ba66a59aea4babc988ed6ced69af_prof);

    }

    // line 21
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_2783a3edbb85c1f1b2d22d49cf554b604878cdac935c1aabcd80b73f20873f8c = $this->env->getExtension("native_profiler");
        $__internal_2783a3edbb85c1f1b2d22d49cf554b604878cdac935c1aabcd80b73f20873f8c->enter($__internal_2783a3edbb85c1f1b2d22d49cf554b604878cdac935c1aabcd80b73f20873f8c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 22
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
";
        
        $__internal_2783a3edbb85c1f1b2d22d49cf554b604878cdac935c1aabcd80b73f20873f8c->leave($__internal_2783a3edbb85c1f1b2d22d49cf554b604878cdac935c1aabcd80b73f20873f8c_prof);

    }

    public function getTemplateName()
    {
        return "blog/grp_stat.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 22,  99 => 21,  87 => 17,  81 => 15,  78 => 14,  74 => 13,  66 => 10,  61 => 8,  57 => 7,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
