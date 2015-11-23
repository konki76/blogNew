<?php

/* security/login.html.twig */
class __TwigTemplate_4643fd178dc827b66aea6b30c0af975185de984db37eeba03956449dd5864767 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'main' => array($this, 'block_main'),
            'sidebar' => array($this, 'block_sidebar'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8e66442e064977348def7c9614c7bad058b3b42a548758b081be1352956663b5 = $this->env->getExtension("native_profiler");
        $__internal_8e66442e064977348def7c9614c7bad058b3b42a548758b081be1352956663b5->enter($__internal_8e66442e064977348def7c9614c7bad058b3b42a548758b081be1352956663b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8e66442e064977348def7c9614c7bad058b3b42a548758b081be1352956663b5->leave($__internal_8e66442e064977348def7c9614c7bad058b3b42a548758b081be1352956663b5_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_c6582224f06097c15b84810f51ec42bb57a077a18f0e585d1692255867ceb04f = $this->env->getExtension("native_profiler");
        $__internal_c6582224f06097c15b84810f51ec42bb57a077a18f0e585d1692255867ceb04f->enter($__internal_c6582224f06097c15b84810f51ec42bb57a077a18f0e585d1692255867ceb04f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "login";
        
        $__internal_c6582224f06097c15b84810f51ec42bb57a077a18f0e585d1692255867ceb04f->leave($__internal_c6582224f06097c15b84810f51ec42bb57a077a18f0e585d1692255867ceb04f_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_577671e2be71f686f4cf35b117ecf06253c547ba305b3f3019ca99627220f143 = $this->env->getExtension("native_profiler");
        $__internal_577671e2be71f686f4cf35b117ecf06253c547ba305b3f3019ca99627220f143->enter($__internal_577671e2be71f686f4cf35b117ecf06253c547ba305b3f3019ca99627220f143_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 7
            echo "        <div class=\"alert alert-danger\">
            ";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array())), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 11
        echo "
    <div class=\"row\">
        <div class=\"col-sm-5\">
            <div class=\"well\">
                <form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
                    <fieldset>
                        <legend><i class=\"fa fa-lock\"></i> Connexion</legend>
                        <div class=\"form-group\">
                            <label for=\"username\">Pseudo</label>
                            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" class=\"form-control\"/>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"password\">Mot de passe:</label>
                            <input type=\"password\" id=\"password\" name=\"_password\" class=\"form-control\" />
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"fa fa-sign-in\"></i> Se connecter
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>

\t\t
\t\t
        <div id=\"login-help\" class=\"col-sm-7\">
            <h3>
                Vous n'êtes pas inscrit ?
            </h3>
\t\t\t<a class=\"btn btn-primary btn-lg\" href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">
                        <i class=\"fa fa-users\"></i> S'enregistrer
            </a>
\t\t\t<h3>
                Vous avez perdu votre mot de passe :
            </h3>
\t\t\t<a class=\"btn btn-primary btn-lg\" href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_request");
        echo "\">
                        <i class=\"fa fa-users\"></i> Récupérer son mot de passe
            </a>
        </div>


\t\t
    </div>
";
        
        $__internal_577671e2be71f686f4cf35b117ecf06253c547ba305b3f3019ca99627220f143->leave($__internal_577671e2be71f686f4cf35b117ecf06253c547ba305b3f3019ca99627220f143_prof);

    }

    // line 55
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_a63fbd76433814bb2116353d8ca8c7acad292d166cb84df42eab2ecaaf1e7d66 = $this->env->getExtension("native_profiler");
        $__internal_a63fbd76433814bb2116353d8ca8c7acad292d166cb84df42eab2ecaaf1e7d66->enter($__internal_a63fbd76433814bb2116353d8ca8c7acad292d166cb84df42eab2ecaaf1e7d66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 56
        echo "
    ";
        // line 57
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

";
        
        $__internal_a63fbd76433814bb2116353d8ca8c7acad292d166cb84df42eab2ecaaf1e7d66->leave($__internal_a63fbd76433814bb2116353d8ca8c7acad292d166cb84df42eab2ecaaf1e7d66_prof);

    }

    // line 61
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_3c165aba19777f42cd49f2897571c918530c8e610e7c660f3abd3dbebb0ad91f = $this->env->getExtension("native_profiler");
        $__internal_3c165aba19777f42cd49f2897571c918530c8e610e7c660f3abd3dbebb0ad91f->enter($__internal_3c165aba19777f42cd49f2897571c918530c8e610e7c660f3abd3dbebb0ad91f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 62
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <!--script>
        \$(document).ready(function() {
            \$('#username').val('anna_admin');
            \$('#password').val('k!tten');
        });
    </script-->
";
        
        $__internal_3c165aba19777f42cd49f2897571c918530c8e610e7c660f3abd3dbebb0ad91f->leave($__internal_3c165aba19777f42cd49f2897571c918530c8e610e7c660f3abd3dbebb0ad91f_prof);

    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 62,  148 => 61,  138 => 57,  135 => 56,  129 => 55,  113 => 46,  104 => 40,  81 => 20,  73 => 15,  67 => 11,  61 => 8,  58 => 7,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
