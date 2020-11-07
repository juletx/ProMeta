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

/* modules/custom/workflow_execution/templates/indexWE.html.twig */
class __TwigTemplate_2c7b6b5108745cb984560bf331b37622d1822be53ee3c3015a4437fd783d6730 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 1, "if" => 3, "for" => 36];
        $filters = ["split" => 1, "escape" => 2];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
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
        $context["aux"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["method"] ?? null)), ";");
        // line 2
        echo "<h2>";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 0, [], "array")), "html", null, true);
        echo " v";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 1, [], "array")), "html", null, true);
        echo " - Project: ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["project"] ?? null)), "html", null, true);
        echo "</h2>
";
        // line 3
        if ((($context["func"] ?? null) == "initiate")) {
            // line 4
            echo "\t<center>
\t\t<button onclick=\"location.href = 'http://localhost/drupal/workflow_execution?project=";
            // line 5
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["project"] ?? null)), "html", null, true);
            echo "&next=yes';\">Initiate Lifecycle</button>
\t</center>
";
        } elseif ((        // line 7
($context["func"] ?? null) == "execute")) {
            // line 8
            echo "\t";
            $context["aux"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["current_task"] ?? null)), ";");
            // line 9
            echo "\t<h2>Current task</h2>
\t<table>
\t  <tr>
\t\t<th>Phase</th>
\t\t<th>Activity</th>
\t\t<th>Task</th>
\t\t<th>Role</th>
\t  </tr>
\t  <tr>
\t\t<td>";
            // line 18
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 0, [], "array")), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 19
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 1, [], "array")), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 20
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 2, [], "array")), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 21
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 3, [], "array")), "html", null, true);
            echo "</td>
\t  </tr>
\t</table>

\t<h2>Completed artifacts of the current task</h2>
\t";
            // line 26
            if (($context["project_artifacts"] ?? null)) {
                // line 27
                echo "\t\t<table>
\t\t  <tr>
\t\t\t<th>Artifact</th>
\t\t\t<th>Start date</th>
\t\t\t<th>Version</th>
\t\t\t<th>Hours worked</th>
\t\t\t<th>Editor's assessment</th>
\t\t\t<th>Qulity Manager's assessment</th>
\t\t  </tr>
\t\t  ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["project_artifacts"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["artifact"]) {
                    // line 37
                    echo "\t\t\t";
                    $context["aux"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($context["artifact"]), ";");
                    // line 38
                    echo "\t\t\t  <tr>
\t\t\t\t<td>";
                    // line 39
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 0, [], "array")), "html", null, true);
                    echo "</td>
\t\t\t\t<td>";
                    // line 40
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 2, [], "array")), "html", null, true);
                    echo "</td>
\t\t\t\t<td>";
                    // line 41
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 1, [], "array")), "html", null, true);
                    echo "</td>
\t\t\t\t<td>";
                    // line 42
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 3, [], "array")), "html", null, true);
                    echo "</td>
\t\t\t\t<td>";
                    // line 43
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 4, [], "array")), "html", null, true);
                    echo "</td>
\t\t\t\t<td>";
                    // line 44
                    if ($this->getAttribute(($context["aux"] ?? null), 5, [], "array")) {
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["aux"] ?? null), 5, [], "array")), "html", null, true);
                    } else {
                        echo "Not assessed";
                    }
                    echo "</td>
\t\t\t  </tr>
\t\t ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['artifact'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 47
                echo "\t\t</table>
\t";
            } else {
                // line 49
                echo "\t\t<p>No artifact has been completed yet</p>
\t";
            }
            // line 51
            echo "\t<br>
\t<center>
\t\t<button onclick=\"location.href = 'http://localhost/drupal/workflow_execution?project=";
            // line 53
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["project"] ?? null)), "html", null, true);
            echo "&next=yes';\">Go to the next task</button>
\t</center>
";
        } else {
            // line 56
            echo "<br>
<p>Project finished</p>

";
        }
        // line 60
        echo "








";
    }

    public function getTemplateName()
    {
        return "modules/custom/workflow_execution/templates/indexWE.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 60,  186 => 56,  180 => 53,  176 => 51,  172 => 49,  168 => 47,  155 => 44,  151 => 43,  147 => 42,  143 => 41,  139 => 40,  135 => 39,  132 => 38,  129 => 37,  125 => 36,  114 => 27,  112 => 26,  104 => 21,  100 => 20,  96 => 19,  92 => 18,  81 => 9,  78 => 8,  76 => 7,  71 => 5,  68 => 4,  66 => 3,  57 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/workflow_execution/templates/indexWE.html.twig", "C:\\xampp\\htdocs\\drupal\\modules\\custom\\workflow_execution\\templates\\indexWE.html.twig");
    }
}
