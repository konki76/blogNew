<?php

/* admin/blog/pGrpShow.html.twig */
class __TwigTemplate_dde7d6a9eabbc6c0d7c36dffda934fbdafcd33d5a0eb86ed31cf1a00d1b6b4ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/pGrpShow.html.twig", 1);
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
        $__internal_7eac69b3da6ce8fc6b046789b1c27ecd7cb35d9d41e55f2fe450005d3a487f98 = $this->env->getExtension("native_profiler");
        $__internal_7eac69b3da6ce8fc6b046789b1c27ecd7cb35d9d41e55f2fe450005d3a487f98->enter($__internal_7eac69b3da6ce8fc6b046789b1c27ecd7cb35d9d41e55f2fe450005d3a487f98_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/pGrpShow.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7eac69b3da6ce8fc6b046789b1c27ecd7cb35d9d41e55f2fe450005d3a487f98->leave($__internal_7eac69b3da6ce8fc6b046789b1c27ecd7cb35d9d41e55f2fe450005d3a487f98_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_96e34c385d50fae865b6eab56013d34f47c7508584dc2ddd715d191c5de40df0 = $this->env->getExtension("native_profiler");
        $__internal_96e34c385d50fae865b6eab56013d34f47c7508584dc2ddd715d191c5de40df0->enter($__internal_96e34c385d50fae865b6eab56013d34f47c7508584dc2ddd715d191c5de40df0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_group_index";
        
        $__internal_96e34c385d50fae865b6eab56013d34f47c7508584dc2ddd715d191c5de40df0->leave($__internal_96e34c385d50fae865b6eab56013d34f47c7508584dc2ddd715d191c5de40df0_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_f5b0eeca4d0907a8eab385a14fe03b70bf3283874a8cfa7ed3f778dc367ddaf2 = $this->env->getExtension("native_profiler");
        $__internal_f5b0eeca4d0907a8eab385a14fe03b70bf3283874a8cfa7ed3f778dc367ddaf2->enter($__internal_f5b0eeca4d0907a8eab385a14fe03b70bf3283874a8cfa7ed3f778dc367ddaf2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>";
        echo twig_escape_filter($this->env, (isset($context["pGrpsCt"]) ? $context["pGrpsCt"] : $this->getContext($context, "pGrpsCt")), "html", null, true);
        echo " questions dans le group {.{}.} </h1>
\t
    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th>Title</th>
                <th><i class=\"fa fa-calendar\"></i> Published At</th>
                <th><i class=\"fa fa-cogs\"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pGrps"]) ? $context["pGrps"] : $this->getContext($context, "pGrps")));
        foreach ($context['_seq'] as $context["_key"] => $context["grp"]) {
            // line 18
            echo "            <tr>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["grp"], "title", array()), "html", null, true);
            echo "</td>
                <td>noting</td>
                <td>
\t\t\t\t<a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_post_edit", array("id" => $this->getAttribute($this->getAttribute($context["grp"], "post", array()), "id", array()))), "html", null, true);
            echo "\" >
\t\t\t\t\t\t<i class=\"fa fa-plus\"></i> ";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["grp"], "post", array()), "title", array()), "html", null, true);
            echo "
\t\t\t\t\t</a> 
\t\t\t\t</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['grp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        </tbody>
    </table>
";
        
        $__internal_f5b0eeca4d0907a8eab385a14fe03b70bf3283874a8cfa7ed3f778dc367ddaf2->leave($__internal_f5b0eeca4d0907a8eab385a14fe03b70bf3283874a8cfa7ed3f778dc367ddaf2_prof);

    }

    // line 32
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_bd33e1856b40ad2a92b2ec853108fcb7094ea09191142d025ef81039746e0c2e = $this->env->getExtension("native_profiler");
        $__internal_bd33e1856b40ad2a92b2ec853108fcb7094ea09191142d025ef81039746e0c2e->enter($__internal_bd33e1856b40ad2a92b2ec853108fcb7094ea09191142d025ef81039746e0c2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 33
        echo "    <div class=\"section actions\">
        <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_pGrp_new", array("grpId" => (isset($context["grpId"]) ? $context["grpId"] : $this->getContext($context, "grpId")))), "html", null, true);
        echo "\" class=\"btn btn-lg btn-block btn-success\">
            <i class=\"fa fa-plus\"></i> ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.create_post"), "html", null, true);
        echo "
        </a>
\t\t
\t\t
    </div>

    ";
        // line 41
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
";
        
        $__internal_bd33e1856b40ad2a92b2ec853108fcb7094ea09191142d025ef81039746e0c2e->leave($__internal_bd33e1856b40ad2a92b2ec853108fcb7094ea09191142d025ef81039746e0c2e_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/pGrpShow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 41,  119 => 35,  115 => 34,  112 => 33,  106 => 32,  97 => 28,  86 => 23,  82 => 22,  76 => 19,  73 => 18,  69 => 17,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
