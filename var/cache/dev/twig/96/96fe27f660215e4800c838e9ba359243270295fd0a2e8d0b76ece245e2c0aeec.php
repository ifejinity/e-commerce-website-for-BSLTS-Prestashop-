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

/* @PrestaShop/Admin/Improve/Design/MailTheme/Blocks/configuration_form.html.twig */
class __TwigTemplate_6b6da019a600919830d714ac7c01b56a995494a518ee801bc5249b3aa43c52e5 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'mailThemeConfigurationFormBlock' => [$this, 'block_mailThemeConfigurationFormBlock'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/configuration_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/configuration_form.html.twig"));

        // line 25
        echo "
";
        // line 26
        $this->displayBlock('mailThemeConfigurationFormBlock', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_mailThemeConfigurationFormBlock($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mailThemeConfigurationFormBlock"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mailThemeConfigurationFormBlock"));

        // line 27
        echo "  <div class=\"row justify-content-center\">
    <div class=\"col-xl-10\">
      ";
        // line 29
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["mailThemeConfigurationForm"] ?? $this->getContext($context, "mailThemeConfigurationForm")), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mail_theme_save_configuration")]);
        echo "
      <div class=\"card\">
        <h3 class=\"card-header\">
          <i class=\"material-icons\">settings</i> ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Configuration", [], "Admin.Global"), "html", null, true);
        echo "
        </h3>

        <div class=\"card-block row\">
          <div class=\"card-text\">

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                ";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? $this->getContext($context, "ps")), "label_with_help", [0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select your default email theme", [], "Admin.Design.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This won't regenerate email templates, it only sets the default email theme for future generation (when a language is installed for example).", [], "Admin.Design.Help")], "method"), "html", null, true);
        // line 43
        echo "
              </label>
              <div class=\"col-sm\">
                ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["mailThemeConfigurationForm"] ?? $this->getContext($context, "mailThemeConfigurationForm")), "configuration", []), "defaultTheme", []), 'errors');
        echo "
                ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["mailThemeConfigurationForm"] ?? $this->getContext($context, "mailThemeConfigurationForm")), "configuration", []), "defaultTheme", []), 'widget');
        echo "
              </div>
            </div>
          </div>
        </div>

        <div class=\"card-footer\">
          <div class=\"d-flex justify-content-end\">
            <button class=\"btn btn-primary\">
              <span>";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</span>
            </button>
          </div>
        </div>
      </div>
      ";
        // line 61
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["mailThemeConfigurationForm"] ?? $this->getContext($context, "mailThemeConfigurationForm")), 'form_end');
        echo "
    </div>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/configuration_form.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  110 => 61,  102 => 56,  90 => 47,  86 => 46,  81 => 43,  79 => 40,  68 => 32,  62 => 29,  58 => 27,  40 => 26,  37 => 25,);
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

{% block mailThemeConfigurationFormBlock %}
  <div class=\"row justify-content-center\">
    <div class=\"col-xl-10\">
      {{ form_start(mailThemeConfigurationForm, {'action': path('admin_mail_theme_save_configuration')}) }}
      <div class=\"card\">
        <h3 class=\"card-header\">
          <i class=\"material-icons\">settings</i> {{ 'Configuration'|trans({}, 'Admin.Global') }}
        </h3>

        <div class=\"card-block row\">
          <div class=\"card-text\">

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                {{ ps.label_with_help(
                  ('Select your default email theme'|trans({}, 'Admin.Design.Feature')),
                  ('This won\\'t regenerate email templates, it only sets the default email theme for future generation (when a language is installed for example).'|trans({}, 'Admin.Design.Help'))
                ) }}
              </label>
              <div class=\"col-sm\">
                {{ form_errors(mailThemeConfigurationForm.configuration.defaultTheme) }}
                {{ form_widget(mailThemeConfigurationForm.configuration.defaultTheme) }}
              </div>
            </div>
          </div>
        </div>

        <div class=\"card-footer\">
          <div class=\"d-flex justify-content-end\">
            <button class=\"btn btn-primary\">
              <span>{{ 'Save'|trans({}, 'Admin.Actions') }}</span>
            </button>
          </div>
        </div>
      </div>
      {{ form_end(mailThemeConfigurationForm) }}
    </div>
  </div>
{% endblock %}
", "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/configuration_form.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\MailTheme\\Blocks\\configuration_form.html.twig");
    }
}
