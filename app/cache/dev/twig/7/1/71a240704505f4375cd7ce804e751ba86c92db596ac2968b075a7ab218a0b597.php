<?php

/* blog/comment_form.html.twig */
class __TwigTemplate_71a240704505f4375cd7ce804e751ba86c92db596ac2968b075a7ab218a0b597 extends Twig_Template
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
        $__internal_939dda2a328c36a210753de108c5f0e4b6d6436f359afaca87b8f0c7843d337e = $this->env->getExtension("native_profiler");
        $__internal_939dda2a328c36a210753de108c5f0e4b6d6436f359afaca87b8f0c7843d337e->enter($__internal_939dda2a328c36a210753de108c5f0e4b6d6436f359afaca87b8f0c7843d337e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/comment_form.html.twig"));

        // line 1
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("method" => "POST", "action" => $this->env->getExtension('routing')->getPath("comment_new", array("postSlug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "slug", array())))));
        echo "
    ";
        // line 7
        echo "
    <fieldset>
        <legend>Ajouter un commentaire</legend>

        <div class=\"form-group\">
            ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "content", array()), 'label', array("label_attr" => array("class" => "hidden"), "label" => "Content"));
        echo "

            ";
        // line 14
        if ( !$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "valid", array())) {
            // line 15
            echo "                <div class=\"alert alert-danger form-error\">
                    ";
            // line 16
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "content", array()), 'errors');
            echo "
                </div>
            ";
        }
        // line 19
        echo "
            ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "content", array()), 'widget', array("attr" => array("rows" => 10)));
        echo "
        </div>

        <div class=\"form-group\">
            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "submit", array()), 'widget', array("attr" => array("class" => "btn-primary pull-right"), "label" => "Publier un commentaire"));
        echo "
        </div>
    </fieldset>
";
        // line 27
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_939dda2a328c36a210753de108c5f0e4b6d6436f359afaca87b8f0c7843d337e->leave($__internal_939dda2a328c36a210753de108c5f0e4b6d6436f359afaca87b8f0c7843d337e_prof);

    }

    public function getTemplateName()
    {
        return "blog/comment_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 27,  59 => 24,  52 => 20,  49 => 19,  43 => 16,  40 => 15,  38 => 14,  33 => 12,  26 => 7,  22 => 1,);
    }
}
