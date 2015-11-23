<?php

/* blog/answer_form.html.twig */
class __TwigTemplate_ef1c5f84c74a8c70c421012be6141428f01be63b7242abd84994a5ee206414af extends Twig_Template
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
        $__internal_d5adcaa104e6e86bf79062099da23552011d3c68225a570a17238acc72c86046 = $this->env->getExtension("native_profiler");
        $__internal_d5adcaa104e6e86bf79062099da23552011d3c68225a570a17238acc72c86046->enter($__internal_d5adcaa104e6e86bf79062099da23552011d3c68225a570a17238acc72c86046_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/answer_form.html.twig"));

        // line 1
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("method" => "POST", "action" => $this->env->getExtension('routing')->getPath("answer_new", array("postSlug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "slug", array())))));
        echo "
    ";
        // line 6
        echo "\t
    <fieldset>
    
        ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer1", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer1", array()), "html", null, true);
        echo "<br>
        ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer2", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer2", array()), "html", null, true);
        echo "<br>
        ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer3", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer3", array()), "html", null, true);
        echo "<br>
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer4", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer4", array()), "html", null, true);
        echo "<br>
        <div class=\"form-group\">
            ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "submit", array()), 'widget', array("attr" => array("class" => "btn-primary pull-right"), "label" => "Ok"));
        echo "
        </div>
    </fieldset>
";
        // line 17
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_d5adcaa104e6e86bf79062099da23552011d3c68225a570a17238acc72c86046->leave($__internal_d5adcaa104e6e86bf79062099da23552011d3c68225a570a17238acc72c86046_prof);

    }

    public function getTemplateName()
    {
        return "blog/answer_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 17,  52 => 14,  46 => 12,  41 => 11,  36 => 10,  31 => 9,  26 => 6,  22 => 1,);
    }
}
