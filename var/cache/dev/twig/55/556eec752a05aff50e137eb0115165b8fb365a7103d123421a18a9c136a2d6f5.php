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

/* @PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig */
class __TwigTemplate_4f0c05e0e6e3ddba28b10cc9b85e51862846787be40995953510397ecf4f403c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'employee_addons_connect' => [$this, 'block_employee_addons_connect'],
            'employee_form' => [$this, 'block_employee_form'],
            'employee_form_rest' => [$this, 'block_employee_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig"));

        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig", 26);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('employee_addons_connect', $context, $blocks);
        // line 32
        echo "
";
        // line 33
        $this->displayBlock('employee_form', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 29
    public function block_employee_addons_connect($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_addons_connect"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_addons_connect"));

        // line 30
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/modal_addons_connect.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig", 30)->display(twig_array_merge($context, ["level" => ($context["level"] ?? $this->getContext($context, "level")), "errorMessage" => ($context["errorMessage"] ?? $this->getContext($context, "errorMessage"))]));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 33
    public function block_employee_form($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_form"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_form"));

        // line 34
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), 'form_start');
        echo "
  <div class=\"card\">
    <h3 class=\"card-header\">
      ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Employees", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
    </h3>
    <div class=\"card-block row\">
      <div class=\"card-text\">
        ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), 'errors');
        echo "

        ";
        // line 43
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "firstname", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("First name", [], "Admin.Global")]);
        // line 45
        echo "

        ";
        // line 47
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "lastname", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Last name", [], "Admin.Global")]);
        // line 49
        echo "

        <div class=\"form-group row\">
          <label class=\"form-control-label\"></label>
          <div class=\"col-sm\">
            <a href=\"https://www.prestashop.com/forums/\" target=\"_blank\">
              <img class=\"img-thumbnail clickable-avatar\" src=\"";
        // line 55
        echo twig_escape_filter($this->env, ($context["avatarUrl"] ?? $this->getContext($context, "avatarUrl")), "html", null, true);
        echo "\" alt=\"\">
            </a>
          </div>
        </div>

        <div class=\"form-group row\">
          <label class=\"form-control-label\"></label>
          <div class=\"col-sm\">
            <div class=\"alert alert-info\" role=\"alert\">
              <p class=\"alert-text\">
                ";
        // line 65
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your avatar in PrestaShop 1.7.x is your profile picture on %url%. To change your avatar, log in to PrestaShop.com with your email %email% and follow the on-screen instructions.", [], "Admin.Advparameters.Help"), ["%url%" => "<a href=\"https://www.prestashop.com/forums/\" class=\"alert-link\" target=\"_blank\">PrestaShop.com</a>", "%email%" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 68
($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "email", []), "vars", []), "value", [])]);
        // line 70
        echo "
              </p>
            </div>
          </div>
        </div>

        ";
        // line 76
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "email", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Email address", [], "Admin.Global")]);
        // line 78
        echo "

        ";
        // line 80
        $context["passwordHelpMessage"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password should be at least %num% characters long.", ["%num%" => 8], "Admin.Advparameters.Help");
        // line 81
        echo "
        ";
        // line 82
        if (($context["isRestrictedAccess"] ?? $this->getContext($context, "isRestrictedAccess"))) {
            // line 83
            echo "            ";
            $context["oldPasswordVars"] = twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "old_password", []), "vars", []), (((isset($context["old_password"]) || array_key_exists("old_password", $context))) ? (_twig_default_filter(($context["old_password"] ?? $this->getContext($context, "old_password")), [])) : ([])));
            // line 84
            echo "            ";
            $context["newPasswordFirstVars"] = twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "new_password", []), "children", []), "first", []), "vars", []), (($this->getAttribute(($context["new_password"] ?? null), "first_options", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["new_password"] ?? null), "first_options", []), [])) : ([])));
            // line 85
            echo "            ";
            $context["newPasswordSecondVars"] = twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "new_password", []), "children", []), "second", []), "vars", []), (($this->getAttribute(($context["new_password"] ?? null), "second_options", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["new_password"] ?? null), "second_options", []), [])) : ([])));
            // line 86
            echo "
            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                ";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password", [], "Admin.Global"), "html", null, true);
            echo "
              </label>
              <div class=\"col-sm\">
                ";
            // line 93
            echo "                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "change_password_button", []), 'widget', ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Change password...", [], "messages"), "attr" => ["class" => "btn-outline-secondary js-change-password"]]);
            // line 98
            echo "

                <div class=\"card card-body js-change-password-block d-none\">
                  ";
            // line 102
            echo "                  ";
            echo $context["ps"]->getform_group_row($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "old_password", []), ($context["oldPasswordVars"] ?? $this->getContext($context, "oldPasswordVars")), ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Current password", [], "messages"), "required" => true]);
            // line 105
            echo "

                  ";
            // line 108
            echo "                  <div class=\"form-group row\">
                      ";
            // line 109
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("New password", [], "messages"), ($context["passwordHelpMessage"] ?? $this->getContext($context, "passwordHelpMessage")), "", $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "new_password", []), "children", []), "first", []), "vars", []), "id", []), true);
            echo "
                    <div class=\"col-sm\">
                      ";
            // line 111
            echo $context["ps"]->getform_widget_with_error($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "new_password", []), "children", []), "first", []), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "new_password", []), "children", []), "first", []), "vars", []));
            echo "
                    </div>
                  </div>

                  ";
            // line 116
            echo "                  ";
            // line 117
            echo "                  ";
            echo $context["ps"]->getform_group_row($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "new_password", []), "children", []), "second", []), ($context["newPasswordSecondVars"] ?? $this->getContext($context, "newPasswordSecondVars")), ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Confirm password", [], "messages"), "help" => "", "required" => true]);
            // line 121
            echo "

                  <div class=\"form-group row\">
                    <label class=\"form-control-label\"></label>
                    <div class=\"col-sm\">
                      ";
            // line 126
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "generated_password", []), 'widget');
            echo "
                    </div>
                    <div class=\"col-sm\">
                      ";
            // line 129
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "generate_password_button", []), 'widget', ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Generate password", [], "messages"), "attr" => ["class" => "btn-outline-secondary"]]);
            // line 134
            echo "
                    </div>
                  </div>

                  ";
            // line 138
            echo $context["ps"]->getform_group_row($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "change_password", []), "cancel_button", []), ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "attr" => ["class" => "btn-outline-secondary js-change-password-cancel"]]);
            // line 143
            echo "

                  ";
            // line 146
            echo "                  <div class=\"js-password-strength-feedback d-none\">
                    <span class=\"strength-low\">";
            // line 147
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid", [], "messages"), "html", null, true);
            echo "</span>
                    <span class=\"strength-medium\">";
            // line 148
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Okay", [], "messages"), "html", null, true);
            echo "</span>
                    <span class=\"strength-high\">";
            // line 149
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Good", [], "messages"), "html", null, true);
            echo "</span>
                    <span class=\"strength-extreme\">";
            // line 150
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Fabulous", [], "messages"), "html", null, true);
            echo "</span>
                  </div>
                </div>
              </div>
            </div>
        ";
        } else {
            // line 156
            echo "          ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "password", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password", [], "Admin.Global"), "help" =>             // line 158
($context["passwordHelpMessage"] ?? $this->getContext($context, "passwordHelpMessage"))]);
            // line 159
            echo "
        ";
        }
        // line 161
        echo "
        ";
        // line 162
        if ((($context["isRestrictedAccess"] ?? $this->getContext($context, "isRestrictedAccess")) && ($context["showAddonsConnectButton"] ?? $this->getContext($context, "showAddonsConnectButton")))) {
            // line 163
            echo "          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              PrestaShop Addons
            </label>
            <div class=\"col-sm\">
              ";
            // line 168
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "prestashop_addons", []), "vars", []), "is_addons_connected", [])) {
                // line 169
                echo "                <p>
                  <i class=\"material-icons\">account_circle</i>
                  ";
                // line 171
                echo twig_escape_filter($this->env, twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are currently connected as %username%", [], "Admin.Advparameters.Feature"), ["%username%" => $this->getAttribute($this->getAttribute($this->getAttribute(                // line 173
($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "prestashop_addons", []), "vars", []), "addons_username", [])]), "html", null, true);
                // line 174
                echo "
                </p>
              ";
            }
            // line 177
            echo "
              <div>
                ";
            // line 179
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "prestashop_addons", []), "vars", []), "is_addons_connected", [])) {
                // line 180
                echo "                  ";
                list($context["label"], $context["target"]) =                 [$this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sign out from PrestaShop Addons", [], "Admin.Advparameters.Feature"), "#module-modal-addons-logout"];
                // line 184
                echo "                ";
            } else {
                // line 185
                echo "                  ";
                list($context["label"], $context["target"]) =                 [$this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sign in", [], "Admin.Advparameters.Feature"), "#module-modal-addons-connect"];
                // line 189
                echo "                ";
            }
            // line 190
            echo "
                ";
            // line 191
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "prestashop_addons", []), 'widget', ["attr" => ["class" => "btn-outline-secondary", "data-toggle" => "modal", "data-target" =>             // line 195
($context["target"] ?? $this->getContext($context, "target"))], "label" =>             // line 197
($context["label"] ?? $this->getContext($context, "label"))]);
            // line 198
            echo "
              </div>
            </div>
          </div>
        ";
        }
        // line 203
        echo "
        ";
        // line 204
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "optin", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Subscribe to PrestaShop newsletter", [], "Admin.Advparameters.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("PrestaShop can provide you with guidance on a regular basis by sending you tips on how to optimize the management of your store which will help you grow your business. If you do not wish to receive these tips, you can disable this option.", [], "Admin.Advparameters.Help")]);
        // line 207
        echo "

        ";
        // line 209
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "default_page", []), ["attr" => ["data-minimumResultsForSearch" => "7", "data-toggle" => "select2"]], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default page", [], "Admin.Advparameters.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This page will be displayed just after login.", [], "Admin.Advparameters.Help")]);
        // line 212
        echo "

        ";
        // line 214
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "language", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Language", [], "Admin.Global")]);
        // line 216
        echo "

        ";
        // line 218
        if ( !($context["isRestrictedAccess"] ?? $this->getContext($context, "isRestrictedAccess"))) {
            // line 219
            echo "          ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "active", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Active", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allow or disallow this employee to log in to the Admin panel.", [], "Admin.Advparameters.Help")]);
            // line 222
            echo "

          ";
            // line 224
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "profile", []), ["attr" => ["data-admin-profile" =>             // line 226
($context["superAdminProfileId"] ?? $this->getContext($context, "superAdminProfileId")), "data-get-tabs-url" =>             // line 227
($context["getTabsUrl"] ?? $this->getContext($context, "getTabsUrl"))]], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Permission profile", [], "Admin.Advparameters.Feature")]);
            // line 231
            echo "

          ";
            // line 233
            if ($this->getAttribute(($context["employeeForm"] ?? null), "shop_association", [], "any", true, true)) {
                // line 234
                echo "            ";
                echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), "shop_association", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop association", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select the shops the employee is allowed to access.", [], "Admin.Advparameters.Help")]);
                // line 237
                echo "
          ";
            }
            // line 239
            echo "        ";
        }
        // line 240
        echo "
        ";
        // line 241
        $this->displayBlock('employee_form_rest', $context, $blocks);
        // line 244
        echo "      </div>
    </div>
    <div class=\"card-footer\">
      <a href=\"";
        // line 247
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_employees_index");
        echo "\" class=\"btn btn-outline-secondary\">
        ";
        // line 248
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <button class=\"btn btn-primary float-right\">
        ";
        // line 251
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>
    </div>
  </div>
  ";
        // line 255
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), 'form_end');
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 241
    public function block_employee_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "employee_form_rest"));

        // line 242
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["employeeForm"] ?? $this->getContext($context, "employeeForm")), 'rest');
        echo "
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  433 => 242,  424 => 241,  412 => 255,  405 => 251,  399 => 248,  395 => 247,  390 => 244,  388 => 241,  385 => 240,  382 => 239,  378 => 237,  375 => 234,  373 => 233,  369 => 231,  367 => 227,  366 => 226,  365 => 224,  361 => 222,  358 => 219,  356 => 218,  352 => 216,  350 => 214,  346 => 212,  344 => 209,  340 => 207,  338 => 204,  335 => 203,  328 => 198,  326 => 197,  325 => 195,  324 => 191,  321 => 190,  318 => 189,  315 => 185,  312 => 184,  309 => 180,  307 => 179,  303 => 177,  298 => 174,  296 => 173,  295 => 171,  291 => 169,  289 => 168,  282 => 163,  280 => 162,  277 => 161,  273 => 159,  271 => 158,  269 => 156,  260 => 150,  256 => 149,  252 => 148,  248 => 147,  245 => 146,  241 => 143,  239 => 138,  233 => 134,  231 => 129,  225 => 126,  218 => 121,  215 => 117,  213 => 116,  206 => 111,  201 => 109,  198 => 108,  194 => 105,  191 => 102,  186 => 98,  183 => 93,  177 => 89,  172 => 86,  169 => 85,  166 => 84,  163 => 83,  161 => 82,  158 => 81,  156 => 80,  152 => 78,  150 => 76,  142 => 70,  140 => 68,  139 => 65,  126 => 55,  118 => 49,  116 => 47,  112 => 45,  110 => 43,  105 => 41,  98 => 37,  91 => 34,  82 => 33,  71 => 30,  62 => 29,  52 => 33,  49 => 32,  47 => 29,  44 => 28,  42 => 26,  39 => 25,);
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

{% import '@PrestaShop/Admin/macros.html.twig' as ps %}
{% trans_default_domain 'Admin.Advparameters.Feature' %}

{% block employee_addons_connect %}
  {% include '@PrestaShop/Admin/Module/Includes/modal_addons_connect.html.twig' with { 'level' : level, 'errorMessage' : errorMessage } %}
{% endblock %}

{% block employee_form %}
  {{ form_start(employeeForm) }}
  <div class=\"card\">
    <h3 class=\"card-header\">
      {{ 'Employees'|trans }}
    </h3>
    <div class=\"card-block row\">
      <div class=\"card-text\">
        {{ form_errors(employeeForm) }}

        {{ ps.form_group_row(employeeForm.firstname, {}, {
          'label': 'First name'|trans({}, 'Admin.Global')
        }) }}

        {{ ps.form_group_row(employeeForm.lastname, {}, {
          'label': 'Last name'|trans({}, 'Admin.Global')
        }) }}

        <div class=\"form-group row\">
          <label class=\"form-control-label\"></label>
          <div class=\"col-sm\">
            <a href=\"https://www.prestashop.com/forums/\" target=\"_blank\">
              <img class=\"img-thumbnail clickable-avatar\" src=\"{{ avatarUrl }}\" alt=\"\">
            </a>
          </div>
        </div>

        <div class=\"form-group row\">
          <label class=\"form-control-label\"></label>
          <div class=\"col-sm\">
            <div class=\"alert alert-info\" role=\"alert\">
              <p class=\"alert-text\">
                {{ 'Your avatar in PrestaShop 1.7.x is your profile picture on %url%. To change your avatar, log in to PrestaShop.com with your email %email% and follow the on-screen instructions.'|trans({}, 'Admin.Advparameters.Help')
                    |replace({
                      '%url%': '<a href=\"https://www.prestashop.com/forums/\" class=\"alert-link\" target=\"_blank\">PrestaShop.com</a>',
                      '%email%': employeeForm.email.vars.value
                    })|raw
                }}
              </p>
            </div>
          </div>
        </div>

        {{ ps.form_group_row(employeeForm.email, {}, {
          'label': 'Email address'|trans({}, 'Admin.Global')
        }) }}

        {% set passwordHelpMessage = 'Password should be at least %num% characters long.'|trans({ '%num%': 8 }, 'Admin.Advparameters.Help') %}

        {% if isRestrictedAccess %}
            {% set oldPasswordVars = employeeForm.change_password.old_password.vars|merge(old_password|default({})) %}
            {% set newPasswordFirstVars = employeeForm.change_password.new_password.children.first.vars|merge(new_password.first_options|default({})) %}
            {% set newPasswordSecondVars = employeeForm.change_password.new_password.children.second.vars|merge(new_password.second_options|default({})) %}

            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                {{ 'Password'|trans({}, 'Admin.Global') }}
              </label>
              <div class=\"col-sm\">
                {# \"Change password\" button #}
                {{ form_widget(employeeForm.change_password.change_password_button, {
                  label: 'Change password...'|trans({}, 'messages'),
                  attr: {
                    class: 'btn-outline-secondary js-change-password',
                  }
                }) }}

                <div class=\"card card-body js-change-password-block d-none\">
                  {# Current password input #}
                  {{ ps.form_group_row(employeeForm.change_password.old_password, oldPasswordVars, {
                    label: 'Current password'|trans({}, 'messages'),
                    required: true,
                  }) }}

                  {# New password first input #}
                  <div class=\"form-group row\">
                      {{ ps.label_with_help('New password'|trans({}, 'messages'), passwordHelpMessage, '', employeeForm.change_password.new_password.children.first.vars.id, true) }}
                    <div class=\"col-sm\">
                      {{ ps.form_widget_with_error(employeeForm.change_password.new_password.children.first, employeeForm.change_password.new_password.children.first.vars) }}
                    </div>
                  </div>

                  {# New password second input (confirmation) #}
                  {# Empty help text needed to render the text container for validation feedback messages #}
                  {{ ps.form_group_row(employeeForm.change_password.new_password.children.second, newPasswordSecondVars, {
                    label: 'Confirm password'|trans({}, 'messages'),
                    help: '',
                    required: true,
                  }) }}

                  <div class=\"form-group row\">
                    <label class=\"form-control-label\"></label>
                    <div class=\"col-sm\">
                      {{ form_widget(employeeForm.change_password.generated_password) }}
                    </div>
                    <div class=\"col-sm\">
                      {{ form_widget(employeeForm.change_password.generate_password_button, {
                        label: 'Generate password'|trans({}, 'messages'),
                        attr: {
                          class: 'btn-outline-secondary',
                        }
                      }) }}
                    </div>
                  </div>

                  {{ ps.form_group_row(employeeForm.change_password.cancel_button, {
                    label: 'Cancel'|trans({}, 'Admin.Actions'),
                    attr: {
                      class: 'btn-outline-secondary js-change-password-cancel',
                    }
                  }) }}

                  {# Password strength feedback messages - used in JS #}
                  <div class=\"js-password-strength-feedback d-none\">
                    <span class=\"strength-low\">{{ 'Invalid'|trans({}, 'messages') }}</span>
                    <span class=\"strength-medium\">{{ 'Okay'|trans({}, 'messages') }}</span>
                    <span class=\"strength-high\">{{ 'Good'|trans({}, 'messages') }}</span>
                    <span class=\"strength-extreme\">{{ 'Fabulous'|trans({}, 'messages') }}</span>
                  </div>
                </div>
              </div>
            </div>
        {% else %}
          {{ ps.form_group_row(employeeForm.password, {}, {
            'label': 'Password'|trans({}, 'Admin.Global'),
            'help': passwordHelpMessage,
          }) }}
        {% endif %}

        {% if isRestrictedAccess and showAddonsConnectButton %}
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              PrestaShop Addons
            </label>
            <div class=\"col-sm\">
              {% if employeeForm.prestashop_addons.vars.is_addons_connected %}
                <p>
                  <i class=\"material-icons\">account_circle</i>
                  {{ 'You are currently connected as %username%'
                        |trans({}, 'Admin.Advparameters.Feature')
                        |replace({ '%username%': employeeForm.prestashop_addons.vars.addons_username })
                  }}
                </p>
              {% endif %}

              <div>
                {% if employeeForm.prestashop_addons.vars.is_addons_connected %}
                  {% set label, target =
                    'Sign out from PrestaShop Addons'|trans({}, 'Admin.Advparameters.Feature'),
                    '#module-modal-addons-logout'
                  %}
                {% else %}
                  {% set label, target =
                    'Sign in'|trans({}, 'Admin.Advparameters.Feature'),
                    '#module-modal-addons-connect'
                  %}
                {% endif %}

                {{ form_widget(employeeForm.prestashop_addons, {
                  attr: {
                    'class': 'btn-outline-secondary',
                    'data-toggle': 'modal',
                    'data-target': target,
                  },
                  label: label,
                }) }}
              </div>
            </div>
          </div>
        {% endif %}

        {{ ps.form_group_row(employeeForm.optin, {}, {
          'label': 'Subscribe to PrestaShop newsletter'|trans,
          'help': 'PrestaShop can provide you with guidance on a regular basis by sending you tips on how to optimize the management of your store which will help you grow your business. If you do not wish to receive these tips, you can disable this option.'|trans({}, 'Admin.Advparameters.Help')
        }) }}

        {{ ps.form_group_row(employeeForm.default_page, {'attr': {'data-minimumResultsForSearch': '7', 'data-toggle': 'select2'}}, {
          'label': 'Default page'|trans,
          'help': 'This page will be displayed just after login.'|trans({}, 'Admin.Advparameters.Help')
        }) }}

        {{ ps.form_group_row(employeeForm.language, {}, {
          'label': 'Language'|trans({}, 'Admin.Global')
        }) }}

        {% if not isRestrictedAccess %}
          {{ ps.form_group_row(employeeForm.active, {}, {
            'label': 'Active'|trans({}, 'Admin.Global'),
            'help': 'Allow or disallow this employee to log in to the Admin panel.'|trans({}, 'Admin.Advparameters.Help')
          }) }}

          {{ ps.form_group_row(employeeForm.profile, {
            'attr': {
              'data-admin-profile': superAdminProfileId,
              'data-get-tabs-url': getTabsUrl,
            }
          }, {
            'label': 'Permission profile'|trans({}, 'Admin.Advparameters.Feature')
          }) }}

          {% if employeeForm.shop_association is defined %}
            {{ ps.form_group_row(employeeForm.shop_association, {}, {
              'label': 'Shop association'|trans({}, 'Admin.Global'),
              'help': 'Select the shops the employee is allowed to access.'|trans({}, 'Admin.Advparameters.Help')
            }) }}
          {% endif %}
        {% endif %}

        {% block employee_form_rest %}
          {{ form_rest(employeeForm) }}
        {% endblock %}
      </div>
    </div>
    <div class=\"card-footer\">
      <a href=\"{{ path('admin_employees_index') }}\" class=\"btn btn-outline-secondary\">
        {{ 'Cancel'|trans({}, 'Admin.Actions') }}
      </a>
      <button class=\"btn btn-primary float-right\">
        {{ 'Save'|trans({}, 'Admin.Actions') }}
      </button>
    </div>
  </div>
  {{ form_end(employeeForm) }}
{% endblock %}
", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\AdvancedParameters\\Employee\\Blocks\\form.html.twig");
    }
}
