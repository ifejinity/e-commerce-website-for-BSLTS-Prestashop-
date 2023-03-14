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

/* @PrestaShop/Admin/Improve/International/Tax/Blocks/tax_options.html.twig */
class __TwigTemplate_a88e8a27fb3b81916f5d85f400b725b66302f607788fedafbdbf921949e8509d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'tax_options_rest' => [$this, 'block_tax_options_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/International/Tax/Blocks/tax_options.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/International/Tax/Blocks/tax_options.html.twig"));

        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/International/Tax/Blocks/tax_options.html.twig", 26);
        // line 27
        echo "
";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_taxes_save_options")]);
        echo "
<div class=\"card\">
  <h3 class=\"card-header\">
    ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax options", [], "Admin.International.Feature"), "html", null, true);
        echo "
  </h3>
  <div class=\"card-block row\">
    <div class=\"card-text\">
      <div class=\"form-group row\">
        <label class=\"form-control-label\" for=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "enable_tax", []), "vars", []), "id", []), "html", null, true);
        echo "\">
          ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable tax", [], "Admin.International.Feature"), "html", null, true);
        echo "
        </label>
        <div class=\"col-sm\">
          ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "enable_tax", []), 'widget', ["attr" => ["class" => "js-enable-tax"]]);
        echo "
            <small class=\"form-text\">
              ";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select whether or not to include tax on purchases.", [], "Admin.International.Help"), "html", null, true);
        echo "
            </small>
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"form-control-label\" for=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "display_tax_in_cart", []), "vars", []), "id", []), "html", null, true);
        echo "\">
          ";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display tax in the shopping cart", [], "Admin.International.Feature"), "html", null, true);
        echo "
        </label>
        <div class=\"col-sm\">
          ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "display_tax_in_cart", []), 'widget', ["attr" => ["class" => "js-display-in-cart"]]);
        echo "
          <small class=\"form-text\">
            ";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select whether or not to display tax on a distinct line in the cart.", [], "Admin.International.Help"), "html", null, true);
        echo "
          </small>
        </div>
      </div>
      <div class=\"form-group row\">
        <label for=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "tax_address_type", []), "vars", []), "id", []), "html", null, true);
        echo "\" class=\"form-control-label\">
          ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Based on", [], "Admin.International.Feature"), "html", null, true);
        echo "
        </label>
        <div class=\"col-sm\">
          ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "tax_address_type", []), 'widget');
        echo "
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"form-control-label\" for=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "use_eco_tax", []), "vars", []), "id", []), "html", null, true);
        echo "\">
          ";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Use ecotax", [], "Admin.International.Feature"), "html", null, true);
        echo "
        </label>
        <div class=\"col-sm\">
          ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "use_eco_tax", []), 'widget');
        echo "
          ";
        // line 71
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "use_eco_tax", []), "vars", []), "value", []) != 0)) {
            // line 72
            echo "            <small class=\"form-text\">
              ";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you disable the ecotax, the ecotax for all your products will be set to 0.", [], "Admin.International.Help"), "html", null, true);
            echo "
            </small>
          ";
        }
        // line 76
        echo "        </div>
      </div>
      ";
        // line 78
        if ($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? null), "options", [], "any", false, true), "eco_tax_rule_group", [], "any", true, true)) {
            // line 79
            echo "        ";
            echo $context["ps"]->getform_group_row($this->getAttribute($this->getAttribute(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), "options", []), "eco_tax_rule_group", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Ecotax", [], "Admin.International.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Define the ecotax (e.g. French ecotax: 19.6%).", [], "Admin.International.Help")]);
            // line 82
            echo "
      ";
        }
        // line 84
        echo "
      ";
        // line 85
        $this->displayBlock('tax_options_rest', $context, $blocks);
        // line 88
        echo "    </div>
  </div>
  <div class=\"card-footer\">
    <div class=\"d-flex justify-content-end\">
      <button class=\"btn btn-primary\">
        ";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>
    </div>
  </div>
</div>
";
        // line 98
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), 'form_end');
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 85
    public function block_tax_options_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "tax_options_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "tax_options_rest"));

        // line 86
        echo "        ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["taxOptionsForm"] ?? $this->getContext($context, "taxOptionsForm")), 'rest');
        echo "
      ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Tax/Blocks/tax_options.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 86,  192 => 85,  180 => 98,  172 => 93,  165 => 88,  163 => 85,  160 => 84,  156 => 82,  153 => 79,  151 => 78,  147 => 76,  141 => 73,  138 => 72,  136 => 71,  132 => 70,  126 => 67,  122 => 66,  115 => 62,  109 => 59,  105 => 58,  97 => 53,  92 => 51,  86 => 48,  82 => 47,  74 => 42,  69 => 40,  63 => 37,  59 => 36,  51 => 31,  45 => 28,  42 => 27,  40 => 26,  37 => 25,);
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

{% import '@PrestaShop/Admin/macros.html.twig' as ps %}

{{ form_start(taxOptionsForm, {'action': path('admin_taxes_save_options')}) }}
<div class=\"card\">
  <h3 class=\"card-header\">
    {{ 'Tax options'|trans({}, 'Admin.International.Feature') }}
  </h3>
  <div class=\"card-block row\">
    <div class=\"card-text\">
      <div class=\"form-group row\">
        <label class=\"form-control-label\" for=\"{{ taxOptionsForm.options.enable_tax.vars.id }}\">
          {{ 'Enable tax'|trans({}, 'Admin.International.Feature') }}
        </label>
        <div class=\"col-sm\">
          {{ form_widget(taxOptionsForm.options.enable_tax, {'attr': {'class': 'js-enable-tax'}}) }}
            <small class=\"form-text\">
              {{ 'Select whether or not to include tax on purchases.'|trans({}, 'Admin.International.Help') }}
            </small>
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"form-control-label\" for=\"{{ taxOptionsForm.options.display_tax_in_cart.vars.id }}\">
          {{ 'Display tax in the shopping cart'|trans({}, 'Admin.International.Feature') }}
        </label>
        <div class=\"col-sm\">
          {{ form_widget(taxOptionsForm.options.display_tax_in_cart, {'attr': {'class': 'js-display-in-cart'}}) }}
          <small class=\"form-text\">
            {{ 'Select whether or not to display tax on a distinct line in the cart.'|trans({}, 'Admin.International.Help') }}
          </small>
        </div>
      </div>
      <div class=\"form-group row\">
        <label for=\"{{ taxOptionsForm.options.tax_address_type.vars.id }}\" class=\"form-control-label\">
          {{ 'Based on'|trans({}, 'Admin.International.Feature') }}
        </label>
        <div class=\"col-sm\">
          {{ form_widget(taxOptionsForm.options.tax_address_type) }}
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"form-control-label\" for=\"{{ taxOptionsForm.options.use_eco_tax.vars.id }}\">
          {{ 'Use ecotax'|trans({}, 'Admin.International.Feature') }}
        </label>
        <div class=\"col-sm\">
          {{ form_widget(taxOptionsForm.options.use_eco_tax) }}
          {% if (taxOptionsForm.options.use_eco_tax.vars.value != 0) %}
            <small class=\"form-text\">
              {{ 'If you disable the ecotax, the ecotax for all your products will be set to 0.'|trans({}, 'Admin.International.Help') }}
            </small>
          {% endif %}
        </div>
      </div>
      {% if taxOptionsForm.options.eco_tax_rule_group is defined %}
        {{ ps.form_group_row(taxOptionsForm.options.eco_tax_rule_group, {}, {
          label: 'Ecotax'|trans({}, 'Admin.International.Feature'),
          help: 'Define the ecotax (e.g. French ecotax: 19.6%).'|trans({}, 'Admin.International.Help')
        }) }}
      {% endif %}

      {% block tax_options_rest %}
        {{ form_rest(taxOptionsForm) }}
      {% endblock %}
    </div>
  </div>
  <div class=\"card-footer\">
    <div class=\"d-flex justify-content-end\">
      <button class=\"btn btn-primary\">
        {{ 'Save'|trans({}, 'Admin.Actions') }}
      </button>
    </div>
  </div>
</div>
{{ form_end(taxOptionsForm) }}
", "@PrestaShop/Admin/Improve/International/Tax/Blocks/tax_options.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\International\\Tax\\Blocks\\tax_options.html.twig");
    }
}
