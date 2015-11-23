<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_2fb8c24eb1f93b0a6c9e7cdb75fc5e634e34a4ad2109e9fb3221312feb86cf84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_955c0c7d281955a64d18a4eeae36ad59d84446cb0afdcd967639a7714c731a36 = $this->env->getExtension("native_profiler");
        $__internal_955c0c7d281955a64d18a4eeae36ad59d84446cb0afdcd967639a7714c731a36->enter($__internal_955c0c7d281955a64d18a4eeae36ad59d84446cb0afdcd967639a7714c731a36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_955c0c7d281955a64d18a4eeae36ad59d84446cb0afdcd967639a7714c731a36->leave($__internal_955c0c7d281955a64d18a4eeae36ad59d84446cb0afdcd967639a7714c731a36_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_967dfe50ef0c0fd7490c076ac0eed84550a02fb35958c8383be4c2ff66bd9793 = $this->env->getExtension("native_profiler");
        $__internal_967dfe50ef0c0fd7490c076ac0eed84550a02fb35958c8383be4c2ff66bd9793->enter($__internal_967dfe50ef0c0fd7490c076ac0eed84550a02fb35958c8383be4c2ff66bd9793_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_967dfe50ef0c0fd7490c076ac0eed84550a02fb35958c8383be4c2ff66bd9793->leave($__internal_967dfe50ef0c0fd7490c076ac0eed84550a02fb35958c8383be4c2ff66bd9793_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_8f263f1518081d39e9cdceb157fa1956b17eb7779780cf838078e65267c6ca9b = $this->env->getExtension("native_profiler");
        $__internal_8f263f1518081d39e9cdceb157fa1956b17eb7779780cf838078e65267c6ca9b->enter($__internal_8f263f1518081d39e9cdceb157fa1956b17eb7779780cf838078e65267c6ca9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_8f263f1518081d39e9cdceb157fa1956b17eb7779780cf838078e65267c6ca9b->leave($__internal_8f263f1518081d39e9cdceb157fa1956b17eb7779780cf838078e65267c6ca9b_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_31b50767f9f4c32d0e8a8f5061a8a17001b78f3f847c4be02b8322a9a9f8e43e = $this->env->getExtension("native_profiler");
        $__internal_31b50767f9f4c32d0e8a8f5061a8a17001b78f3f847c4be02b8322a9a9f8e43e->enter($__internal_31b50767f9f4c32d0e8a8f5061a8a17001b78f3f847c4be02b8322a9a9f8e43e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_31b50767f9f4c32d0e8a8f5061a8a17001b78f3f847c4be02b8322a9a9f8e43e->leave($__internal_31b50767f9f4c32d0e8a8f5061a8a17001b78f3f847c4be02b8322a9a9f8e43e_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
