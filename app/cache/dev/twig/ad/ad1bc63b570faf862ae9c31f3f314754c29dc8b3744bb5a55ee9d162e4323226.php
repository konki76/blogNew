<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_b2b976f0b7d644541159347e021ed3cff9968f98608b48b2dd50cdd0c5dbb511 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f6fb739b6aedcb0a58c636f075716533eda2347cea2c5a0778386a442575cd81 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f6fb739b6aedcb0a58c636f075716533eda2347cea2c5a0778386a442575cd81->enter($__internal_f6fb739b6aedcb0a58c636f075716533eda2347cea2c5a0778386a442575cd81_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f6fb739b6aedcb0a58c636f075716533eda2347cea2c5a0778386a442575cd81->leave($__internal_f6fb739b6aedcb0a58c636f075716533eda2347cea2c5a0778386a442575cd81_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_2190087c87be0e41c143632c71a3627272efd75d6f53ff38a2536823c05be96f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2190087c87be0e41c143632c71a3627272efd75d6f53ff38a2536823c05be96f->enter($__internal_2190087c87be0e41c143632c71a3627272efd75d6f53ff38a2536823c05be96f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_2190087c87be0e41c143632c71a3627272efd75d6f53ff38a2536823c05be96f->leave($__internal_2190087c87be0e41c143632c71a3627272efd75d6f53ff38a2536823c05be96f_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_38d0761041100c8fd36f1203925dd3a14d2b286dd6d73534114c9dcee978c50d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_38d0761041100c8fd36f1203925dd3a14d2b286dd6d73534114c9dcee978c50d->enter($__internal_38d0761041100c8fd36f1203925dd3a14d2b286dd6d73534114c9dcee978c50d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_38d0761041100c8fd36f1203925dd3a14d2b286dd6d73534114c9dcee978c50d->leave($__internal_38d0761041100c8fd36f1203925dd3a14d2b286dd6d73534114c9dcee978c50d_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_ed2e42b8a99eb4b62f8a6f8d256205aa8437a15b328ec7afbf8c99e4abaf112b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ed2e42b8a99eb4b62f8a6f8d256205aa8437a15b328ec7afbf8c99e4abaf112b->enter($__internal_ed2e42b8a99eb4b62f8a6f8d256205aa8437a15b328ec7afbf8c99e4abaf112b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_ed2e42b8a99eb4b62f8a6f8d256205aa8437a15b328ec7afbf8c99e4abaf112b->leave($__internal_ed2e42b8a99eb4b62f8a6f8d256205aa8437a15b328ec7afbf8c99e4abaf112b_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "C:\\wamp64\\www\\blogNew\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\router.html.twig");
    }
}
