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

/* @PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/shop_urls_configuration.html.twig */
class __TwigTemplate_4ba29fd662a70470cfee3ebe82a0af8275eaa9c8f01789381e95fa17e3b092f2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'shop_urls_configuration' => [$this, 'block_shop_urls_configuration'],
            'meta_form_rest' => [$this, 'block_meta_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/shop_urls_configuration.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/shop_urls_configuration.html.twig"));

        // line 25
        echo "
";
        // line 27
        echo "
";
        // line 28
        $context["shopUrlForm"] = $this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "shop_urls", []);
        // line 29
        echo "
";
        // line 30
        $this->displayBlock('shop_urls_configuration', $context, $blocks);
        // line 115
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 30
    public function block_shop_urls_configuration($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "shop_urls_configuration"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "shop_urls_configuration"));

        // line 31
        echo "
  ";
        // line 32
        $context["cardHeaderLabel"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set shop URL", [], "Admin.Shopparameters.Feature");
        // line 33
        echo "  ";
        if ((($context["isShopFeatureActive"] ?? $this->getContext($context, "isShopFeatureActive")) &&  !($context["isHostMode"] ?? $this->getContext($context, "isHostMode")))) {
            // line 34
            echo "    <div class=\"card\">
      <div class=\"card-header\">
        <i class=\"material-icons\">settings</i> ";
            // line 36
            echo twig_escape_filter($this->env, ($context["cardHeaderLabel"] ?? $this->getContext($context, "cardHeaderLabel")), "html", null, true);
            echo "
      </div>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          <div class=\"row\">
            <div class=\"col-sm\">
              <div class=\"alert alert-info\" role=\"alert\">
                <div class=\"alert-text\">
                  ";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The multistore option is enabled. If you want to change the URL of your shop, you must go to the \"Multistore\" page under the \"Advanced Parameters\" menu.", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  ";
        }
        // line 53
        echo "
  ";
        // line 54
        if ( !twig_test_empty($this->getAttribute(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), "children", []))) {
            // line 55
            echo "    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">settings</i> ";
            // line 57
            echo twig_escape_filter($this->env, ($context["cardHeaderLabel"] ?? $this->getContext($context, "cardHeaderLabel")), "html", null, true);
            echo "
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
            <div class=\"row\">
              <div class=\"col-sm\">
                <div class=\"alert alert-info\" role=\"alert\">
                  <div class=\"alert-text\">
                    ";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Here you can set the URL for your shop. If you migrate your shop to a new URL, remember to change the values below.", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "
                  </div>
                </div>
              </div>
            </div>

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                ";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop domain", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
              </label>
              <div class=\"col-sm\">
                ";
            // line 76
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), "domain", []), 'errors');
            echo "
                ";
            // line 77
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), "domain", []), 'widget');
            echo "
              </div>
            </div>

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                ";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SSL domain", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
              </label>
              <div class=\"col-sm\">
                ";
            // line 86
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), "domain_ssl", []), 'errors');
            echo "
                ";
            // line 87
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), "domain_ssl", []), 'widget');
            echo "
              </div>
            </div>

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                ";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Base URI", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
              </label>
              <div class=\"col-sm\">
                ";
            // line 96
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), "physical_uri", []), 'errors');
            echo "
                ";
            // line 97
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), "physical_uri", []), 'widget', ["required" => false]);
            echo "
              </div>
            </div>

            ";
            // line 101
            $this->displayBlock('meta_form_rest', $context, $blocks);
            // line 104
            echo "        </div>
      </div>

      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\">";
            // line 109
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
            echo "</button>
        </div>
      </div>
    </div>
  ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 101
    public function block_meta_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_form_rest"));

        // line 102
        echo "              ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["shopUrlForm"] ?? $this->getContext($context, "shopUrlForm")), 'rest');
        echo "
            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/shop_urls_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 102,  217 => 101,  201 => 109,  194 => 104,  192 => 101,  185 => 97,  181 => 96,  175 => 93,  166 => 87,  162 => 86,  156 => 83,  147 => 77,  143 => 76,  137 => 73,  126 => 65,  115 => 57,  111 => 55,  109 => 54,  106 => 53,  94 => 44,  83 => 36,  79 => 34,  76 => 33,  74 => 32,  71 => 31,  62 => 30,  51 => 115,  49 => 30,  46 => 29,  44 => 28,  41 => 27,  38 => 25,);
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

{% set shopUrlForm = metaForm.shop_urls %}

{% block shop_urls_configuration %}

  {% set cardHeaderLabel = 'Set shop URL'|trans %}
  {% if isShopFeatureActive and not isHostMode %}
    <div class=\"card\">
      <div class=\"card-header\">
        <i class=\"material-icons\">settings</i> {{ cardHeaderLabel }}
      </div>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          <div class=\"row\">
            <div class=\"col-sm\">
              <div class=\"alert alert-info\" role=\"alert\">
                <div class=\"alert-text\">
                  {{ 'The multistore option is enabled. If you want to change the URL of your shop, you must go to the \"Multistore\" page under the \"Advanced Parameters\" menu.'|trans({}, 'Admin.Shopparameters.Notification') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  {% endif %}

  {% if shopUrlForm.children is not empty %}
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">settings</i> {{ cardHeaderLabel }}
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
            <div class=\"row\">
              <div class=\"col-sm\">
                <div class=\"alert alert-info\" role=\"alert\">
                  <div class=\"alert-text\">
                    {{ 'Here you can set the URL for your shop. If you migrate your shop to a new URL, remember to change the values below.'|trans({}, 'Admin.Shopparameters.Notification') }}
                  </div>
                </div>
              </div>
            </div>

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                {{ 'Shop domain'|trans }}
              </label>
              <div class=\"col-sm\">
                {{ form_errors(shopUrlForm.domain) }}
                {{ form_widget(shopUrlForm.domain) }}
              </div>
            </div>

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                {{ 'SSL domain'|trans }}
              </label>
              <div class=\"col-sm\">
                {{ form_errors(shopUrlForm.domain_ssl) }}
                {{ form_widget(shopUrlForm.domain_ssl) }}
              </div>
            </div>

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                {{ 'Base URI'|trans }}
              </label>
              <div class=\"col-sm\">
                {{ form_errors(shopUrlForm.physical_uri) }}
                {{ form_widget(shopUrlForm.physical_uri, {'required': false}) }}
              </div>
            </div>

            {% block meta_form_rest %}
              {{ form_rest(shopUrlForm) }}
            {% endblock %}
        </div>
      </div>

      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
        </div>
      </div>
    </div>
  {% endif %}
{% endblock %}

", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/shop_urls_configuration.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\Blocks\\shop_urls_configuration.html.twig");
    }
}
