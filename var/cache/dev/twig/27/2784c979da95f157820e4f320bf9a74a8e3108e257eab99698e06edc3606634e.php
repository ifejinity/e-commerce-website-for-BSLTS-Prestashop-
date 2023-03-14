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

/* @PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig */
class __TwigTemplate_2bcdd0fc8c11e28f75eb4312419106dea4db6fcce2d0460a3cd3369b4d96ca01 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig"));

        // line 25
        echo "
";
        // line 26
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", 26, "1551949834")->display(twig_array_merge($context, ["id" => ($this->getAttribute(        // line 27
($context["grid"] ?? $this->getContext($context, "grid")), "id", []) . "_grid_delete_customers_modal"), "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("How do you want to delete the selected customers?", [], "Admin.Orderscustomers.Notification"), "closable" => true, "actions" => [0 => ["type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", [], "Admin.Actions"), "class" => "btn btn-danger btn-lg js-submit-delete-customers"]]]));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 27,  39 => 26,  36 => 25,);
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

{% embed 'PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig' with {
  'id': grid.id ~ '_grid_delete_customers_modal',
  'title': \"How do you want to delete the selected customers?\"|trans({}, 'Admin.Orderscustomers.Notification'),
  'closable': true,
  'actions': [{
    'type': 'button',
    'label': \"Delete\"|trans({}, 'Admin.Actions'),
    'class': 'btn btn-danger btn-lg js-submit-delete-customers',
  }],
} %}
  {% block content %}
    <div class=\"modal-body\">
      <p>{{ 'There are two ways of deleting a customer. Please choose your preferred method.'|trans({}, 'Admin.Orderscustomers.Notification') }}</p>

      {{ form_start(deleteCustomersForm, {'action': path('admin_customers_index'), 'method': 'post'}) }}

      <div class=\"form-group mb-0\">
        {{ form_widget(deleteCustomersForm.delete_method) }}
      </div>

      <div class=\"d-none\">
        {{ form_widget(deleteCustomersForm.customers_to_delete) }}
      </div>

      {{ form_end(deleteCustomersForm) }}
    </div>
  {% endblock %}
{% endembed %}
", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Customer\\Blocks\\delete_modal.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig */
class __TwigTemplate_2bcdd0fc8c11e28f75eb4312419106dea4db6fcce2d0460a3cd3369b4d96ca01___1551949834 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", 26);
        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 36
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 37
        echo "    <div class=\"modal-body\">
      <p>";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("There are two ways of deleting a customer. Please choose your preferred method.", [], "Admin.Orderscustomers.Notification"), "html", null, true);
        echo "</p>

      ";
        // line 40
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["deleteCustomersForm"] ?? $this->getContext($context, "deleteCustomersForm")), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_customers_index"), "method" => "post"]);
        echo "

      <div class=\"form-group mb-0\">
        ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["deleteCustomersForm"] ?? $this->getContext($context, "deleteCustomersForm")), "delete_method", []), 'widget');
        echo "
      </div>

      <div class=\"d-none\">
        ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["deleteCustomersForm"] ?? $this->getContext($context, "deleteCustomersForm")), "customers_to_delete", []), 'widget');
        echo "
      </div>

      ";
        // line 50
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["deleteCustomersForm"] ?? $this->getContext($context, "deleteCustomersForm")), 'form_end');
        echo "
    </div>
  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 50,  199 => 47,  192 => 43,  186 => 40,  181 => 38,  178 => 37,  169 => 36,  140 => 26,  40 => 27,  39 => 26,  36 => 25,);
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

{% embed 'PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig' with {
  'id': grid.id ~ '_grid_delete_customers_modal',
  'title': \"How do you want to delete the selected customers?\"|trans({}, 'Admin.Orderscustomers.Notification'),
  'closable': true,
  'actions': [{
    'type': 'button',
    'label': \"Delete\"|trans({}, 'Admin.Actions'),
    'class': 'btn btn-danger btn-lg js-submit-delete-customers',
  }],
} %}
  {% block content %}
    <div class=\"modal-body\">
      <p>{{ 'There are two ways of deleting a customer. Please choose your preferred method.'|trans({}, 'Admin.Orderscustomers.Notification') }}</p>

      {{ form_start(deleteCustomersForm, {'action': path('admin_customers_index'), 'method': 'post'}) }}

      <div class=\"form-group mb-0\">
        {{ form_widget(deleteCustomersForm.delete_method) }}
      </div>

      <div class=\"d-none\">
        {{ form_widget(deleteCustomersForm.customers_to_delete) }}
      </div>

      {{ form_end(deleteCustomersForm) }}
    </div>
  {% endblock %}
{% endembed %}
", "@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Customer\\Blocks\\delete_modal.html.twig");
    }
}
