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

/* @PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig */
class __TwigTemplate_f58407dcc9120aff4dbe2c25989c1d1a5bda9a13b47445320fc468f4d994484e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 26);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'meta_form_rest' => [$this, 'block_meta_form_rest'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig"));

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
        echo "  <div class=\"row\">
    <div class=\"col-sm\">
      ";
        // line 32
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/meta_showcase_card.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 32)->display($context);
        // line 33
        echo "    </div>
  </div>
  ";
        // line 35
        if ( !($context["isGridDisplayed"] ?? $this->getContext($context, "isGridDisplayed"))) {
            // line 36
            echo "      <div class=\"row\">
        <div class=\"col-sm\">
          <div class=\"alert alert-info\" role=\"alert\">
            <div class=\"alert-text\">
              ";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can only display the page list in a shop context.", [], "Admin.Shopparameters.Notification"), "html", null, true);
            echo "
            </div>
          </div>
        </div>
      </div>
    ";
        } else {
            // line 46
            echo "      <div class=\"row\">
        <div class=\"col\">
          ";
            // line 48
            $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 48)->display(twig_array_merge($context, ["grid" => ($context["grid"] ?? $this->getContext($context, "grid"))]));
            // line 49
            echo "        </div>
      </div>
  ";
        }
        // line 52
        echo "
  <div class=\"row justify-content-center\">
      <div class=\"col\">
        ";
        // line 55
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["metaForm"] ?? $this->getContext($context, "metaForm")), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_metas_save_options")]);
        echo "
          ";
        // line 56
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 56)->display($context);
        // line 57
        echo "          ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/shop_urls_configuration.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 57)->display($context);
        // line 58
        echo "          ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/domain_name_management.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 58)->display($context);
        // line 59
        echo "          ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/url_schema_configuration.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 59)->display($context);
        // line 60
        echo "          ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/seo_options_configuration.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 60)->display($context);
        // line 61
        echo "
          ";
        // line 62
        $this->displayBlock('meta_form_rest', $context, $blocks);
        // line 65
        echo "
        ";
        // line 66
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["metaForm"] ?? $this->getContext($context, "metaForm")), 'form_end');
        echo "

        ";
        // line 68
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["robotsForm"] ?? $this->getContext($context, "robotsForm")), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_metas_generate_robots_text_file")]);
        echo "
          ";
        // line 69
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/robots_file_generation.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", 69)->display($context);
        // line 70
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["robotsForm"] ?? $this->getContext($context, "robotsForm")), 'rest');
        echo "
        ";
        // line 71
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["robotsForm"] ?? $this->getContext($context, "robotsForm")), 'form_end');
        echo "
      </div>
  </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 62
    public function block_meta_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_form_rest"));

        // line 63
        echo "            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["metaForm"] ?? $this->getContext($context, "metaForm")), 'rest');
        echo "
          ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 77
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 78
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/meta.bundle.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 80,  198 => 79,  193 => 78,  184 => 77,  171 => 63,  162 => 62,  147 => 71,  142 => 70,  140 => 69,  136 => 68,  131 => 66,  128 => 65,  126 => 62,  123 => 61,  120 => 60,  117 => 59,  114 => 58,  111 => 57,  109 => 56,  105 => 55,  100 => 52,  95 => 49,  93 => 48,  89 => 46,  80 => 40,  74 => 36,  72 => 35,  68 => 33,  66 => 32,  62 => 30,  53 => 29,  22 => 26,);
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
{% trans_default_domain \"Admin.Shopparameters.Feature\" %}

{% block content %}
  <div class=\"row\">
    <div class=\"col-sm\">
      {% include '@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/meta_showcase_card.html.twig' %}
    </div>
  </div>
  {% if not isGridDisplayed %}
      <div class=\"row\">
        <div class=\"col-sm\">
          <div class=\"alert alert-info\" role=\"alert\">
            <div class=\"alert-text\">
              {{ 'You can only display the page list in a shop context.'|trans({}, 'Admin.Shopparameters.Notification') }}
            </div>
          </div>
        </div>
      </div>
    {% else %}
      <div class=\"row\">
        <div class=\"col\">
          {% include '@PrestaShop/Admin/Common/Grid/grid_panel.html.twig' with {'grid': grid} %}
        </div>
      </div>
  {% endif %}

  <div class=\"row justify-content-center\">
      <div class=\"col\">
        {{ form_start(metaForm, {'action': path('admin_metas_save_options')}) }}
          {% include '@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/set_up_urls_configuration.html.twig' %}
          {% include '@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/shop_urls_configuration.html.twig' %}
          {% include '@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/domain_name_management.html.twig' %}
          {% include '@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/url_schema_configuration.html.twig' %}
          {% include '@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/seo_options_configuration.html.twig' %}

          {% block meta_form_rest %}
            {{ form_rest(metaForm) }}
          {% endblock %}

        {{ form_end(metaForm) }}

        {{ form_start(robotsForm, {'action': path('admin_metas_generate_robots_text_file')}) }}
          {% include '@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/Blocks/robots_file_generation.html.twig' %}
          {{ form_rest(robotsForm) }}
        {{ form_end(robotsForm) }}
      </div>
  </div>

{% endblock %}

{% block javascripts %}
  {{ parent() }}
  <script src=\"{{ asset('themes/new-theme/public/meta.bundle.js') }}\"></script>
  <script src=\"{{ asset('themes/default/js/bundle/pagination.js') }}\"></script>
{% endblock %}
", "@PrestaShop/Admin/Configure/ShopParameters/TrafficSeo/Meta/index.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\index.html.twig");
    }
}
