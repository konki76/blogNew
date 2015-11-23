<?php

/* admin/blog/pGrpNew.html.twig */
class __TwigTemplate_f6196d756c1f474379d3b162be903ecf9071ef247bf490ee272e8613731ea6c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/pGrpNew.html.twig", 1);
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
        $__internal_0876d0a1ddd21b066c3de770b244178357f15f17fe8f9bdafd989bf6563a422e = $this->env->getExtension("native_profiler");
        $__internal_0876d0a1ddd21b066c3de770b244178357f15f17fe8f9bdafd989bf6563a422e->enter($__internal_0876d0a1ddd21b066c3de770b244178357f15f17fe8f9bdafd989bf6563a422e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/pGrpNew.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0876d0a1ddd21b066c3de770b244178357f15f17fe8f9bdafd989bf6563a422e->leave($__internal_0876d0a1ddd21b066c3de770b244178357f15f17fe8f9bdafd989bf6563a422e_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_e13038d3aec69c65d1a171263174cf8e1416f99826b4b439989e24b507c4a8fe = $this->env->getExtension("native_profiler");
        $__internal_e13038d3aec69c65d1a171263174cf8e1416f99826b4b439989e24b507c4a8fe->enter($__internal_e13038d3aec69c65d1a171263174cf8e1416f99826b4b439989e24b507c4a8fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_pGrp_new";
        
        $__internal_e13038d3aec69c65d1a171263174cf8e1416f99826b4b439989e24b507c4a8fe->leave($__internal_e13038d3aec69c65d1a171263174cf8e1416f99826b4b439989e24b507c4a8fe_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_d47b065014edaaa69df7e6a349c8adb56951f7ddb3827e61d5770ad53d7e351c = $this->env->getExtension("native_profiler");
        $__internal_d47b065014edaaa69df7e6a349c8adb56951f7ddb3827e61d5770ad53d7e351c->enter($__internal_d47b065014edaaa69df7e6a349c8adb56951f7ddb3827e61d5770ad53d7e351c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>post Group creation</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig");
        echo "
";
        
        $__internal_d47b065014edaaa69df7e6a349c8adb56951f7ddb3827e61d5770ad53d7e351c->leave($__internal_d47b065014edaaa69df7e6a349c8adb56951f7ddb3827e61d5770ad53d7e351c_prof);

    }

    // line 11
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_9fe286fd2883d6c5d04156264b51736effa403ca988dafdcb521567b08d80bc4 = $this->env->getExtension("native_profiler");
        $__internal_9fe286fd2883d6c5d04156264b51736effa403ca988dafdcb521567b08d80bc4->enter($__internal_9fe286fd2883d6c5d04156264b51736effa403ca988dafdcb521567b08d80bc4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 12
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

";
        
        $__internal_9fe286fd2883d6c5d04156264b51736effa403ca988dafdcb521567b08d80bc4->leave($__internal_9fe286fd2883d6c5d04156264b51736effa403ca988dafdcb521567b08d80bc4_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/pGrpNew.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 12,  67 => 11,  58 => 8,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
