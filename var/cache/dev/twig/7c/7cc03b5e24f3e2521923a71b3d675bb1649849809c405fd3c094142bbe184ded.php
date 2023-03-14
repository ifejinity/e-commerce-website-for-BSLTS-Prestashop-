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

/* @PrestaShop/Admin/Improve/Design/MailTheme/Blocks/generate_mails_form.html.twig */
class __TwigTemplate_f8157cf43e6fe96a32779829ab7acd38bdfdf92b6cd83927b22253430df093f2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'generateMailsFormBlock' => [$this, 'block_generateMailsFormBlock'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/generate_mails_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/generate_mails_form.html.twig"));

        // line 25
        echo "
";
        // line 26
        $this->displayBlock('generateMailsFormBlock', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_generateMailsFormBlock($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "generateMailsFormBlock"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "generateMailsFormBlock"));

        // line 27
        echo "<div class=\"row justify-content-center\">
  <div class=\"col-xl-10\">
    ";
        // line 29
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mail_theme_generate")]);
        echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">email</i> ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Generate emails", [], "Admin.Design.Feature"), "html", null, true);
        echo "
      </h3>

      <div class=\"card-block row\">
        <div class=\"card-text\">

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select your email theme", [], "Admin.Design.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "mailTheme", []), 'errors');
        echo "
              ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "mailTheme", []), 'widget');
        echo "
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select your language", [], "Admin.International.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "language", []), 'errors');
        echo "
              ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "language", []), 'widget');
        echo "
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? $this->getContext($context, "ps")), "label_with_help", [0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select the theme you want to overwrite", [], "Admin.Design.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("PrestaShop's email templates are stored in the \"mails\" folder, but they can be overridden by your current theme's own \"mails\" folder. Using this option enables to overwrite emails from your current theme.", [], "Admin.Design.Help")], "method"), "html", null, true);
        // line 63
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "theme", []), 'errors');
        echo "
              ";
        // line 67
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "theme", []), 'widget');
        echo "
              ";
        // line 68
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "theme", []), "vars", []), "disabled", [])) {
            // line 69
            echo "              <small class=\"form-text\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No emails were detected in any theme folder so this field is disabled.", [], "Admin.Design.Help"), "html", null, true);
            echo "</small>
              ";
        }
        // line 71
        echo "            </div>
          </div>

          <div class=\"form-group row\">
            ";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? $this->getContext($context, "ps")), "label_with_help", [0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Overwrite templates", [], "Admin.Design.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("By default, existing email template files are not modified to avoid deleting any modification you may have done. Enable this option to force the overwrite.", [], "Admin.Design.Help")], "method"), "html", null, true);
        // line 78
        echo "
            <div class=\"col-sm\">
              ";
        // line 80
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "overwrite", []), 'errors');
        echo "
              ";
        // line 81
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), "overwrite", []), 'widget');
        echo "
            </div>
          </div>

        </div>
      </div>

      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\">
            <i class=\"material-icons\">email</i>
            <span>";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Generate emails", [], "Admin.Actions"), "html", null, true);
        echo "</span>
          </button>
        </div>
      </div>
    </div>
    ";
        // line 97
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generateMailsForm"] ?? $this->getContext($context, "generateMailsForm")), 'form_end');
        echo "
  </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/generate_mails_form.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  178 => 97,  170 => 92,  156 => 81,  152 => 80,  148 => 78,  146 => 75,  140 => 71,  134 => 69,  132 => 68,  128 => 67,  124 => 66,  119 => 63,  117 => 60,  108 => 54,  104 => 53,  98 => 50,  89 => 44,  85 => 43,  79 => 40,  68 => 32,  62 => 29,  58 => 27,  40 => 26,  37 => 25,);
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

{% block generateMailsFormBlock %}
<div class=\"row justify-content-center\">
  <div class=\"col-xl-10\">
    {{ form_start(generateMailsForm, {'action': path('admin_mail_theme_generate')}) }}
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">email</i> {{ 'Generate emails'|trans({}, 'Admin.Design.Feature') }}
      </h3>

      <div class=\"card-block row\">
        <div class=\"card-text\">

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Select your email theme'|trans({}, 'Admin.Design.Feature') }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(generateMailsForm.mailTheme) }}
              {{ form_widget(generateMailsForm.mailTheme) }}
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ 'Select your language'|trans({}, 'Admin.International.Feature') }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(generateMailsForm.language) }}
              {{ form_widget(generateMailsForm.language) }}
            </div>
          </div>

          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              {{ ps.label_with_help(
                ('Select the theme you want to overwrite'|trans({}, 'Admin.Design.Feature')),
              ('PrestaShop\\'s email templates are stored in the \"mails\" folder, but they can be overridden by your current theme\\'s own \"mails\" folder. Using this option enables to overwrite emails from your current theme.'|trans({}, 'Admin.Design.Help'))
              ) }}
            </label>
            <div class=\"col-sm\">
              {{ form_errors(generateMailsForm.theme) }}
              {{ form_widget(generateMailsForm.theme) }}
              {% if generateMailsForm.theme.vars.disabled %}
              <small class=\"form-text\">{{ 'No emails were detected in any theme folder so this field is disabled.'|trans({}, 'Admin.Design.Help') }}</small>
              {% endif %}
            </div>
          </div>

          <div class=\"form-group row\">
            {{ ps.label_with_help(
              ('Overwrite templates'|trans({}, 'Admin.Design.Feature')),
            ('By default, existing email template files are not modified to avoid deleting any modification you may have done. Enable this option to force the overwrite.'|trans({}, 'Admin.Design.Help'))
            ) }}
            <div class=\"col-sm\">
              {{ form_errors(generateMailsForm.overwrite) }}
              {{ form_widget(generateMailsForm.overwrite) }}
            </div>
          </div>

        </div>
      </div>

      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\">
            <i class=\"material-icons\">email</i>
            <span>{{ 'Generate emails'|trans({}, 'Admin.Actions') }}</span>
          </button>
        </div>
      </div>
    </div>
    {{ form_end(generateMailsForm) }}
  </div>
</div>
{% endblock %}
", "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/generate_mails_form.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\MailTheme\\Blocks\\generate_mails_form.html.twig");
    }
}
