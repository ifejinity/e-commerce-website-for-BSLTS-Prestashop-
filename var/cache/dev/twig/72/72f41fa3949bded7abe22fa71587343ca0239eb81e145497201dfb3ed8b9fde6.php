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

/* @PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig */
class __TwigTemplate_5d63b17b588137bc3e811434642756d1635e423ca5020a178c22cacd3b6d98bf extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", 25);
        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 29
        echo "  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 32
        if (($context["isSingleShopContext"] ?? $this->getContext($context, "isSingleShopContext"))) {
            // line 33
            echo "          <div class=\"card\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">credit_card</i> ";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Active payment", [], "Admin.Payment.Feature"), "html", null, true);
            echo "
            </h3>
            <div class=\"card-block\">
              ";
            // line 38
            $this->loadTemplate("@PrestaShop/Admin/Improve/Payment/PaymentMethods/Blocks/payment_modules_list.html.twig", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", 38)->display($context);
            // line 39
            echo "            </div>
          </div>
        ";
        } else {
            // line 42
            echo "          <div class=\"alert alert-warning\" role=\"alert\">
            <p class=\"alert-text\">";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You have more than one shop and must select one to configure payment.", [], "Admin.Payment.Notification"), "html", null, true);
            echo "</p>
          </div>
        ";
        }
        // line 46
        echo "      </div>
    </div>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 46,  87 => 43,  84 => 42,  79 => 39,  77 => 38,  71 => 35,  67 => 33,  65 => 32,  60 => 29,  51 => 28,  22 => 25,);
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
{% extends '@PrestaShop/Admin/layout.html.twig' %}
{% trans_default_domain 'Admin.Payment.Feature' %}

{% block content %}
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col\">
        {% if isSingleShopContext %}
          <div class=\"card\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">credit_card</i> {{ 'Active payment'|trans }}
            </h3>
            <div class=\"card-block\">
              {% include '@PrestaShop/Admin/Improve/Payment/PaymentMethods/Blocks/payment_modules_list.html.twig' %}
            </div>
          </div>
        {% else %}
          <div class=\"alert alert-warning\" role=\"alert\">
            <p class=\"alert-text\">{{ 'You have more than one shop and must select one to configure payment.'|trans({}, 'Admin.Payment.Notification') }}</p>
          </div>
        {% endif %}
      </div>
    </div>
  </div>
{% endblock %}
", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Payment\\PaymentMethods\\payment_methods.html.twig");
    }
}
