<?php

/* admin/blog/ueIndex.html.twig */
class __TwigTemplate_785b0bf3b0f3aa641856b7a391f25feca7575cf7db97062fbedad6d9717f3527 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/ueIndex.html.twig", 1);
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
        $__internal_b90332acd212840ac15ccf1457e3ea44d85e5fc60b4d5001dd598982bfb7fd7c = $this->env->getExtension("native_profiler");
        $__internal_b90332acd212840ac15ccf1457e3ea44d85e5fc60b4d5001dd598982bfb7fd7c->enter($__internal_b90332acd212840ac15ccf1457e3ea44d85e5fc60b4d5001dd598982bfb7fd7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/ueIndex.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b90332acd212840ac15ccf1457e3ea44d85e5fc60b4d5001dd598982bfb7fd7c->leave($__internal_b90332acd212840ac15ccf1457e3ea44d85e5fc60b4d5001dd598982bfb7fd7c_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_368d001aa19125ae8c32ae15d20fce72cb550ef595ff21dd022b20bcdd9bbb50 = $this->env->getExtension("native_profiler");
        $__internal_368d001aa19125ae8c32ae15d20fce72cb550ef595ff21dd022b20bcdd9bbb50->enter($__internal_368d001aa19125ae8c32ae15d20fce72cb550ef595ff21dd022b20bcdd9bbb50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_ue_index";
        
        $__internal_368d001aa19125ae8c32ae15d20fce72cb550ef595ff21dd022b20bcdd9bbb50->leave($__internal_368d001aa19125ae8c32ae15d20fce72cb550ef595ff21dd022b20bcdd9bbb50_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_3fb7bd471ad72f9378990fee242a5fe6e56a63a5595703f19a0bdcabc3d8f35c = $this->env->getExtension("native_profiler");
        $__internal_3fb7bd471ad72f9378990fee242a5fe6e56a63a5595703f19a0bdcabc3d8f35c->enter($__internal_3fb7bd471ad72f9378990fee242a5fe6e56a63a5595703f19a0bdcabc3d8f35c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>Liste des UE</h1>

    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th>Title</th>
                <th><i class=\"fa fa-calendar\"></i> Published At</th>
                <th><i class=\"fa fa-cogs\"></i> Eléments UE</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ues"]) ? $context["ues"] : $this->getContext($context, "ues")));
        foreach ($context['_seq'] as $context["_key"] => $context["ue"]) {
            // line 18
            echo "            <tr>
                <td>
\t\t\t\t\t<a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_ue_edit", array("id" => $this->getAttribute($context["ue"], "id", array()))), "html", null, true);
            echo "\" >
\t\t\t\t\t";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["ue"], "title", array()), "html", null, true);
            echo "
\t\t\t\t\t</a>
\t\t\t\t</td>
                <td>";
            // line 24
            if ($this->getAttribute($context["ue"], "publishedAt", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["ue"], "publishedAt", array()), "Y-m-d H:i"), "html", null, true);
            }
            echo "</td>
                <td>
\t\t\t\t\t<a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_uegrp_list", array("id" => $this->getAttribute($context["ue"], "id", array()))), "html", null, true);
            echo "\" >
\t\t\t\t\t\t<i class=\"fa fa-plus\"></i> admin_uegrp_list
\t\t\t\t\t</a>  
\t\t\t\t</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "        </tbody>
    </table>
";
        
        $__internal_3fb7bd471ad72f9378990fee242a5fe6e56a63a5595703f19a0bdcabc3d8f35c->leave($__internal_3fb7bd471ad72f9378990fee242a5fe6e56a63a5595703f19a0bdcabc3d8f35c_prof);

    }

    // line 36
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_88429c95e06d5ff2d7a724c93b1424ce0201cd75ad2d1aee979de4f1c6fdd0c3 = $this->env->getExtension("native_profiler");
        $__internal_88429c95e06d5ff2d7a724c93b1424ce0201cd75ad2d1aee979de4f1c6fdd0c3->enter($__internal_88429c95e06d5ff2d7a724c93b1424ce0201cd75ad2d1aee979de4f1c6fdd0c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 37
        echo "    <div class=\"section actions\">
        <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("admin_ue_new");
        echo "\" class=\"btn btn-lg btn-block btn-success\">
            <i class=\"fa fa-plus\"></i> ";
        // line 39
        echo "Create a new UE";
        echo "
        </a>
    </div>

    ";
        // line 43
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
";
        
        $__internal_88429c95e06d5ff2d7a724c93b1424ce0201cd75ad2d1aee979de4f1c6fdd0c3->leave($__internal_88429c95e06d5ff2d7a724c93b1424ce0201cd75ad2d1aee979de4f1c6fdd0c3_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/ueIndex.html.twig";
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
