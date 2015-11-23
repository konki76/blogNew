<?php

/* admin/blog/_form.html.twig */
class __TwigTemplate_36fdc13c49aa80df6b96cc86568b432aa3f3a86156173cef5e372dcb6cd28aea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9581575295adf47b78b3c4b3e84560ad0bd612e550d00fc17de963d424c1d96c = $this->env->getExtension("native_profiler");
        $__internal_9581575295adf47b78b3c4b3e84560ad0bd612e550d00fc17de963d424c1d96c->enter($__internal_9581575295adf47b78b3c4b3e84560ad0bd612e550d00fc17de963d424c1d96c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/_form.html.twig"));

        // line 1
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 2
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "

    <input type=\"submit\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, ((array_key_exists("button_label", $context)) ? (_twig_default_filter((isset($context["button_label"]) ? $context["button_label"] : $this->getContext($context, "button_label")), "Create")) : ("Create")), "html", null, true);
        echo "\"
           class=\"";
        // line 5
        echo twig_escape_filter($this->env, ((array_key_exists("button_css", $context)) ? (_twig_default_filter((isset($context["button_css"]) ? $context["button_css"] : $this->getContext($context, "button_css")), "btn btn-primary")) : ("btn btn-primary")), "html", null, true);
        echo "\" />

    ";
        // line 7
        if (( !array_key_exists("include_back_to_home_link", $context) || ((isset($context["include_back_to_home_link"]) ? $context["include_back_to_home_link"] : $this->getContext($context, "include_back_to_home_link")) == true))) {
            // line 8
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("admin_post_index");
            echo "\" class=\"btn btn-link\">
            Back to the list
        </a>
    ";
        }
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_9581575295adf47b78b3c4b3e84560ad0bd612e550d00fc17de963d424c1d96c->leave($__internal_9581575295adf47b78b3c4b3e84560ad0bd612e550d00fc17de963d424c1d96c_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 12,  42 => 8,  40 => 7,  35 => 5,  31 => 4,  26 => 2,  22 => 1,);
    }
}
