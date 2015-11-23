<?php

/* admin/layout.html.twig */
class __TwigTemplate_77996762bc7ba05dc4bd9798a224e726b6a86e19d5eeaaf8436fe2ea24debb4e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "admin/layout.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'header_navigation_links' => array($this, 'block_header_navigation_links'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b5e8e9e4893f7916a5b9b46909023c41734c2b363a84092930fc312990ef3a2d = $this->env->getExtension("native_profiler");
        $__internal_b5e8e9e4893f7916a5b9b46909023c41734c2b363a84092930fc312990ef3a2d->enter($__internal_b5e8e9e4893f7916a5b9b46909023c41734c2b363a84092930fc312990ef3a2d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b5e8e9e4893f7916a5b9b46909023c41734c2b363a84092930fc312990ef3a2d->leave($__internal_b5e8e9e4893f7916a5b9b46909023c41734c2b363a84092930fc312990ef3a2d_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_d8e32e2869aa3af6058461a333bc92ff4d9ef521668c77d6f1bca2aeab451b07 = $this->env->getExtension("native_profiler");
        $__internal_d8e32e2869aa3af6058461a333bc92ff4d9ef521668c77d6f1bca2aeab451b07->enter($__internal_d8e32e2869aa3af6058461a333bc92ff4d9ef521668c77d6f1bca2aeab451b07_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "    ";
        // line 6
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/admin.css"), "html", null, true);
        echo "\">
";
        
        $__internal_d8e32e2869aa3af6058461a333bc92ff4d9ef521668c77d6f1bca2aeab451b07->leave($__internal_d8e32e2869aa3af6058461a333bc92ff4d9ef521668c77d6f1bca2aeab451b07_prof);

    }

    // line 11
    public function block_header_navigation_links($context, array $blocks = array())
    {
        $__internal_47d3b2dc79224ef613fdad729c6028ba7ead63c257596b68afa3a102853ebac8 = $this->env->getExtension("native_profiler");
        $__internal_47d3b2dc79224ef613fdad729c6028ba7ead63c257596b68afa3a102853ebac8->enter($__internal_47d3b2dc79224ef613fdad729c6028ba7ead63c257596b68afa3a102853ebac8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header_navigation_links"));

        // line 12
        echo "    <li>
        <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("admin_post_index");
        echo "\">
            <i class=\"fa fa-list-alt\"></i> Post List
        </a>
    </li>
    <li>
        <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
            <i class=\"fa fa-home\"></i> Back to blog
        </a>
    </li>
";
        
        $__internal_47d3b2dc79224ef613fdad729c6028ba7ead63c257596b68afa3a102853ebac8->leave($__internal_47d3b2dc79224ef613fdad729c6028ba7ead63c257596b68afa3a102853ebac8_prof);

    }

    // line 24
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_36ed48ef38f9af11c1ca53e37c370b1fd0f22fe3587f1220652c854ab0a27461 = $this->env->getExtension("native_profiler");
        $__internal_36ed48ef38f9af11c1ca53e37c370b1fd0f22fe3587f1220652c854ab0a27461->enter($__internal_36ed48ef38f9af11c1ca53e37c370b1fd0f22fe3587f1220652c854ab0a27461_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 25
        echo "    <div class=\"section actions\">
        <a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("admin_ue_index");
        echo "\" class=\"btn btn-lg btn-block btn-success\">
            <i class=\"fa fa-plus\"></i> List des UE
        </a>
    </div>
    <div class=\"section actions\">
        <a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("admin_grp_index");
        echo "\" class=\"btn btn-lg btn-block btn-success\">
            <i class=\"fa fa-plus\"></i> List des grps
        </a>
    </div>\t
    ";
        // line 35
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
";
        
        $__internal_36ed48ef38f9af11c1ca53e37c370b1fd0f22fe3587f1220652c854ab0a27461->leave($__internal_36ed48ef38f9af11c1ca53e37c370b1fd0f22fe3587f1220652c854ab0a27461_prof);

    }

    public function getTemplateName()
    {
        return "admin/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 35,  105 => 31,  97 => 26,  94 => 25,  88 => 24,  76 => 18,  68 => 13,  65 => 12,  59 => 11,  50 => 8,  44 => 6,  42 => 4,  36 => 3,  11 => 1,);
    }
}
