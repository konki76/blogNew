<?php

/* admin/blog/new.html.twig */
class __TwigTemplate_221e6cd32a3d5d902442015220ebc500a8ead8cb7cb895a86ec7bc61a8308e48 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/new.html.twig", 1);
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
        $__internal_45d4ef6db213c0d533a1a71e0871d84a10e8c59460e4f635074585b5b9d78dfb = $this->env->getExtension("native_profiler");
        $__internal_45d4ef6db213c0d533a1a71e0871d84a10e8c59460e4f635074585b5b9d78dfb->enter($__internal_45d4ef6db213c0d533a1a71e0871d84a10e8c59460e4f635074585b5b9d78dfb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_45d4ef6db213c0d533a1a71e0871d84a10e8c59460e4f635074585b5b9d78dfb->leave($__internal_45d4ef6db213c0d533a1a71e0871d84a10e8c59460e4f635074585b5b9d78dfb_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_adafc04e4af2e444a630120e5c8d3f24c9ad82f2db9063f5248eda92f93e32bc = $this->env->getExtension("native_profiler");
        $__internal_adafc04e4af2e444a630120e5c8d3f24c9ad82f2db9063f5248eda92f93e32bc->enter($__internal_adafc04e4af2e444a630120e5c8d3f24c9ad82f2db9063f5248eda92f93e32bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_post_new";
        
        $__internal_adafc04e4af2e444a630120e5c8d3f24c9ad82f2db9063f5248eda92f93e32bc->leave($__internal_adafc04e4af2e444a630120e5c8d3f24c9ad82f2db9063f5248eda92f93e32bc_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_c0a22f78ae6b1f200a19ab7daf59fb193361e6b32c81337019e11a9b213512f0 = $this->env->getExtension("native_profiler");
        $__internal_c0a22f78ae6b1f200a19ab7daf59fb193361e6b32c81337019e11a9b213512f0->enter($__internal_c0a22f78ae6b1f200a19ab7daf59fb193361e6b32c81337019e11a9b213512f0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>Post creation</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig");
        echo "
";
        
        $__internal_c0a22f78ae6b1f200a19ab7daf59fb193361e6b32c81337019e11a9b213512f0->leave($__internal_c0a22f78ae6b1f200a19ab7daf59fb193361e6b32c81337019e11a9b213512f0_prof);

    }

    // line 11
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_9b6f1a8455731af1faa524aa0b32f8d357f0eede20b0749358ebfa7ecfb3f0f8 = $this->env->getExtension("native_profiler");
        $__internal_9b6f1a8455731af1faa524aa0b32f8d357f0eede20b0749358ebfa7ecfb3f0f8->enter($__internal_9b6f1a8455731af1faa524aa0b32f8d357f0eede20b0749358ebfa7ecfb3f0f8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 12
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

";
        
        $__internal_9b6f1a8455731af1faa524aa0b32f8d357f0eede20b0749358ebfa7ecfb3f0f8->leave($__internal_9b6f1a8455731af1faa524aa0b32f8d357f0eede20b0749358ebfa7ecfb3f0f8_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/new.html.twig";
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
