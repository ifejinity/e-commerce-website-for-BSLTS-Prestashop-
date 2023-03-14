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

/* @PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig */
class __TwigTemplate_2dd066c653371bc9eca60d991c070380e1ce77d9038b3a6bf6765dd11a0fa05b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'set_up_urls_configuration' => [$this, 'block_set_up_urls_configuration'],
            'meta_form_rest' => [$this, 'block_meta_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig"));

        // line 25
        echo "
";
        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig", 27);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('set_up_urls_configuration', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_set_up_urls_configuration($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "set_up_urls_configuration"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "set_up_urls_configuration"));

        // line 30
        echo "  <div class=\"card\">
    <h3 class=\"card-header\">
      <i class=\"material-icons\">settings</i> ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set up URLs", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
    </h3>
    <div class=\"card-block row\">
      <div class=\"card-text\">

        ";
        // line 37
        if ( !($context["isHtaccessFileValid"] ?? $this->getContext($context, "isHtaccessFileValid"))) {
            // line 38
            echo "          <div class=\"row\">
            <div class=\"col-sm\">
              <div class=\"alert alert-info\" role=\"alert\">
                <div class=\"alert-text\">
                  ";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Before you can use this tool, you need to:", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "
                  <br>
                  ";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("1) Create a blank .htaccess file in your root directory.", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "
                  <br>
                  ";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("2) Give it write permissions (CHMOD 666 on Unix system).", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "
                </div>
              </div>
            </div>
          </div>
        ";
        }
        // line 52
        echo "
        <div class=\"form-group row\">
          ";
        // line 54
        if (($context["isModRewriteActive"] ?? $this->getContext($context, "isModRewriteActive"))) {
            // line 55
            echo "            ";
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Friendly URL", [], "Admin.Global"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable this option only if your server allows URL rewriting (recommended).", [], "Admin.Shopparameters.Help"));
            echo "
          ";
        }
        // line 57
        echo "          <div class=\"col-sm\">
            ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "friendly_url", []), 'errors');
        echo "
            ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "friendly_url", []), 'widget');
        echo "

            ";
        // line 61
        if ( !($context["isModRewriteActive"] ?? $this->getContext($context, "isModRewriteActive"))) {
            // line 62
            echo "              <small class=\"form-text\">
                ";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("URL rewriting (mod_rewrite) is not active on your server, or it is not possible to check your server configuration. If you want to use Friendly URLs, you must activate this mod.", [], "Admin.Shopparameters.Help"), "html", null, true);
            echo "
              </small>
            ";
        }
        // line 66
        echo "          </div>
        </div>

        <div class=\"form-group row\">
          ";
        // line 70
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Accented URL", [], "Admin.Shopparameters.Feature"), (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable this option if you want to allow accented characters in your friendly URLs.", [], "Admin.Shopparameters.Help") . " ") . $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You should only activate this option if you are using non-latin characters ; for all the latin charsets, your SEO will be better without this option.", [], "Admin.Shopparameters.Help")));
        echo "
          <div class=\"col-sm\">
            ";
        // line 72
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "accented_url", []), 'errors');
        echo "
            ";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "accented_url", []), 'widget');
        echo "
          </div>
        </div>

        <div class=\"form-group row\">
          <label class=\"form-control-label\">";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Redirect to the canonical URL", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "</label>
          <div class=\"col-sm\">
            ";
        // line 80
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "canonical_url_redirection", []), 'errors');
        echo "
            ";
        // line 81
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "canonical_url_redirection", []), 'widget');
        echo "
          </div>
        </div>

        ";
        // line 85
        if ($this->getAttribute($this->getAttribute(($context["metaForm"] ?? null), "set_up_urls", [], "any", false, true), "disable_apache_multiview", [], "any", true, true)) {
            // line 86
            echo "          <div class=\"form-group row\">
            ";
            // line 87
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable Apache's MultiViews option", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable this option only if you have problems with URL rewriting.", [], "Admin.Shopparameters.Help"));
            echo "
            <div class=\"col-sm\">
              ";
            // line 89
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "disable_apache_multiview", []), 'errors');
            echo "
              ";
            // line 90
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "disable_apache_multiview", []), 'widget');
            echo "
            </div>
          </div>
        ";
        }
        // line 94
        echo "
        ";
        // line 95
        if ($this->getAttribute($this->getAttribute(($context["metaForm"] ?? null), "set_up_urls", [], "any", false, true), "disable_apache_mod_security", [], "any", true, true)) {
            // line 96
            echo "          <div class=\"form-group row\">
            ";
            // line 97
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable Apache's mod_security module", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Some of PrestaShop's features might not work correctly with a specific configuration of Apache's mod_security module. We recommend to turn it off.", [], "Admin.Shopparameters.Help"));
            echo "
            <div class=\"col-sm\">
              ";
            // line 99
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "disable_apache_mod_security", []), 'errors');
            echo "
              ";
            // line 100
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), "disable_apache_mod_security", []), 'widget');
            echo "
            </div>
          </div>
        ";
        }
        // line 104
        echo "
        ";
        // line 105
        $this->displayBlock('meta_form_rest', $context, $blocks);
        // line 108
        echo "      </div>
    </div>
    <div class=\"card-footer\">
      <div class=\"d-flex justify-content-end\">
        <button class=\"btn btn-primary\">";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
      </div>
    </div>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 105
    public function block_meta_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_form_rest"));

        // line 106
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["metaForm"] ?? $this->getContext($context, "metaForm")), "set_up_urls", []), 'rest');
        echo "
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 106,  248 => 105,  233 => 112,  227 => 108,  225 => 105,  222 => 104,  215 => 100,  211 => 99,  206 => 97,  203 => 96,  201 => 95,  198 => 94,  191 => 90,  187 => 89,  182 => 87,  179 => 86,  177 => 85,  170 => 81,  166 => 80,  161 => 78,  153 => 73,  149 => 72,  144 => 70,  138 => 66,  132 => 63,  129 => 62,  127 => 61,  122 => 59,  118 => 58,  115 => 57,  109 => 55,  107 => 54,  103 => 52,  94 => 46,  89 => 44,  84 => 42,  78 => 38,  76 => 37,  68 => 32,  64 => 30,  46 => 29,  43 => 28,  41 => 27,  38 => 25,);
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

{% block set_up_urls_configuration %}
  <div class=\"card\">
    <h3 class=\"card-header\">
      <i class=\"material-icons\">settings</i> {{ 'Set up URLs'|trans }}
    </h3>
    <div class=\"card-block row\">
      <div class=\"card-text\">

        {% if not isHtaccessFileValid %}
          <div class=\"row\">
            <div class=\"col-sm\">
              <div class=\"alert alert-info\" role=\"alert\">
                <div class=\"alert-text\">
                  {{ 'Before you can use this tool, you need to:'|trans({}, 'Admin.Shopparameters.Notification') }}
                  <br>
                  {{ '1) Create a blank .htaccess file in your root directory.'|trans({}, 'Admin.Shopparameters.Notification') }}
                  <br>
                  {{ '2) Give it write permissions (CHMOD 666 on Unix system).'|trans({}, 'Admin.Shopparameters.Notification') }}
                </div>
              </div>
            </div>
          </div>
        {% endif %}

        <div class=\"form-group row\">
          {% if isModRewriteActive %}
            {{ ps.label_with_help('Friendly URL'|trans({}, 'Admin.Global'), ('Enable this option only if your server allows URL rewriting (recommended).'|trans({}, 'Admin.Shopparameters.Help'))) }}
          {% endif %}
          <div class=\"col-sm\">
            {{ form_errors(metaForm.set_up_urls.friendly_url) }}
            {{ form_widget(metaForm.set_up_urls.friendly_url) }}

            {% if not isModRewriteActive %}
              <small class=\"form-text\">
                {{ 'URL rewriting (mod_rewrite) is not active on your server, or it is not possible to check your server configuration. If you want to use Friendly URLs, you must activate this mod.'|trans({}, 'Admin.Shopparameters.Help') }}
              </small>
            {% endif %}
          </div>
        </div>

        <div class=\"form-group row\">
          {{ ps.label_with_help(('Accented URL'|trans), ('Enable this option if you want to allow accented characters in your friendly URLs.'|trans({}, 'Admin.Shopparameters.Help') ~ ' ' ~ 'You should only activate this option if you are using non-latin characters ; for all the latin charsets, your SEO will be better without this option.'|trans({}, 'Admin.Shopparameters.Help'))) }}
          <div class=\"col-sm\">
            {{ form_errors(metaForm.set_up_urls.accented_url) }}
            {{ form_widget(metaForm.set_up_urls.accented_url) }}
          </div>
        </div>

        <div class=\"form-group row\">
          <label class=\"form-control-label\">{{ 'Redirect to the canonical URL'|trans }}</label>
          <div class=\"col-sm\">
            {{ form_errors(metaForm.set_up_urls.canonical_url_redirection) }}
            {{ form_widget(metaForm.set_up_urls.canonical_url_redirection) }}
          </div>
        </div>

        {% if metaForm.set_up_urls.disable_apache_multiview is defined %}
          <div class=\"form-group row\">
            {{ ps.label_with_help((\"Disable Apache's MultiViews option\"|trans), ('Enable this option only if you have problems with URL rewriting.'|trans({}, 'Admin.Shopparameters.Help'))) }}
            <div class=\"col-sm\">
              {{ form_errors(metaForm.set_up_urls.disable_apache_multiview) }}
              {{ form_widget(metaForm.set_up_urls.disable_apache_multiview) }}
            </div>
          </div>
        {% endif %}

        {% if metaForm.set_up_urls.disable_apache_mod_security is defined %}
          <div class=\"form-group row\">
            {{ ps.label_with_help((\"Disable Apache's mod_security module\"|trans), (\"Some of PrestaShop's features might not work correctly with a specific configuration of Apache's mod_security module. We recommend to turn it off.\"|trans({}, 'Admin.Shopparameters.Help'))) }}
            <div class=\"col-sm\">
              {{ form_errors(metaForm.set_up_urls.disable_apache_mod_security) }}
              {{ form_widget(metaForm.set_up_urls.disable_apache_mod_security) }}
            </div>
          </div>
        {% endif %}

        {% block meta_form_rest %}
          {{ form_rest(metaForm.set_up_urls) }}
        {% endblock %}
      </div>
    </div>
    <div class=\"card-footer\">
      <div class=\"d-flex justify-content-end\">
        <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
      </div>
    </div>
  </div>
{% endblock %}
", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\Blocks\\set_up_urls_configuration.html.twig");
    }
}
