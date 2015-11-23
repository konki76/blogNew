<?php

/* admin/blog/grpIndex.html.twig */
class __TwigTemplate_23cc71247ea8a8d759c47b3ecd6ceac09d58edf0ea46ebd8c864f495d6d114e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/grpIndex.html.twig", 1);
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
        $__internal_ad00ebe46bcaea3cf10d0dba03da4c9bc4f8586602962ebf131867dc794a665e = $this->env->getExtension("native_profiler");
        $__internal_ad00ebe46bcaea3cf10d0dba03da4c9bc4f8586602962ebf131867dc794a665e->enter($__internal_ad00ebe46bcaea3cf10d0dba03da4c9bc4f8586602962ebf131867dc794a665e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/grpIndex.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ad00ebe46bcaea3cf10d0dba03da4c9bc4f8586602962ebf131867dc794a665e->leave($__internal_ad00ebe46bcaea3cf10d0dba03da4c9bc4f8586602962ebf131867dc794a665e_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_5d0d7eb43272ebedbdc7251b33d1349ea24f9c076caac90e907163f560175cfa = $this->env->getExtension("native_profiler");
        $__internal_5d0d7eb43272ebedbdc7251b33d1349ea24f9c076caac90e907163f560175cfa->enter($__internal_5d0d7eb43272ebedbdc7251b33d1349ea24f9c076caac90e907163f560175cfa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_group_index";
        
        $__internal_5d0d7eb43272ebedbdc7251b33d1349ea24f9c076caac90e907163f560175cfa->leave($__internal_5d0d7eb43272ebedbdc7251b33d1349ea24f9c076caac90e907163f560175cfa_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_a02f192eff3fa841add15a26eb29d0891aa5632df81d41ea7390c49938819fe9 = $this->env->getExtension("native_profiler");
        $__internal_a02f192eff3fa841add15a26eb29d0891aa5632df81d41ea7390c49938819fe9->enter($__internal_a02f192eff3fa841add15a26eb29d0891aa5632df81d41ea7390c49938819fe9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>Liste des groupes</h1>

    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th>Title</th>
                <th><i class=\"fa fa-calendar\"></i> Published At</th>
                <th><i class=\"fa fa-cogs\"></i> Eléments du groupe</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")));
        foreach ($context['_seq'] as $context["_key"] => $context["grp"]) {
            // line 18
            echo "            <tr>
                <td>
\t\t\t\t\t<a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_grp_edit", array("id" => $this->getAttribute($context["grp"], "id", array()))), "html", null, true);
            echo "\" >
\t\t\t\t\t";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["grp"], "title", array()), "html", null, true);
            echo "
\t\t\t\t\t</a>
\t\t\t\t</td>
                <td>";
            // line 24
            if ($this->getAttribute($context["grp"], "publishedAt", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["grp"], "publishedAt", array()), "Y-m-d H:i"), "html", null, true);
            }
            echo "</td>
                <td>
\t\t\t\t\t<a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_pgrp_list", array("id" => $this->getAttribute($context["grp"], "id", array()))), "html", null, true);
            echo "\" >
\t\t\t\t\t\t<i class=\"fa fa-plus\"></i> admin_pgrp_list
\t\t\t\t\t</a>  
\t\t\t\t</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['grp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "        </tbody>
    </table>
";
        
        $__internal_a02f192eff3fa841add15a26eb29d0891aa5632df81d41ea7390c49938819fe9->leave($__internal_a02f192eff3fa841add15a26eb29d0891aa5632df81d41ea7390c49938819fe9_prof);

    }

    // line 36
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_23974adc097fccab0cc28a17537c4ab2feaca304ba6e7c0ea2c3887ab9a70f98 = $this->env->getExtension("native_profiler");
        $__internal_23974adc097fccab0cc28a17537c4ab2feaca304ba6e7c0ea2c3887ab9a70f98->enter($__internal_23974adc097fccab0cc28a17537c4ab2feaca304ba6e7c0ea2c3887ab9a70f98_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 37
        echo "    <div class=\"section actions\">
        <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("admin_grp_new");
        echo "\" class=\"btn btn-lg btn-block btn-success\">
            <i class=\"fa fa-plus\"></i> ";
        // line 39
        echo "Create a new group";
        echo "
        </a>
    </div>

    ";
        // line 43
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
";
        
        $__internal_23974adc097fccab0cc28a17537c4ab2feaca304ba6e7c0ea2c3887ab9a70f98->leave($__internal_23974adc097fccab0cc28a17537c4ab2feaca304ba6e7c0ea2c3887ab9a70f98_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/grpIndex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 43,  126 => 39,  122 => 38,  119 => 37,  113 => 36,  104 => 32,  92 => 26,  85 => 24,  79 => 21,  75 => 20,  71 => 18,  67 => 17,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
