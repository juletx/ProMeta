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

/* modules/custom/project_info/templates/index2.html.twig */
class __TwigTemplate_bbd2617b146c5ba7f03b8fbaf5476504fda382a4bdbd8f240bf0c972917fb3af extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 12];
        $filters = ["escape" => 2];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
        echo "
<h1>";
        // line 2
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null)), "html", null, true);
        echo "</h1>

</br>

<textarea rows=\"2\" cols=\"140\" readonly>
";
        // line 7
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null)), "html", null, true);
        echo "
</textarea>

</br></br>

<p>Start date: ";
        // line 12
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["start_date"] ?? null)), "html", null, true);
        echo " | End date: ";
        if (($context["end_date"] ?? null)) {
            echo " ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["end_date"] ?? null)), "html", null, true);
            echo " ";
        } else {
            echo " undefined ";
        }
        echo "</p>


<p>Version: ";
        // line 15
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["version"] ?? null)), "html", null, true);
        echo "</p>


<table id=\"teamtable\">
  <tr>
    <th>Role</th>
    <th>Name</th>
  </tr>
  <tr>
    <td>Project Manager</td>
    <td>";
        // line 25
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["project_manager"] ?? null)), "html", null, true);
        echo "</td>
  </tr>
  <tr>
    <td>Analyst</td>
    <td>";
        // line 29
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["analyst"] ?? null)), "html", null, true);
        echo "</td>
  </tr>
  <tr>
    <td>Process Creator</td>
    <td>";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["process_creator"] ?? null)), "html", null, true);
        echo "</td>
  </tr>
  <tr>
    <td>Architect</td>
    <td>";
        // line 37
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["architect"] ?? null)), "html", null, true);
        echo " </td>
  </tr>
  <tr>
    <td>Developer</td>
    <td>";
        // line 41
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["developer"] ?? null)), "html", null, true);
        echo "</td>
  </tr>
  <tr>
    <td>Tester</td>
    <td>";
        // line 45
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tester"] ?? null)), "html", null, true);
        echo "</td>
  </tr>
  <tr>
    <td>Stakeholder</td>
    <td>";
        // line 49
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["stakeholder"] ?? null)), "html", null, true);
        echo "</td>
  </tr>
</table>




";
    }

    public function getTemplateName()
    {
        return "modules/custom/project_info/templates/index2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 49,  136 => 45,  129 => 41,  122 => 37,  115 => 33,  108 => 29,  101 => 25,  88 => 15,  74 => 12,  66 => 7,  58 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/project_info/templates/index2.html.twig", "C:\\xampp\\htdocs\\drupal\\modules\\custom\\project_info\\templates\\index2.html.twig");
    }
}
