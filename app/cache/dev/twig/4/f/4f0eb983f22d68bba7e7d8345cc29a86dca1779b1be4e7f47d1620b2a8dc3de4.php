<?php

/* admin/blog/index.html.twig */
class __TwigTemplate_4f0eb983f22d68bba7e7d8345cc29a86dca1779b1be4e7f47d1620b2a8dc3de4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/index.html.twig", 1);
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
        $__internal_eaad187e01a56d2ed73b89f3e043c2eda5b6109a5eae7e0c1bd7cdff6836f733 = $this->env->getExtension("native_profiler");
        $__internal_eaad187e01a56d2ed73b89f3e043c2eda5b6109a5eae7e0c1bd7cdff6836f733->enter($__internal_eaad187e01a56d2ed73b89f3e043c2eda5b6109a5eae7e0c1bd7cdff6836f733_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_eaad187e01a56d2ed73b89f3e043c2eda5b6109a5eae7e0c1bd7cdff6836f733->leave($__internal_eaad187e01a56d2ed73b89f3e043c2eda5b6109a5eae7e0c1bd7cdff6836f733_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_f8e3bfad64c857a2edfb592e57bd44aff07f146869c67e8862fe9724584bd766 = $this->env->getExtension("native_profiler");
        $__internal_f8e3bfad64c857a2edfb592e57bd44aff07f146869c67e8862fe9724584bd766->enter($__internal_f8e3bfad64c857a2edfb592e57bd44aff07f146869c67e8862fe9724584bd766_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_post_index";
        
        $__internal_f8e3bfad64c857a2edfb592e57bd44aff07f146869c67e8862fe9724584bd766->leave($__internal_f8e3bfad64c857a2edfb592e57bd44aff07f146869c67e8862fe9724584bd766_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_542aa5dce4d98370c7f1901afb6b3292d5d0b9f5ee28dd81cd71792cdd9e1623 = $this->env->getExtension("native_profiler");
        $__internal_542aa5dce4d98370c7f1901afb6b3292d5d0b9f5ee28dd81cd71792cdd9e1623->enter($__internal_542aa5dce4d98370c7f1901afb6b3292d5d0b9f5ee28dd81cd71792cdd9e1623_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title.post_list"), "html", null, true);
        echo "</h1>

    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th>Title</th>
                <th><i class=\"fa fa-user\"></i> Author</th>
                <th><i class=\"fa fa-calendar\"></i> Published At</th>
                <th><i class=\"fa fa-cogs\"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 19
            echo "            <tr>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorEmail", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            if ($this->getAttribute($context["post"], "publishedAt", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["post"], "publishedAt", array()), "Y-m-d H:i"), "html", null, true);
            }
            echo "</td>
                <td>
                    <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_post_show", array("id" => $this->getAttribute($context["post"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-sm btn-default\">
                        ";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.show"), "html", null, true);
            echo "
                    </a>

                    ";
            // line 28
            if ($this->getAttribute($context["post"], "isAuthor", array(0 => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())), "method")) {
                // line 29
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_post_edit", array("id" => $this->getAttribute($context["post"], "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-sm btn-primary\">
                            <i class=\"fa fa-edit\"></i> ";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.edit"), "html", null, true);
                echo "
                        </a>
                    ";
            }
            // line 33
            echo "                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        </tbody>
    </table>
";
        
        $__internal_542aa5dce4d98370c7f1901afb6b3292d5d0b9f5ee28dd81cd71792cdd9e1623->leave($__internal_542aa5dce4d98370c7f1901afb6b3292d5d0b9f5ee28dd81cd71792cdd9e1623_prof);

    }

    // line 40
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_58694a6f1cc3c40a05f27c053e52d5c63f0f344059f9e1d0bc1b1424111906ba = $this->env->getExtension("native_profiler");
        $__internal_58694a6f1cc3c40a05f27c053e52d5c63f0f344059f9e1d0bc1b1424111906ba->enter($__internal_58694a6f1cc3c40a05f27c053e52d5c63f0f344059f9e1d0bc1b1424111906ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 41
        echo "    <div class=\"section actions\">
        <a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("admin_post_new");
        echo "\" class=\"btn btn-lg btn-block btn-success\">
            <i class=\"fa fa-plus\"></i> ";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.create_post"), "html", null, true);
        echo "
        </a>
    </div>

    ";
        // line 47
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "
";
        
        $__internal_58694a6f1cc3c40a05f27c053e52d5c63f0f344059f9e1d0bc1b1424111906ba->leave($__internal_58694a6f1cc3c40a05f27c053e52d5c63f0f344059f9e1d0bc1b1424111906ba_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 47,  145 => 43,  141 => 42,  138 => 41,  132 => 40,  123 => 36,  115 => 33,  109 => 30,  104 => 29,  102 => 28,  96 => 25,  92 => 24,  85 => 22,  81 => 21,  77 => 20,  74 => 19,  70 => 18,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
