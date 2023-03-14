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

/* @PrestaShop/Admin/Sell/Order/Delivery/slip.html.twig */
class __TwigTemplate_2937190c9840009a1926d62d45142a2fa75e19421f8a5bf0369171b934307cf1 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Order/Delivery/slip.html.twig", 25);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'admin_form_order_delivery_slip_pdf' => [$this, 'block_admin_form_order_delivery_slip_pdf'],
            'admin_form_order_delivery_slip_options' => [$this, 'block_admin_form_order_delivery_slip_options'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Order/Delivery/slip.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Order/Delivery/slip.html.twig"));

        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Sell/Order/Delivery/slip.html.twig", 27);
        // line 25
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 29
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 30
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["pdfForm"] ?? $this->getContext($context, "pdfForm")), 'form_start', ["attr" => ["class" => "form", "autocomplete" => "off"], "action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_order_delivery_slip_pdf")]);
        echo "
    <div class=\"row justify-content-center\">
      ";
        // line 32
        $this->displayBlock('admin_form_order_delivery_slip_pdf', $context, $blocks);
        // line 65
        echo "    </div>
  ";
        // line 66
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["pdfForm"] ?? $this->getContext($context, "pdfForm")), 'form_end');
        echo "

  ";
        // line 68
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), 'form_start', ["attr" => ["class" => "form"]]);
        echo "
    <div class=\"row justify-content-center\">
      ";
        // line 70
        $this->displayBlock('admin_form_order_delivery_slip_options', $context, $blocks);
        // line 110
        echo "    </div>
  ";
        // line 111
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), 'form_end');
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 32
    public function block_admin_form_order_delivery_slip_pdf($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_form_order_delivery_slip_pdf"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_form_order_delivery_slip_pdf"));

        // line 33
        echo "        <div class=\"col-xl-10\">
          <div class=\"card\" id=\"delivery_pdf_fieldset\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">print</i> ";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Print PDF", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
            </h3>
            <div class=\"card-block row\">
              <div class=\"card-text\">
                <div class=\"form-group row\">
                  ";
        // line 41
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("From", [], "Admin.Global"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Format: 2011-12-31 (inclusive).", [], "Admin.Orderscustomers.Help"));
        echo "
                  <div class=\"col-sm\">
                    ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["pdfForm"] ?? $this->getContext($context, "pdfForm")), "pdf", []), "date_from", []), 'errors');
        echo "
                    ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["pdfForm"] ?? $this->getContext($context, "pdfForm")), "pdf", []), "date_from", []), 'widget');
        echo "
                  </div>
                </div>
                <div class=\"form-group row\">
                  ";
        // line 48
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To", [], "Admin.Global"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Format: 2011-12-31 (inclusive).", [], "Admin.Orderscustomers.Help"));
        echo "
                  <div class=\"col-sm\">
                    ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["pdfForm"] ?? $this->getContext($context, "pdfForm")), "pdf", []), "date_to", []), 'errors');
        echo "
                    ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["pdfForm"] ?? $this->getContext($context, "pdfForm")), "pdf", []), "date_to", []), 'widget');
        echo "
                  </div>
                </div>
                ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["pdfForm"] ?? $this->getContext($context, "pdfForm")), 'rest');
        echo "
              </div>
            </div>
            <div class=\"card-footer\">
              <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Generate PDF", [], "Admin.Orderscustomers.Feature"), "html", null, true);
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
    public function block_admin_form_order_delivery_slip_options($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_form_order_delivery_slip_options"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_form_order_delivery_slip_options"));

        // line 71
        echo "        <div class=\"col-xl-10\">
          <div class=\"card\" id=\"delivery_options_fieldset\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">settings</i> ";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delivery slip options", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
            </h3>
            <div class=\"card-block row\">
              <div class=\"card-text\">
                <div class=\"form-group row\">
                  ";
        // line 79
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delivery prefix", [], "Admin.Orderscustomers.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Prefix used for delivery slips.", [], "Admin.Orderscustomers.Help"));
        echo "
                  <div class=\"col-sm\">
                    ";
        // line 81
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), "options", []), "prefix", []), 'errors');
        echo "
                    ";
        // line 82
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), "options", []), "prefix", []), 'widget');
        echo "
                  </div>
                </div>
                <div class=\"form-group row\">
                  ";
        // line 86
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delivery Number", [], "Admin.Orderscustomers.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The next delivery slip will begin with this number and then increase with each additional slip.", [], "Admin.Orderscustomers.Help"));
        echo "
                  <div class=\"col-sm\">
                    ";
        // line 88
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), "options", []), "number", []), 'errors');
        echo "
                    ";
        // line 89
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), "options", []), "number", []), 'widget');
        echo "
                  </div>
                </div>
                <div class=\"form-group row\">
                  ";
        // line 93
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable product image", [], "Admin.Orderscustomers.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Adds an image before product name on Delivery-slip", [], "Admin.Orderscustomers.Help"));
        echo "
                  <div class=\"col-sm\">
                    ";
        // line 95
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), "options", []), "enable_product_image", []), 'errors');
        echo "
                    ";
        // line 96
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), "options", []), "enable_product_image", []), 'widget');
        echo "
                  </div>
                </div>
                ";
        // line 99
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["optionsForm"] ?? $this->getContext($context, "optionsForm")), 'rest');
        echo "
              </div>
            </div>
            <div class=\"card-footer\">
              <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">";
        // line 104
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

    // line 114
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 115
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/order_delivery.bundle.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Delivery/slip.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 117,  283 => 115,  274 => 114,  258 => 104,  250 => 99,  244 => 96,  240 => 95,  235 => 93,  228 => 89,  224 => 88,  219 => 86,  212 => 82,  208 => 81,  203 => 79,  195 => 74,  190 => 71,  181 => 70,  165 => 59,  157 => 54,  151 => 51,  147 => 50,  142 => 48,  135 => 44,  131 => 43,  126 => 41,  118 => 36,  113 => 33,  104 => 32,  92 => 111,  89 => 110,  87 => 70,  82 => 68,  77 => 66,  74 => 65,  72 => 32,  66 => 30,  57 => 29,  47 => 25,  45 => 27,  22 => 25,);
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
{% trans_default_domain \"Admin.Orderscustomers.Feature\" %}
{% import '@PrestaShop/Admin/macros.html.twig' as ps %}

{% block content %}
  {{ form_start(pdfForm, {'attr' : {'class': 'form', 'autocomplete': 'off'}, 'action': path('admin_order_delivery_slip_pdf') }) }}
    <div class=\"row justify-content-center\">
      {% block admin_form_order_delivery_slip_pdf %}
        <div class=\"col-xl-10\">
          <div class=\"card\" id=\"delivery_pdf_fieldset\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">print</i> {{ 'Print PDF'|trans }}
            </h3>
            <div class=\"card-block row\">
              <div class=\"card-text\">
                <div class=\"form-group row\">
                  {{ ps.label_with_help('From'|trans({}, 'Admin.Global'), ('Format: 2011-12-31 (inclusive).'|trans({}, 'Admin.Orderscustomers.Help'))) }}
                  <div class=\"col-sm\">
                    {{ form_errors(pdfForm.pdf.date_from) }}
                    {{ form_widget(pdfForm.pdf.date_from) }}
                  </div>
                </div>
                <div class=\"form-group row\">
                  {{ ps.label_with_help('To'|trans({}, 'Admin.Global'), ('Format: 2011-12-31 (inclusive).'|trans({}, 'Admin.Orderscustomers.Help'))) }}
                  <div class=\"col-sm\">
                    {{ form_errors(pdfForm.pdf.date_to) }}
                    {{ form_widget(pdfForm.pdf.date_to) }}
                  </div>
                </div>
                {{ form_rest(pdfForm) }}
              </div>
            </div>
            <div class=\"card-footer\">
              <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">{{ 'Generate PDF'|trans }}</button>
              </div>
            </div>
          </div>
        </div>
      {% endblock %}
    </div>
  {{ form_end(pdfForm) }}

  {{ form_start(optionsForm, {'attr' : {'class': 'form'} }) }}
    <div class=\"row justify-content-center\">
      {% block admin_form_order_delivery_slip_options %}
        <div class=\"col-xl-10\">
          <div class=\"card\" id=\"delivery_options_fieldset\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">settings</i> {{ 'Delivery slip options'|trans }}
            </h3>
            <div class=\"card-block row\">
              <div class=\"card-text\">
                <div class=\"form-group row\">
                  {{ ps.label_with_help(('Delivery prefix'|trans), ('Prefix used for delivery slips.'|trans({}, 'Admin.Orderscustomers.Help'))) }}
                  <div class=\"col-sm\">
                    {{ form_errors(optionsForm.options.prefix) }}
                    {{ form_widget(optionsForm.options.prefix) }}
                  </div>
                </div>
                <div class=\"form-group row\">
                  {{ ps.label_with_help(('Delivery Number'|trans), ('The next delivery slip will begin with this number and then increase with each additional slip.'|trans({}, 'Admin.Orderscustomers.Help'))) }}
                  <div class=\"col-sm\">
                    {{ form_errors(optionsForm.options.number) }}
                    {{ form_widget(optionsForm.options.number) }}
                  </div>
                </div>
                <div class=\"form-group row\">
                  {{ ps.label_with_help(('Enable product image'|trans), ('Adds an image before product name on Delivery-slip'|trans({}, 'Admin.Orderscustomers.Help'))) }}
                  <div class=\"col-sm\">
                    {{ form_errors(optionsForm.options.enable_product_image) }}
                    {{ form_widget(optionsForm.options.enable_product_image) }}
                  </div>
                </div>
                {{ form_rest(optionsForm) }}
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
    </div>
  {{ form_end(optionsForm) }}
{% endblock %}

{% block javascripts %}
    {{ parent() }}

    <script src=\"{{ asset('themes/new-theme/public/order_delivery.bundle.js') }}\"></script>
{% endblock %}
", "@PrestaShop/Admin/Sell/Order/Delivery/slip.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Delivery\\slip.html.twig");
    }
}
