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

/* @PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_general.html.twig */
class __TwigTemplate_e81c61028f5243cd8703eb429f931f4cd0be4294962d0e0fa7cd92433e8c477b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'order_preferences_general' => [$this, 'block_order_preferences_general'],
            'order_general_preferences_form_rest' => [$this, 'block_order_general_preferences_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_general.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_general.html.twig"));

        // line 25
        echo "
";
        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_general.html.twig", 27);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('order_preferences_general', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_order_preferences_general($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_preferences_general"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_preferences_general"));

        // line 30
        echo "<div class=\"col-xl-10\">
    <div class=\"card\">
        <h3 class=\"card-header\">
            <i class=\"material-icons\">settings</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("General", [], "Admin.Global"), "html", null, true);
        echo "
        </h3>
        <div class=\"card-block row\">
            <div class=\"card-text\">
                <div class=\"form-group row\">
                    ";
        // line 38
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable final summary", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display an overview of the addresses, shipping method and cart just before the order button (required in some European countries).", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "enable_final_summary", []), 'errors');
        echo "
                      ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "enable_final_summary", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 45
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable guest checkout", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allow guest visitors to place an order without registering.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "enable_guest_checkout", []), 'errors');
        echo "
                      ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "enable_guest_checkout", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 52
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable Reordering Option", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable the option to allow customers to reorder in one click from the order history page (required in some European countries).", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "disable_reordering_option", []), 'errors');
        echo "
                      ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "disable_reordering_option", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 59
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Minimum purchase total required in order to validate the order", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set to 0 to disable this feature.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "purchase_minimum_value", []), 'errors');
        echo "
                      ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "purchase_minimum_value", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 66
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Recalculate shipping costs after editing the order", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Automatically updates the shipping costs when you edit an order.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 68
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "recalculate_shipping_cost", []), 'errors');
        echo "
                      ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "recalculate_shipping_cost", []), 'widget');
        echo "
                    </div>
                </div>
                ";
        // line 72
        if (($context["isMultishippingEnabled"] ?? $this->getContext($context, "isMultishippingEnabled"))) {
            // line 73
            echo "                    <div class=\"form-group row\">
                        ";
            // line 74
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allow multishipping", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allow the customer to ship orders to multiple addresses. This option will convert the customer's cart into one or more orders.", [], "Admin.Shopparameters.Help"));
            echo "
                        <div class=\"col-sm\">
                          ";
            // line 76
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "allow_multishipping", []), 'errors');
            echo "
                          ";
            // line 77
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "allow_multishipping", []), 'widget');
            echo "
                        </div>
                    </div>
                ";
        }
        // line 81
        echo "                <div class=\"form-group row\">
                    ";
        // line 82
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delayed shipping", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allows you to delay shipping at your customers' request.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 84
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "allow_delayed_shipping", []), 'errors');
        echo "
                      ";
        // line 85
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "allow_delayed_shipping", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 89
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Terms of service", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Require customers to accept or decline terms of service before processing an order.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 91
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "enable_tos", []), 'errors');
        echo "
                      ";
        // line 92
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "enable_tos", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 96
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Page for the Terms and conditions", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose the page which contains your store's terms and conditions of use.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "tos_cms_id", []), 'errors');
        echo "
                      ";
        // line 99
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generalForm"] ?? $this->getContext($context, "generalForm")), "tos_cms_id", []), 'widget');
        echo "
                    </div>
                </div>

                ";
        // line 103
        $this->displayBlock('order_general_preferences_form_rest', $context, $blocks);
        // line 106
        echo "            </div>
        </div>
        <div class=\"card-footer\">
            <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 103
    public function block_order_general_preferences_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_general_preferences_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_general_preferences_form_rest"));

        // line 104
        echo "                  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["generalForm"] ?? $this->getContext($context, "generalForm")), 'rest');
        echo "
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_general.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 104,  252 => 103,  236 => 110,  230 => 106,  228 => 103,  221 => 99,  217 => 98,  212 => 96,  205 => 92,  201 => 91,  196 => 89,  189 => 85,  185 => 84,  180 => 82,  177 => 81,  170 => 77,  166 => 76,  161 => 74,  158 => 73,  156 => 72,  150 => 69,  146 => 68,  141 => 66,  134 => 62,  130 => 61,  125 => 59,  118 => 55,  114 => 54,  109 => 52,  102 => 48,  98 => 47,  93 => 45,  86 => 41,  82 => 40,  77 => 38,  69 => 33,  64 => 30,  46 => 29,  43 => 28,  41 => 27,  38 => 25,);
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

{% trans_default_domain \"Admin.Shopparameters.Feature\" %}
{% import '@PrestaShop/Admin/macros.html.twig' as ps %}

{% block order_preferences_general %}
<div class=\"col-xl-10\">
    <div class=\"card\">
        <h3 class=\"card-header\">
            <i class=\"material-icons\">settings</i> {{ 'General'|trans({}, 'Admin.Global') }}
        </h3>
        <div class=\"card-block row\">
            <div class=\"card-text\">
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Enable final summary'|trans), ('Display an overview of the addresses, shipping method and cart just before the order button (required in some European countries).'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.enable_final_summary) }}
                      {{ form_widget(generalForm.enable_final_summary) }}
                    </div>
                </div>
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Enable guest checkout'|trans), ('Allow guest visitors to place an order without registering.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.enable_guest_checkout) }}
                      {{ form_widget(generalForm.enable_guest_checkout) }}
                    </div>
                </div>
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Disable Reordering Option'|trans), ('Disable the option to allow customers to reorder in one click from the order history page (required in some European countries).'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.disable_reordering_option) }}
                      {{ form_widget(generalForm.disable_reordering_option) }}
                    </div>
                </div>
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Minimum purchase total required in order to validate the order'|trans), ('Set to 0 to disable this feature.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.purchase_minimum_value) }}
                      {{ form_widget(generalForm.purchase_minimum_value) }}
                    </div>
                </div>
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Recalculate shipping costs after editing the order'|trans), ('Automatically updates the shipping costs when you edit an order.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.recalculate_shipping_cost) }}
                      {{ form_widget(generalForm.recalculate_shipping_cost) }}
                    </div>
                </div>
                {% if isMultishippingEnabled %}
                    <div class=\"form-group row\">
                        {{ ps.label_with_help(('Allow multishipping'|trans), ('Allow the customer to ship orders to multiple addresses. This option will convert the customer\\'s cart into one or more orders.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                        <div class=\"col-sm\">
                          {{ form_errors(generalForm.allow_multishipping) }}
                          {{ form_widget(generalForm.allow_multishipping) }}
                        </div>
                    </div>
                {% endif %}
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Delayed shipping'|trans), ('Allows you to delay shipping at your customers\\' request.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.allow_delayed_shipping) }}
                      {{ form_widget(generalForm.allow_delayed_shipping) }}
                    </div>
                </div>
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Terms of service'|trans), ('Require customers to accept or decline terms of service before processing an order.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.enable_tos) }}
                      {{ form_widget(generalForm.enable_tos) }}
                    </div>
                </div>
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Page for the Terms and conditions'|trans), ('Choose the page which contains your store\\'s terms and conditions of use.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(generalForm.tos_cms_id) }}
                      {{ form_widget(generalForm.tos_cms_id) }}
                    </div>
                </div>

                {% block order_general_preferences_form_rest %}
                  {{ form_rest(generalForm) }}
                {% endblock %}
            </div>
        </div>
        <div class=\"card-footer\">
            <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_general.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\OrderPreferences\\Blocks\\order_preferences_general.html.twig");
    }
}
