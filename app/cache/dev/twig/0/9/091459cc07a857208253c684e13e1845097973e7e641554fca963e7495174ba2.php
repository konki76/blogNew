<?php

/* admin/blog/ueEdit.html.twig */
class __TwigTemplate_091459cc07a857208253c684e13e1845097973e7e641554fca963e7495174ba2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/ueEdit.html.twig", 1);
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
        $__internal_aeaad7d707d19189f674ce81425007ea1338ee642dc25b0697b01f61bf3aad80 = $this->env->getExtension("native_profiler");
        $__internal_aeaad7d707d19189f674ce81425007ea1338ee642dc25b0697b01f61bf3aad80->enter($__internal_aeaad7d707d19189f674ce81425007ea1338ee642dc25b0697b01f61bf3aad80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/ueEdit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_aeaad7d707d19189f674ce81425007ea1338ee642dc25b0697b01f61bf3aad80->leave($__internal_aeaad7d707d19189f674ce81425007ea1338ee642dc25b0697b01f61bf3aad80_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_d22b4fb529b4478d6644ef9e384260c3827ad137bbb65e044e648b7888b8b1ee = $this->env->getExtension("native_profiler");
        $__internal_d22b4fb529b4478d6644ef9e384260c3827ad137bbb65e044e648b7888b8b1ee->enter($__internal_d22b4fb529b4478d6644ef9e384260c3827ad137bbb65e044e648b7888b8b1ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_ue_edit";
        
        $__internal_d22b4fb529b4478d6644ef9e384260c3827ad137bbb65e044e648b7888b8b1ee->leave($__internal_d22b4fb529b4478d6644ef9e384260c3827ad137bbb65e044e648b7888b8b1ee_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_74c99eaea3ae9e049bb32735abdad40b241d5e4bf21709f0fa34ea90001edfdb = $this->env->getExtension("native_profiler");
        $__internal_74c99eaea3ae9e049bb32735abdad40b241d5e4bf21709f0fa34ea90001edfdb->enter($__internal_74c99eaea3ae9e049bb32735abdad40b241d5e4bf21709f0fa34ea90001edfdb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>Edit ue #";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ue"]) ? $context["ue"] : $this->getContext($context, "ue")), "id", array()), "html", null, true);
        echo "</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig", array("form" =>         // line 9
(isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "button_label" => "Save changes"), false);
        // line 11
        echo "
";
        
        $__internal_74c99eaea3ae9e049bb32735abdad40b241d5e4bf21709f0fa34ea90001edfdb->leave($__internal_74c99eaea3ae9e049bb32735abdad40b241d5e4bf21709f0fa34ea90001edfdb_prof);

    }

    // line 14
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_a481cd9e26614f3a6bf32b8ea339a4a1e2ec8d905f808487ba48ab2ec9cca411 = $this->env->getExtension("native_profiler");
        $__internal_a481cd9e26614f3a6bf32b8ea339a4a1e2ec8d905f808487ba48ab2ec9cca411->enter($__internal_a481cd9e26614f3a6bf32b8ea339a4a1e2ec8d905f808487ba48ab2ec9cca411_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 15
        echo "    <div class=\"section actions\">
        ";
        // line 16
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig", array("form" =>         // line 17
(isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), "button_label" => "Delete ue", "button_css" => "btn btn-lg btn-block btn-danger", "include_back_to_home_link" => false), false);
        // line 21
        echo "
    </div>

    ";
        // line 24
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "


";
        
        $__internal_a481cd9e26614f3a6bf32b8ea339a4a1e2ec8d905f808487ba48ab2ec9cca411->leave($__internal_a481cd9e26614f3a6bf32b8ea339a4a1e2ec8d905f808487ba48ab2ec9cca411_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/ueEdit.html.twig";
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
