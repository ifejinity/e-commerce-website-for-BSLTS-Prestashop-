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

/* @PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig */
class __TwigTemplate_2d70f795c4e786b8e52b310b684a5642b03ece4d070064ccbde6e78a14dec65b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'order_preferences_gift_options' => [$this, 'block_order_preferences_gift_options'],
            'order_gift_options_preferences_form_rest' => [$this, 'block_order_gift_options_preferences_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig"));

        // line 25
        echo "
";
        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig", 27);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('order_preferences_gift_options', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_order_preferences_gift_options($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_preferences_gift_options"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_preferences_gift_options"));

        // line 30
        echo "<div class=\"col-xl-10\">
    <div class=\"card\">
        <h3 class=\"card-header\">
            <i class=\"material-icons\">cake</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Gift options", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
        </h3>
        <div class=\"card-block row\">
            <div class=\"card-text\">
                <div class=\"form-group row\">
                    ";
        // line 38
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Offer gift wrapping", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Suggest gift-wrapping to customers.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "enable_gift_wrapping", []), 'errors');
        echo "
                      ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "enable_gift_wrapping", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 45
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Gift-wrapping price", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set a price for gift wrapping.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "gift_wrapping_price", []), 'errors');
        echo "
                      ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "gift_wrapping_price", []), 'widget');
        echo "
                    </div>
                </div>

                ";
        // line 52
        if ( !($context["isAtcpShipWrapEnabled"] ?? $this->getContext($context, "isAtcpShipWrapEnabled"))) {
            // line 53
            echo "                    <div class=\"form-group row\">
                        ";
            // line 54
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Gift-wrapping tax", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set a tax for gift wrapping.", [], "Admin.Shopparameters.Help"));
            echo "
                        <div class=\"col-sm\">
                          ";
            // line 56
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "gift_wrapping_tax_rules_group", []), 'errors');
            echo "
                          ";
            // line 57
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "gift_wrapping_tax_rules_group", []), 'widget');
            echo "
                        </div>
                    </div>
                ";
        }
        // line 61
        echo "
                <div class=\"form-group row\">
                    ";
        // line 63
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Offer recycled packaging", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Suggest recycled packaging to customer.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "offer_recyclable_pack", []), 'errors');
        echo "
                      ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), "offer_recyclable_pack", []), 'widget');
        echo "
                    </div>
                </div>

                ";
        // line 70
        $this->displayBlock('order_gift_options_preferences_form_rest', $context, $blocks);
        // line 73
        echo "            </div>
        </div>
        <div class=\"card-footer\">
            <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">";
        // line 77
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

    // line 70
    public function block_order_gift_options_preferences_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_gift_options_preferences_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "order_gift_options_preferences_form_rest"));

        // line 71
        echo "                  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["giftOptionsForm"] ?? $this->getContext($context, "giftOptionsForm")), 'rest');
        echo "
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 71,  174 => 70,  158 => 77,  152 => 73,  150 => 70,  143 => 66,  139 => 65,  134 => 63,  130 => 61,  123 => 57,  119 => 56,  114 => 54,  111 => 53,  109 => 52,  102 => 48,  98 => 47,  93 => 45,  86 => 41,  82 => 40,  77 => 38,  69 => 33,  64 => 30,  46 => 29,  43 => 28,  41 => 27,  38 => 25,);
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

{% block order_preferences_gift_options %}
<div class=\"col-xl-10\">
    <div class=\"card\">
        <h3 class=\"card-header\">
            <i class=\"material-icons\">cake</i> {{ 'Gift options'|trans({}, 'Admin.Shopparameters.Feature') }}
        </h3>
        <div class=\"card-block row\">
            <div class=\"card-text\">
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Offer gift wrapping'|trans), ('Suggest gift-wrapping to customers.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(giftOptionsForm.enable_gift_wrapping) }}
                      {{ form_widget(giftOptionsForm.enable_gift_wrapping) }}
                    </div>
                </div>
                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Gift-wrapping price'|trans), ('Set a price for gift wrapping.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(giftOptionsForm.gift_wrapping_price) }}
                      {{ form_widget(giftOptionsForm.gift_wrapping_price) }}
                    </div>
                </div>

                {% if not isAtcpShipWrapEnabled %}
                    <div class=\"form-group row\">
                        {{ ps.label_with_help(('Gift-wrapping tax'|trans), ('Set a tax for gift wrapping.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                        <div class=\"col-sm\">
                          {{ form_errors(giftOptionsForm.gift_wrapping_tax_rules_group) }}
                          {{ form_widget(giftOptionsForm.gift_wrapping_tax_rules_group) }}
                        </div>
                    </div>
                {% endif %}

                <div class=\"form-group row\">
                    {{ ps.label_with_help(('Offer recycled packaging'|trans), ('Suggest recycled packaging to customer.'|trans({}, 'Admin.Shopparameters.Help'))) }}
                    <div class=\"col-sm\">
                      {{ form_errors(giftOptionsForm.offer_recyclable_pack) }}
                      {{ form_widget(giftOptionsForm.offer_recyclable_pack) }}
                    </div>
                </div>

                {% block order_gift_options_preferences_form_rest %}
                  {{ form_rest(giftOptionsForm) }}
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
", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\OrderPreferences\\Blocks\\order_preferences_gift_options.html.twig");
    }
}
