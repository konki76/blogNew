<?php

/* blog/answer_grp_form.html.twig */
class __TwigTemplate_93141581eec283a3ce7485ee84f6fb52871f0323a2da94ed86a275bf687e0ff6 extends Twig_Template
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
        $__internal_74daf1e55797085a424c286738acd51a986855d25b38260f08ebc7ca83651047 = $this->env->getExtension("native_profiler");
        $__internal_74daf1e55797085a424c286738acd51a986855d25b38260f08ebc7ca83651047->enter($__internal_74daf1e55797085a424c286738acd51a986855d25b38260f08ebc7ca83651047_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/answer_grp_form.html.twig"));

        // line 1
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("method" => "POST", "action" => $this->env->getExtension('routing')->getPath("answer_grp_new", array("grpSlug" => (isset($context["grp"]) ? $context["grp"] : $this->getContext($context, "grp")), "postSlug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "slug", array()), "nextPostId" => (isset($context["nextPostId"]) ? $context["nextPostId"] : $this->getContext($context, "nextPostId"))))));
        echo "
    ";
        // line 6
        echo "\t
    <fieldset>


        ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer1", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer1", array()), "html", null, true);
        echo "<br>
        ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer2", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer2", array()), "html", null, true);
        echo "<br>
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer3", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer3", array()), "html", null, true);
        echo "<br>
        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "answer4", array()), 'widget');
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "labelAnswer4", array()), "html", null, true);
        echo "<br>
        <div class=\"form-group\">
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "submit", array()), 'widget', array("attr" => array("class" => "btn-primary pull-right"), "label" => "Ok"));
        echo "
        </div>
    </fieldset>
";
        // line 18
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_74daf1e55797085a424c286738acd51a986855d25b38260f08ebc7ca83651047->leave($__internal_74daf1e55797085a424c286738acd51a986855d25b38260f08ebc7ca83651047_prof);

    }

    public function getTemplateName()
    {
        return "blog/answer_grp_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 18,  53 => 15,  47 => 13,  42 => 12,  37 => 11,  32 => 10,  26 => 6,  22 => 1,);
    }
}
