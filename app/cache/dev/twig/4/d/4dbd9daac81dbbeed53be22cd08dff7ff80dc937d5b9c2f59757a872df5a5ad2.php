<?php

/* admin/blog/grpEdit.html.twig */
class __TwigTemplate_4dbd9daac81dbbeed53be22cd08dff7ff80dc937d5b9c2f59757a872df5a5ad2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/grpEdit.html.twig", 1);
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
        $__internal_97f227316a85934ef77b74e8cf231ec9f5e6dfdab8254a16a5fb5055712cc781 = $this->env->getExtension("native_profiler");
        $__internal_97f227316a85934ef77b74e8cf231ec9f5e6dfdab8254a16a5fb5055712cc781->enter($__internal_97f227316a85934ef77b74e8cf231ec9f5e6dfdab8254a16a5fb5055712cc781_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/grpEdit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_97f227316a85934ef77b74e8cf231ec9f5e6dfdab8254a16a5fb5055712cc781->leave($__internal_97f227316a85934ef77b74e8cf231ec9f5e6dfdab8254a16a5fb5055712cc781_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_e91d44e3db46cf0c794d46703524d144950a5d8ba768326bbfa703922dd78343 = $this->env->getExtension("native_profiler");
        $__internal_e91d44e3db46cf0c794d46703524d144950a5d8ba768326bbfa703922dd78343->enter($__internal_e91d44e3db46cf0c794d46703524d144950a5d8ba768326bbfa703922dd78343_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_grp_edit";
        
        $__internal_e91d44e3db46cf0c794d46703524d144950a5d8ba768326bbfa703922dd78343->leave($__internal_e91d44e3db46cf0c794d46703524d144950a5d8ba768326bbfa703922dd78343_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_f404de9109b5c49c64005666938491241346024a5f88a69a7bf49dd6749df2a9 = $this->env->getExtension("native_profiler");
        $__internal_f404de9109b5c49c64005666938491241346024a5f88a69a7bf49dd6749df2a9->enter($__internal_f404de9109b5c49c64005666938491241346024a5f88a69a7bf49dd6749df2a9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>Edit Grp #";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["grp"]) ? $context["grp"] : $this->getContext($context, "grp")), "id", array()), "html", null, true);
        echo "</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig", array("form" =>         // line 9
(isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "button_label" => "Save changes"), false);
        // line 11
        echo "
";
        
        $__internal_f404de9109b5c49c64005666938491241346024a5f88a69a7bf49dd6749df2a9->leave($__internal_f404de9109b5c49c64005666938491241346024a5f88a69a7bf49dd6749df2a9_prof);

    }

    // line 14
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_e5da3ea79586d6601408963bd6f83eeb240dd4bcd1d042b85490871e7754e7c1 = $this->env->getExtension("native_profiler");
        $__internal_e5da3ea79586d6601408963bd6f83eeb240dd4bcd1d042b85490871e7754e7c1->enter($__internal_e5da3ea79586d6601408963bd6f83eeb240dd4bcd1d042b85490871e7754e7c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 15
        echo "    <div class=\"section actions\">
        ";
        // line 16
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig", array("form" =>         // line 17
(isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), "button_label" => "Delete grp", "button_css" => "btn btn-lg btn-block btn-danger", "include_back_to_home_link" => false), false);
        // line 21
        echo "
    </div>

    ";
        // line 24
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "


";
        
        $__internal_e5da3ea79586d6601408963bd6f83eeb240dd4bcd1d042b85490871e7754e7c1->leave($__internal_e5da3ea79586d6601408963bd6f83eeb240dd4bcd1d042b85490871e7754e7c1_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/grpEdit.html.twig";
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
