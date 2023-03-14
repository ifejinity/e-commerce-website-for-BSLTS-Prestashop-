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

/* @PrestaShop/Admin/Sell/Customer/index.html.twig */
class __TwigTemplate_90fcb220848b825a21013ea063a57239a90fc5ee40d5f2c956d47d2e4b7cdda2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 39
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 39);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'employee_helper_card' => [$this, 'block_employee_helper_card'],
            'customers_kpis' => [$this, 'block_customers_kpis'],
            'customers_listing' => [$this, 'block_customers_listing'],
            'customer_required_fields_form' => [$this, 'block_customer_required_fields_form'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/index.html.twig"));

        // line 26
        $context["enableSidebar"] = true;
        // line 27
        $context["layoutTitle"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Manage your Customers", [], "Admin.Orderscustomers.Feature");
        // line 29
        if (($context["isSingleShopContext"] ?? $this->getContext($context, "isSingleShopContext"))) {
            // line 30
            $context["layoutHeaderToolbarBtn"] = ["add" => ["href" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customers_create"), "desc" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new customer", [], "Admin.Orderscustomers.Feature"), "icon" => "add_circle_outline"]];
        }
        // line 39
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 41
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 42
        echo "  ";
        $this->displayBlock('employee_helper_card', $context, $blocks);
        // line 49
        echo "
  ";
        // line 50
        $this->displayBlock('customers_kpis', $context, $blocks);
        // line 64
        echo "
  ";
        // line 65
        $this->displayBlock('customers_listing', $context, $blocks);
        // line 88
        echo "
  ";
        // line 89
        $this->displayBlock('customer_required_fields_form', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 42
    public function block_employee_helper_card($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_helper_card"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_helper_card"));

        // line 43
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 45
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/showcase_card.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 45)->display($context);
        // line 46
        echo "      </div>
    </div>
  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 50
    public function block_customers_kpis($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customers_kpis"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customers_kpis"));

        // line 51
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"card\">
          <div class=\"row\">
            ";
        // line 55
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:renderKpiRow", ["kpiRow" =>         // line 57
($context["customersKpi"] ?? $this->getContext($context, "customersKpi"))]));
        // line 58
        echo "
          </div>
        </div>
      </div>
    </div>
  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 65
    public function block_customers_listing($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customers_listing"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customers_listing"));

        // line 66
        echo "    ";
        if ( !($context["isSingleShopContext"] ?? $this->getContext($context, "isSingleShopContext"))) {
            // line 67
            echo "      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"alert alert-info\" role=\"alert\">
            <p class=\"alert-text\">
              ";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You have to select a shop if you want to create a customer.", [], "Admin.Orderscustomers.Notification"), "html", null, true);
            echo "
            </p>
          </div>
        </div>
      </div>
    ";
        }
        // line 77
        echo "
    <div class=\"row\">
      <div class=\"col-12\">
        ";
        // line 80
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/index.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 80, "486291209")->display(twig_array_merge($context, ["grid" => ($context["customerGrid"] ?? $this->getContext($context, "customerGrid"))]));
        // line 85
        echo "      </div>
    </div>
  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 89
    public function block_customer_required_fields_form($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customer_required_fields_form"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customer_required_fields_form"));

        // line 90
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        <p>
          <button class=\"btn btn-primary\"
                  type=\"button\"
                  data-toggle=\"collapse\"
                  data-target=\"#customerRequiredFieldsContainer\"
                  aria-expanded=\"false\"
                  aria-controls=\"customerRequiredFieldsContainer\"
          >
            <i class=\"material-icons\">add_circle</i>
            ";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set required fields for this section", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
          </button>
        </p>
      </div>

      <div class=\"col-md-12\">
        ";
        // line 107
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/Index/required_fields.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 107)->display($context);
        // line 108
        echo "      </div>
    </div>
  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 113
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 114
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  ";
        // line 116
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/javascript.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 116)->display($context);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  267 => 116,  261 => 114,  252 => 113,  240 => 108,  238 => 107,  229 => 101,  216 => 90,  207 => 89,  195 => 85,  193 => 80,  188 => 77,  179 => 71,  173 => 67,  170 => 66,  161 => 65,  146 => 58,  144 => 57,  143 => 55,  137 => 51,  128 => 50,  116 => 46,  114 => 45,  110 => 43,  101 => 42,  91 => 89,  88 => 88,  86 => 65,  83 => 64,  81 => 50,  78 => 49,  75 => 42,  66 => 41,  56 => 39,  53 => 30,  51 => 29,  49 => 27,  47 => 26,  22 => 39,);
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

{% set enableSidebar = true %}
{% set layoutTitle = 'Manage your Customers'|trans({}, 'Admin.Orderscustomers.Feature') %}

{% if isSingleShopContext %}
  {% set layoutHeaderToolbarBtn = {
    'add': {
      'href': path('admin_customers_create'),
      'desc': 'Add new customer'|trans({}, 'Admin.Orderscustomers.Feature'),
      'icon': 'add_circle_outline'
    }
  } %}
{% endif %}

{% extends 'PrestaShopBundle:Admin:layout.html.twig' %}

{% block content %}
  {% block employee_helper_card %}
    <div class=\"row\">
      <div class=\"col\">
        {% include '@PrestaShop/Admin/Sell/Customer/Blocks/showcase_card.html.twig' %}
      </div>
    </div>
  {% endblock %}

  {% block customers_kpis %}
    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"card\">
          <div class=\"row\">
            {{ render(controller(
              'PrestaShopBundle:Admin\\\\Common:renderKpiRow',
              { 'kpiRow': customersKpi }
            )) }}
          </div>
        </div>
      </div>
    </div>
  {% endblock %}

  {% block customers_listing %}
    {% if not isSingleShopContext %}
      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"alert alert-info\" role=\"alert\">
            <p class=\"alert-text\">
              {{ 'You have to select a shop if you want to create a customer.'|trans({}, 'Admin.Orderscustomers.Notification') }}
            </p>
          </div>
        </div>
      </div>
    {% endif %}

    <div class=\"row\">
      <div class=\"col-12\">
        {% embed '@PrestaShop/Admin/Common/Grid/grid_panel.html.twig' with {'grid': customerGrid} %}
          {% block grid_panel_extra_content %}
            {% include '@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig' %}
          {% endblock %}
        {% endembed %}
      </div>
    </div>
  {% endblock %}

  {% block customer_required_fields_form %}
    <div class=\"row\">
      <div class=\"col-md-12\">
        <p>
          <button class=\"btn btn-primary\"
                  type=\"button\"
                  data-toggle=\"collapse\"
                  data-target=\"#customerRequiredFieldsContainer\"
                  aria-expanded=\"false\"
                  aria-controls=\"customerRequiredFieldsContainer\"
          >
            <i class=\"material-icons\">add_circle</i>
            {{ 'Set required fields for this section'|trans({}, 'Admin.Orderscustomers.Feature') }}
          </button>
        </p>
      </div>

      <div class=\"col-md-12\">
        {% include '@PrestaShop/Admin/Sell/Customer/Blocks/Index/required_fields.html.twig' %}
      </div>
    </div>
  {% endblock %}
{% endblock %}

{% block javascripts %}
  {{ parent() }}

  {% include '@PrestaShop/Admin/Sell/Customer/Blocks/javascript.html.twig' %}
{% endblock %}

", "@PrestaShop/Admin/Sell/Customer/index.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Customer\\index.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Customer/index.html.twig */
class __TwigTemplate_90fcb220848b825a21013ea063a57239a90fc5ee40d5f2c956d47d2e4b7cdda2___486291209 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 80
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 80);
        $this->blocks = [
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 81
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "grid_panel_extra_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "grid_panel_extra_content"));

        // line 82
        echo "            ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 82)->display($context);
        // line 83
        echo "          ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  473 => 83,  470 => 82,  461 => 81,  432 => 80,  267 => 116,  261 => 114,  252 => 113,  240 => 108,  238 => 107,  229 => 101,  216 => 90,  207 => 89,  195 => 85,  193 => 80,  188 => 77,  179 => 71,  173 => 67,  170 => 66,  161 => 65,  146 => 58,  144 => 57,  143 => 55,  137 => 51,  128 => 50,  116 => 46,  114 => 45,  110 => 43,  101 => 42,  91 => 89,  88 => 88,  86 => 65,  83 => 64,  81 => 50,  78 => 49,  75 => 42,  66 => 41,  56 => 39,  53 => 30,  51 => 29,  49 => 27,  47 => 26,  22 => 39,);
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

{% set enableSidebar = true %}
{% set layoutTitle = 'Manage your Customers'|trans({}, 'Admin.Orderscustomers.Feature') %}

{% if isSingleShopContext %}
  {% set layoutHeaderToolbarBtn = {
    'add': {
      'href': path('admin_customers_create'),
      'desc': 'Add new customer'|trans({}, 'Admin.Orderscustomers.Feature'),
      'icon': 'add_circle_outline'
    }
  } %}
{% endif %}

{% extends 'PrestaShopBundle:Admin:layout.html.twig' %}

{% block content %}
  {% block employee_helper_card %}
    <div class=\"row\">
      <div class=\"col\">
        {% include '@PrestaShop/Admin/Sell/Customer/Blocks/showcase_card.html.twig' %}
      </div>
    </div>
  {% endblock %}

  {% block customers_kpis %}
    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"card\">
          <div class=\"row\">
            {{ render(controller(
              'PrestaShopBundle:Admin\\\\Common:renderKpiRow',
              { 'kpiRow': customersKpi }
            )) }}
          </div>
        </div>
      </div>
    </div>
  {% endblock %}

  {% block customers_listing %}
    {% if not isSingleShopContext %}
      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"alert alert-info\" role=\"alert\">
            <p class=\"alert-text\">
              {{ 'You have to select a shop if you want to create a customer.'|trans({}, 'Admin.Orderscustomers.Notification') }}
            </p>
          </div>
        </div>
      </div>
    {% endif %}

    <div class=\"row\">
      <div class=\"col-12\">
        {% embed '@PrestaShop/Admin/Common/Grid/grid_panel.html.twig' with {'grid': customerGrid} %}
          {% block grid_panel_extra_content %}
            {% include '@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig' %}
          {% endblock %}
        {% endembed %}
      </div>
    </div>
  {% endblock %}

  {% block customer_required_fields_form %}
    <div class=\"row\">
      <div class=\"col-md-12\">
        <p>
          <button class=\"btn btn-primary\"
                  type=\"button\"
                  data-toggle=\"collapse\"
                  data-target=\"#customerRequiredFieldsContainer\"
                  aria-expanded=\"false\"
                  aria-controls=\"customerRequiredFieldsContainer\"
          >
            <i class=\"material-icons\">add_circle</i>
            {{ 'Set required fields for this section'|trans({}, 'Admin.Orderscustomers.Feature') }}
          </button>
        </p>
      </div>

      <div class=\"col-md-12\">
        {% include '@PrestaShop/Admin/Sell/Customer/Blocks/Index/required_fields.html.twig' %}
      </div>
    </div>
  {% endblock %}
{% endblock %}

{% block javascripts %}
  {{ parent() }}

  {% include '@PrestaShop/Admin/Sell/Customer/Blocks/javascript.html.twig' %}
{% endblock %}

", "@PrestaShop/Admin/Sell/Customer/index.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Customer\\index.html.twig");
    }
}
