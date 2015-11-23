<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_4310cd125bf0c3052d0d912260539c23f2f42cd50606db0955c36e263be727bc extends Twig_Template
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
        $__internal_83e11869b0aa7f3a2c98aef427c1036f71028ac88128b2f05610366d12bcd502 = $this->env->getExtension("native_profiler");
        $__internal_83e11869b0aa7f3a2c98aef427c1036f71028ac88128b2f05610366d12bcd502->enter($__internal_83e11869b0aa7f3a2c98aef427c1036f71028ac88128b2f05610366d12bcd502_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("TwigBundle:Exception:trace.txt.twig", "TwigBundle:Exception:traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_83e11869b0aa7f3a2c98aef427c1036f71028ac88128b2f05610366d12bcd502->leave($__internal_83e11869b0aa7f3a2c98aef427c1036f71028ac88128b2f05610366d12bcd502_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
