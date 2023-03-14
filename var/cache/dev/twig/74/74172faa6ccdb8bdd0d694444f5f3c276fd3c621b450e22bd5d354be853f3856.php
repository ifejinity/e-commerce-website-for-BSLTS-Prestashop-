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

/* @PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/Blocks/db_tables_panel.html.twig */
class __TwigTemplate_1b9e3487fb382b90c9cc2dd5e58f452313667689d3c15c0cdb008b2c77d15626 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/Blocks/db_tables_panel.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/Blocks/db_tables_panel.html.twig"));

        // line 25
        echo "
";
        // line 27
        echo "
<div class=\"row\">
  <div class=\"col-12 col-md-4\">
    <div class=\"card\">
      <h3 class=\"card-header\">
          ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("List of MySQL Tables", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block\">
        <div class=\"form-group\">
          <select class=\"form-control js-db-tables-select\"
                  title=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("List of MySQL Tables", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "\"
                  size=\"10\"
          >
            ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dbTableNames"] ?? $this->getContext($context, "dbTableNames")));
        foreach ($context['_seq'] as $context["_key"] => $context["tableName"]) {
            // line 41
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, $context["tableName"], "html", null, true);
            echo "\"
                      data-table-columns-url=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_sql_requests_table_columns", ["mySqlTableName" => $context["tableName"]]), "html", null, true);
            echo "\"
              >
                ";
            // line 44
            echo twig_escape_filter($this->env, $context["tableName"], "html", null, true);
            echo "
              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tableName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "          </select>
        </div>

        <button type=\"button\"
                class=\"btn btn-sm btn-outline-secondary js-add-db-table-to-query-btn\"
                data-choose-table-message=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Please choose a table.", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "\"
        >
          <i class=\"material-icons\">add_circle</i> ";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add table name to SQL query", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
        </button>
      </div>
    </div>
  </div>
  <div class=\"col-12 col-md-8\">
    <div class=\"card\">
      <h3 class=\"card-header\">
          ";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("List of attributes for this MySQL table", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block\">
        <table class=\"table js-table-columns d-none\" data-action-btn=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add attribute to SQL query", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "\">
          <thead>
            <tr>
              <th>";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Attribute", [], "Admin.Global"), "html", null, true);
        echo "</th>
              <th>";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Type", [], "Admin.Global"), "html", null, true);
        echo "</th>
              <th class=\"text-center\">";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Action", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <div class=\"alert alert-warning js-table-alert\" role=\"alert\">
          <p class=\"alert-text\">";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Please choose a MySQL table", [], "Admin.Advparameters.Notification"), "html", null, true);
        echo "</p>
        </div>
      </div>
    </div>
  </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/Blocks/db_tables_panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 77,  126 => 70,  122 => 69,  118 => 68,  112 => 65,  106 => 62,  95 => 54,  90 => 52,  83 => 47,  74 => 44,  69 => 42,  64 => 41,  60 => 40,  54 => 37,  46 => 32,  39 => 27,  36 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#**
 * 2007-2019 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *#}

{% trans_default_domain \"Admin.Advparameters.Feature\" %}

<div class=\"row\">
  <div class=\"col-12 col-md-4\">
    <div class=\"card\">
      <h3 class=\"card-header\">
          {{ 'List of MySQL Tables'|trans }}
      </h3>
      <div class=\"card-block\">
        <div class=\"form-group\">
          <select class=\"form-control js-db-tables-select\"
                  title=\"{{ 'List of MySQL Tables'|trans }}\"
                  size=\"10\"
          >
            {% for tableName in dbTableNames %}
              <option value=\"{{ tableName }}\"
                      data-table-columns-url=\"{{ path('admin_sql_requests_table_columns', {'mySqlTableName': tableName}) }}\"
              >
                {{ tableName }}
              </option>
            {% endfor %}
          </select>
        </div>

        <button type=\"button\"
                class=\"btn btn-sm btn-outline-secondary js-add-db-table-to-query-btn\"
                data-choose-table-message=\"{{ 'Please choose a table.'|trans }}\"
        >
          <i class=\"material-icons\">add_circle</i> {{ 'Add table name to SQL query'|trans }}
        </button>
      </div>
    </div>
  </div>
  <div class=\"col-12 col-md-8\">
    <div class=\"card\">
      <h3 class=\"card-header\">
          {{ 'List of attributes for this MySQL table'|trans }}
      </h3>
      <div class=\"card-block\">
        <table class=\"table js-table-columns d-none\" data-action-btn=\"{{ 'Add attribute to SQL query'|trans }}\">
          <thead>
            <tr>
              <th>{{ 'Attribute'|trans({}, 'Admin.Global') }}</th>
              <th>{{ 'Type'|trans({}, 'Admin.Global') }}</th>
              <th class=\"text-center\">{{ 'Action'|trans }}</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <div class=\"alert alert-warning js-table-alert\" role=\"alert\">
          <p class=\"alert-text\">{{ 'Please choose a MySQL table'|trans({}, 'Admin.Advparameters.Notification') }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
", "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/Blocks/db_tables_panel.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\AdvancedParameters\\RequestSql\\Blocks\\db_tables_panel.html.twig");
    }
}
