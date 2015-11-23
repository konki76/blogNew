<?php

/* blog/grp_index.html.twig */
class __TwigTemplate_c78dc07eaa0464da48d1a11723a63c89ae7467565882cf59b841da8b0e1bdd42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "blog/grp_index.html.twig", 1);
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
        $__internal_b931a96d66c5f64e116577fd7943ea8ee2fd5fbd02f374c4918c585bc56b6560 = $this->env->getExtension("native_profiler");
        $__internal_b931a96d66c5f64e116577fd7943ea8ee2fd5fbd02f374c4918c585bc56b6560->enter($__internal_b931a96d66c5f64e116577fd7943ea8ee2fd5fbd02f374c4918c585bc56b6560_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/grp_index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b931a96d66c5f64e116577fd7943ea8ee2fd5fbd02f374c4918c585bc56b6560->leave($__internal_b931a96d66c5f64e116577fd7943ea8ee2fd5fbd02f374c4918c585bc56b6560_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_cca4f590bb476ce2df09ce11de52a842ee8eb69e8b499cd767691c6a3940e150 = $this->env->getExtension("native_profiler");
        $__internal_cca4f590bb476ce2df09ce11de52a842ee8eb69e8b499cd767691c6a3940e150->enter($__internal_cca4f590bb476ce2df09ce11de52a842ee8eb69e8b499cd767691c6a3940e150_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "blog_index";
        
        $__internal_cca4f590bb476ce2df09ce11de52a842ee8eb69e8b499cd767691c6a3940e150->leave($__internal_cca4f590bb476ce2df09ce11de52a842ee8eb69e8b499cd767691c6a3940e150_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_a22f5d936941a6e6dc50ac09a1c60651ce9add60284f80df4702655c81e33331 = $this->env->getExtension("native_profiler");
        $__internal_a22f5d936941a6e6dc50ac09a1c60651ce9add60284f80df4702655c81e33331->enter($__internal_a22f5d936941a6e6dc50ac09a1c60651ce9add60284f80df4702655c81e33331_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

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

\t<p>
\t\t<a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("blog_grpPostPage", array("grpSlug" => $this->getAttribute((isset($context["grp"]) ? $context["grp"] : $this->getContext($context, "grp")), "slug", array()), "page" => "1")), "html", null, true);
        echo "\">Commencer le questionnaire</a>
\t</p>
\t
";
        
        $__internal_a22f5d936941a6e6dc50ac09a1c60651ce9add60284f80df4702655c81e33331->leave($__internal_a22f5d936941a6e6dc50ac09a1c60651ce9add60284f80df4702655c81e33331_prof);

    }

    // line 16
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_c81de2b9c034f54188fa49cc0271f82207705300eab2236d482559a2e5ce0887 = $this->env->getExtension("native_profiler");
        $__internal_c81de2b9c034f54188fa49cc0271f82207705300eab2236d482559a2e5ce0887->enter($__internal_c81de2b9c034f54188fa49cc0271f82207705300eab2236d482559a2e5ce0887_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 17
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
";
        
        $__internal_c81de2b9c034f54188fa49cc0271f82207705300eab2236d482559a2e5ce0887->leave($__internal_c81de2b9c034f54188fa49cc0271f82207705300eab2236d482559a2e5ce0887_prof);

    }

    public function getTemplateName()
    {
        return "blog/grp_index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 17,  78 => 16,  67 => 11,  61 => 8,  57 => 7,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
