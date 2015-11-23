<?php

/* admin/blog/edit.html.twig */
class __TwigTemplate_786428cec46e399f5c88a2ec546302b3d48ae4f074df57a4a962ca5f4fa80fe7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/edit.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'main' => array($this, 'block_main'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_878a5754cf69d8a3d6bfa0286e96015d1fb888e101c7ad8091f32fa60944f169 = $this->env->getExtension("native_profiler");
        $__internal_878a5754cf69d8a3d6bfa0286e96015d1fb888e101c7ad8091f32fa60944f169->enter($__internal_878a5754cf69d8a3d6bfa0286e96015d1fb888e101c7ad8091f32fa60944f169_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_878a5754cf69d8a3d6bfa0286e96015d1fb888e101c7ad8091f32fa60944f169->leave($__internal_878a5754cf69d8a3d6bfa0286e96015d1fb888e101c7ad8091f32fa60944f169_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_89951b3490de30159ea2e8e39f5e5ca5cb078cd52f87d30b8becca490513397c = $this->env->getExtension("native_profiler");
        $__internal_89951b3490de30159ea2e8e39f5e5ca5cb078cd52f87d30b8becca490513397c->enter($__internal_89951b3490de30159ea2e8e39f5e5ca5cb078cd52f87d30b8becca490513397c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_post_edit";
        
        $__internal_89951b3490de30159ea2e8e39f5e5ca5cb078cd52f87d30b8becca490513397c->leave($__internal_89951b3490de30159ea2e8e39f5e5ca5cb078cd52f87d30b8becca490513397c_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_bf35c1601938b26357d74e45fad80b0fee3e169702493d1b140003ce86aeee36 = $this->env->getExtension("native_profiler");
        $__internal_bf35c1601938b26357d74e45fad80b0fee3e169702493d1b140003ce86aeee36->enter($__internal_bf35c1601938b26357d74e45fad80b0fee3e169702493d1b140003ce86aeee36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>Edit post #";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()), "html", null, true);
        echo "</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig", array("form" =>         // line 9
(isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "button_label" => "Save changes"), false);
        // line 11
        echo "
";
        
        $__internal_bf35c1601938b26357d74e45fad80b0fee3e169702493d1b140003ce86aeee36->leave($__internal_bf35c1601938b26357d74e45fad80b0fee3e169702493d1b140003ce86aeee36_prof);

    }

    // line 14
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_1388b688aa2637678cfd00452fa41316c8c56b05e02deb5132fa86b46edf3129 = $this->env->getExtension("native_profiler");
        $__internal_1388b688aa2637678cfd00452fa41316c8c56b05e02deb5132fa86b46edf3129->enter($__internal_1388b688aa2637678cfd00452fa41316c8c56b05e02deb5132fa86b46edf3129_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 15
        echo "    <div class=\"section actions\">
        ";
        // line 16
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig", array("form" =>         // line 17
(isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), "button_label" => "Delete post", "button_css" => "btn btn-lg btn-block btn-danger", "include_back_to_home_link" => false), false);
        // line 21
        echo "
    </div>

    ";
        // line 24
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "


";
        
        $__internal_1388b688aa2637678cfd00452fa41316c8c56b05e02deb5132fa86b46edf3129->leave($__internal_1388b688aa2637678cfd00452fa41316c8c56b05e02deb5132fa86b46edf3129_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 24,  83 => 21,  81 => 17,  80 => 16,  77 => 15,  71 => 14,  63 => 11,  61 => 9,  60 => 8,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
