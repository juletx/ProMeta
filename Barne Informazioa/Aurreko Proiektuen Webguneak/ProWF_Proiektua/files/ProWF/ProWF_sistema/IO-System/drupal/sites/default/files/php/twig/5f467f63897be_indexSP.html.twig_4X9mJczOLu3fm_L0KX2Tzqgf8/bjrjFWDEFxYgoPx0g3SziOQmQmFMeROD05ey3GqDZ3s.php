<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/select_project/templates/indexSP.html.twig */
class __TwigTemplate_bcac169f36f3a9675cfeb2e3784eb1c33cd0b7fd6bff0e08c8be9e4f255fb68b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 1, "set" => 3, "for" => 4];
        $filters = ["split" => 5, "escape" => 10];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['split', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if (($context["projects"] ?? null)) {
            // line 2
            echo "\t<div class=\"ex1\">
\t";
            // line 3
            $context["cont"] = 0;
            // line 4
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["projects"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 5
                echo "\t\t";
                $context["result"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($context["project"]), ";");
                // line 6
                echo "\t\t";
                if ((($context["cont"] ?? null) == 0)) {
                    // line 7
                    echo "\t\t
\t\t\t<div class=\"left\">
\t\t\t\t";
                    // line 9
                    if ((($context["goTo"] ?? null) == "OT")) {
                        // line 10
                        echo "\t\t\t\t\t<a href=\"http:\\\\localhost\\drupal\\outstanding_tasks?project=";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                        echo "\">
\t\t\t\t\t\t<img src=\"http:\\\\localhost\\drupal\\images\\project_image.png\" alt=\"PROJECT IMAGE\" width=\"90\" height=\"150\">
\t\t\t\t\t</a><br>
\t\t\t\t";
                    } else {
                        // line 14
                        echo "\t\t\t\t\t<a href=\"http:\\\\localhost\\drupal\\workflow_execution?project=";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                        echo "\">
\t\t\t\t\t\t<img src=\"http:\\\\localhost\\drupal\\images\\project_image.png\" alt=\"PROJECT IMAGE\" width=\"90\" height=\"150\">
\t\t\t\t\t</a><br>
\t\t\t\t";
                    }
                    // line 18
                    echo "\t\t\t\t<b>";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                    echo "</b> <br>
\t\t\t\tStart date: ";
                    // line 19
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 1, [], "array")), "html", null, true);
                    echo " <br>
\t\t\t\tVersion: ";
                    // line 20
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 2, [], "array")), "html", null, true);
                    echo " <br>
\t\t\t</div>
\t\t\t
\t\t\t";
                    // line 23
                    $context["cont"] = 1;
                    // line 24
                    echo "\t\t";
                } elseif ((($context["cont"] ?? null) == 1)) {
                    // line 25
                    echo "\t\t\t
\t\t\t<div class=\"center\">
\t\t\t\t";
                    // line 27
                    if ((($context["goTo"] ?? null) == "OT")) {
                        // line 28
                        echo "\t\t\t\t\t<a href=\"http:\\\\localhost\\drupal\\outstanding_tasks?project=";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                        echo "\">
\t\t\t\t\t\t<img src=\"http:\\\\localhost\\drupal\\images\\project_image.png\" alt=\"PROJECT IMAGE\" width=\"90\" height=\"150\">
\t\t\t\t\t</a><br>
\t\t\t\t";
                    } else {
                        // line 32
                        echo "\t\t\t\t\t<a href=\"http:\\\\localhost\\drupal\\workflow_execution?project=";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                        echo "\">
\t\t\t\t\t\t<img src=\"http:\\\\localhost\\drupal\\images\\project_image.png\" alt=\"PROJECT IMAGE\" width=\"90\" height=\"150\">
\t\t\t\t\t</a><br>
\t\t\t\t";
                    }
                    // line 36
                    echo "\t\t\t\t<b>";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                    echo "</b> <br>
\t\t\t\tStart date: ";
                    // line 37
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 1, [], "array")), "html", null, true);
                    echo " <br>
\t\t\t\tVersion: ";
                    // line 38
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 2, [], "array")), "html", null, true);
                    echo " <br>
\t\t\t</div>
\t\t\t
\t\t\t";
                    // line 41
                    $context["cont"] = 2;
                    // line 42
                    echo "\t\t";
                } else {
                    // line 43
                    echo "\t\t\t
\t\t\t<div class=\"right\">
\t\t\t\t";
                    // line 45
                    if ((($context["goTo"] ?? null) == "OT")) {
                        // line 46
                        echo "\t\t\t\t\t<a href=\"http:\\\\localhost\\drupal\\outstanding_tasks?project=";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                        echo "\">
\t\t\t\t\t\t<img src=\"http:\\\\localhost\\drupal\\images\\project_image.png\" alt=\"PROJECT IMAGE\" width=\"90\" height=\"150\">
\t\t\t\t\t</a><br>
\t\t\t\t";
                    } else {
                        // line 50
                        echo "\t\t\t\t\t<a href=\"http:\\\\localhost\\drupal\\workflow_execution?project=";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                        echo "\">
\t\t\t\t\t\t<img src=\"http:\\\\localhost\\drupal\\images\\project_image.png\" alt=\"PROJECT IMAGE\" width=\"90\" height=\"150\">
\t\t\t\t\t</a><br>
\t\t\t\t";
                    }
                    // line 54
                    echo "\t\t\t\t<b>";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 0, [], "array")), "html", null, true);
                    echo "</b> <br>
\t\t\t\tStart date: ";
                    // line 55
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 1, [], "array")), "html", null, true);
                    echo " <br>
\t\t\t\tVersion: ";
                    // line 56
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["result"] ?? null), 2, [], "array")), "html", null, true);
                    echo " <br>
\t\t\t</div>
\t\t\t<br><br>
\t\t\t
\t\t\t";
                    // line 60
                    $context["cont"] = 0;
                    // line 61
                    echo "\t\t";
                }
                // line 62
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "\t</div>
";
        } else {
            // line 65
            echo "
<p><b>No projects associated with your username</b></p>

";
        }
        // line 69
        echo "

";
    }

    public function getTemplateName()
    {
        return "modules/custom/select_project/templates/indexSP.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 69,  210 => 65,  206 => 63,  200 => 62,  197 => 61,  195 => 60,  188 => 56,  184 => 55,  179 => 54,  171 => 50,  163 => 46,  161 => 45,  157 => 43,  154 => 42,  152 => 41,  146 => 38,  142 => 37,  137 => 36,  129 => 32,  121 => 28,  119 => 27,  115 => 25,  112 => 24,  110 => 23,  104 => 20,  100 => 19,  95 => 18,  87 => 14,  79 => 10,  77 => 9,  73 => 7,  70 => 6,  67 => 5,  62 => 4,  60 => 3,  57 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/select_project/templates/indexSP.html.twig", "C:\\xampp\\htdocs\\drupal\\modules\\custom\\select_project\\templates\\indexSP.html.twig");
    }
}
