<?php

/* admin/blog/grpNew.html.twig */
class __TwigTemplate_284d385df629e6898cf072e715d2d7fa8a541099529059c8522df71e56aa5629 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/grpNew.html.twig", 1);
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
        $__internal_cc7fa9ccf1f06b49169f1225519f78f335edf85411a4ab3b10d04781f9aaa41c = $this->env->getExtension("native_profiler");
        $__internal_cc7fa9ccf1f06b49169f1225519f78f335edf85411a4ab3b10d04781f9aaa41c->enter($__internal_cc7fa9ccf1f06b49169f1225519f78f335edf85411a4ab3b10d04781f9aaa41c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/grpNew.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cc7fa9ccf1f06b49169f1225519f78f335edf85411a4ab3b10d04781f9aaa41c->leave($__internal_cc7fa9ccf1f06b49169f1225519f78f335edf85411a4ab3b10d04781f9aaa41c_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_5b64a797754cc8db960cd10a8c6aa8fda66a2f6a8dd8f5bf7d30f896790060bd = $this->env->getExtension("native_profiler");
        $__internal_5b64a797754cc8db960cd10a8c6aa8fda66a2f6a8dd8f5bf7d30f896790060bd->enter($__internal_5b64a797754cc8db960cd10a8c6aa8fda66a2f6a8dd8f5bf7d30f896790060bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_grp_new";
        
        $__internal_5b64a797754cc8db960cd10a8c6aa8fda66a2f6a8dd8f5bf7d30f896790060bd->leave($__internal_5b64a797754cc8db960cd10a8c6aa8fda66a2f6a8dd8f5bf7d30f896790060bd_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_8a54d7014e9d0098365af13068760351f99def0e94a4fbfa2e63798f05d351b7 = $this->env->getExtension("native_profiler");
        $__internal_8a54d7014e9d0098365af13068760351f99def0e94a4fbfa2e63798f05d351b7->enter($__internal_8a54d7014e9d0098365af13068760351f99def0e94a4fbfa2e63798f05d351b7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>Group creation</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig");
        echo "
";
        
        $__internal_8a54d7014e9d0098365af13068760351f99def0e94a4fbfa2e63798f05d351b7->leave($__internal_8a54d7014e9d0098365af13068760351f99def0e94a4fbfa2e63798f05d351b7_prof);

    }

    // line 11
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_45e75f3c30e38d81083b1196c9e6f15eeedf31e9d60eed01e5fc374d49234771 = $this->env->getExtension("native_profiler");
        $__internal_45e75f3c30e38d81083b1196c9e6f15eeedf31e9d60eed01e5fc374d49234771->enter($__internal_45e75f3c30e38d81083b1196c9e6f15eeedf31e9d60eed01e5fc374d49234771_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 12
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

";
        
        $__internal_45e75f3c30e38d81083b1196c9e6f15eeedf31e9d60eed01e5fc374d49234771->leave($__internal_45e75f3c30e38d81083b1196c9e6f15eeedf31e9d60eed01e5fc374d49234771_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/grpNew.html.twig";
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
