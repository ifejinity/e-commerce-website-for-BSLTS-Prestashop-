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

/* @PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/url_schema_configuration.html.twig */
class __TwigTemplate_b8a77bd56584bb423c40abcdabfc300fdbe4a77a66a30955e942c7ac1f5873c1 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'url_schema_configuration' => [$this, 'block_url_schema_configuration'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/url_schema_configuration.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/url_schema_configuration.html.twig"));

        // line 25
        echo "
";
        // line 27
        echo "
";
        // line 28
        $context["urlSchemaForm"] = $this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "url_schema", []);
        // line 29
        echo "
";
        // line 30
        $this->displayBlock('url_schema_configuration', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_url_schema_configuration($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "url_schema_configuration"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "url_schema_configuration"));

        // line 31
        echo "  ";
        if ( !twig_test_empty($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "children", []))) {
            // line 32
            echo "    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">settings</i> ";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Schema of URLs", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          <div class=\"row\">
            <div class=\"col-sm\">
              <div class=\"alert alert-info\" role=\"alert\">
                <div class=\"alert-text\">
                  ";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This section enables you to change the default pattern of your links. In order to use this functionality, PrestaShop's \"Friendly URL\" option must be enabled, and Apache's URL rewriting module (mod_rewrite) must be activated on your web server.", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "<br>
                  ";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("There are several available keywords for each route listed below; note that keywords with * are required!", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo " <br>
                  ";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To add a keyword in your URL, use the {keyword} syntax. If the keyword is not empty, you can add text before or after the keyword with syntax {prepend:keyword:append}. For example {-hey-:meta_title} will add \"-hey-my-title\" in the URL if the meta title is set.", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "
                </div>
              </div>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to products", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 55
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "product_rule", []), 'errors');
            echo "
              ";
            // line 56
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "product_rule", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 58
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "product_rule"]);
            echo "
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to category", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 68
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "category_rule", []), 'errors');
            echo "
              ";
            // line 69
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "category_rule", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 71
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "category_rule"]);
            echo "
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 78
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to category which has the \"selected_filter\" attribute for the \"Layered Navigation\" (blocklayered) module", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 81
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "layered_rule", []), 'errors');
            echo "
              ";
            // line 82
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "layered_rule", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 84
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "layered_rule"]);
            echo "
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to supplier", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 94
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "supplier_rule", []), 'errors');
            echo "
              ";
            // line 95
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "supplier_rule", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 97
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "supplier_rule"]);
            echo "
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 104
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to brand", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 107
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "manufacturer_rule", []), 'errors');
            echo "
              ";
            // line 108
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "manufacturer_rule", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 110
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "manufacturer_rule"]);
            echo "
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 117
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to page", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 120
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "cms_rule", []), 'errors');
            echo "
              ";
            // line 121
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "cms_rule", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 123
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "cms_rule"]);
            echo "
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 130
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to page category", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 133
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "cms_category_rule", []), 'errors');
            echo "
              ";
            // line 134
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "cms_category_rule", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 136
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "cms_category_rule"]);
            echo "
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
            // line 143
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Route to modules", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
            </label>
            <div class=\"col-sm\">
              ";
            // line 146
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "module", []), 'errors');
            echo "
              ";
            // line 147
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "module", []), 'widget');
            echo "
              <small class=\"form-text\">
                ";
            // line 149
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig", ["idRoute" => "module"]);
            echo "
              </small>
            </div>
          </div>

        </div>
      </div>
      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\">";
            // line 158
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
            echo "</button>
        </div>
      </div>
    </div>
  ";
        } else {
            // line 163
            echo "    ";
            $this->getAttribute(($context["urlSchemaForm"] ?? $this->getContext($context, "urlSchemaForm")), "setRendered", []);
            // line 164
            echo "  ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/url_schema_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  316 => 164,  313 => 163,  305 => 158,  293 => 149,  288 => 147,  284 => 146,  278 => 143,  268 => 136,  263 => 134,  259 => 133,  253 => 130,  243 => 123,  238 => 121,  234 => 120,  228 => 117,  218 => 110,  213 => 108,  209 => 107,  203 => 104,  193 => 97,  188 => 95,  184 => 94,  178 => 91,  168 => 84,  163 => 82,  159 => 81,  153 => 78,  143 => 71,  138 => 69,  134 => 68,  128 => 65,  118 => 58,  113 => 56,  109 => 55,  103 => 52,  92 => 44,  88 => 43,  84 => 42,  73 => 34,  69 => 32,  66 => 31,  48 => 30,  45 => 29,  43 => 28,  40 => 27,  37 => 25,);
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

{% set urlSchemaForm = metaForm.url_schema %}

{% block url_schema_configuration %}
  {% if urlSchemaForm.children is not empty %}
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">settings</i> {{ 'Schema of URLs'|trans }}
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          <div class=\"row\">
            <div class=\"col-sm\">
              <div class=\"alert alert-info\" role=\"alert\">
                <div class=\"alert-text\">
                  {{ 'This section enables you to change the default pattern of your links. In order to use this functionality, PrestaShop\\'s \"Friendly URL\" option must be enabled, and Apache\\'s URL rewriting module (mod_rewrite) must be activated on your web server.'|trans({}, 'Admin.Shopparameters.Notification') }}<br>
                  {{ 'There are several available keywords for each route listed below; note that keywords with * are required!'|trans({}, 'Admin.Shopparameters.Notification') }} <br>
                  {{ 'To add a keyword in your URL, use the {keyword} syntax. If the keyword is not empty, you can add text before or after the keyword with syntax {prepend:keyword:append}. For example {-hey-:meta_title} will add \"-hey-my-title\" in the URL if the meta title is set.'|trans({}, 'Admin.Shopparameters.Notification') }}
                </div>
              </div>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to products'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.product_rule) }}
              {{ form_widget(urlSchemaForm.product_rule) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'product_rule'}) }}
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to category'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.category_rule) }}
              {{ form_widget(urlSchemaForm.category_rule) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'category_rule'}) }}
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to category which has the \"selected_filter\" attribute for the \"Layered Navigation\" (blocklayered) module'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.layered_rule) }}
              {{ form_widget(urlSchemaForm.layered_rule) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'layered_rule'}) }}
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to supplier'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.supplier_rule) }}
              {{ form_widget(urlSchemaForm.supplier_rule) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'supplier_rule'}) }}
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to brand'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.manufacturer_rule) }}
              {{ form_widget(urlSchemaForm.manufacturer_rule) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'manufacturer_rule'}) }}
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to page'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.cms_rule) }}
              {{ form_widget(urlSchemaForm.cms_rule) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'cms_rule'}) }}
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to page category'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.cms_category_rule) }}
              {{ form_widget(urlSchemaForm.cms_category_rule) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'cms_category_rule'}) }}
              </small>
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Route to modules'|trans }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(urlSchemaForm.module) }}
              {{ form_widget(urlSchemaForm.module) }}
              <small class=\"form-text\">
                {{ include('@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/keyword.html.twig', {'idRoute': 'module'}) }}
              </small>
            </div>
          </div>

        </div>
      </div>
      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
        </div>
      </div>
    </div>
  {% else %}
    {% do urlSchemaForm.setRendered %}
  {% endif %}
{% endblock %}
", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/url_schema_configuration.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\Blocks\\url_schema_configuration.html.twig");
    }
}
