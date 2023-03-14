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

/* @CsaGuzzle/Calls/macros.html.twig */
class __TwigTemplate_9def37f415c635431072bb8790e4ca664dc265afd163366fa774ec7fae673cd4 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@CsaGuzzle/Calls/macros.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@CsaGuzzle/Calls/macros.html.twig"));

        // line 32
        echo "
";
        // line 42
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function getrender_headers($__headers__ = null, $__uri__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "headers" => $__headers__,
            "uri" => $__uri__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_headers"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_headers"));

            // line 2
            echo "    <h4>Headers</h4>
    <table>
        <thead>
            <tr>
                <th scope=\"col\" class=\"key\">Header</th>
                <th scope=\"col\">Value</th>
            </tr>
        </thead>
        ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["headers"] ?? $this->getContext($context, "headers")));
            foreach ($context['_seq'] as $context["header"] => $context["values"]) {
                // line 11
                echo "            <tr>
                <td>";
                // line 12
                echo twig_escape_filter($this->env, $context["header"], "html", null, true);
                echo "</td>
                <td>
                    ";
                // line 14
                if ((twig_length_filter($this->env, $context["values"]) > 1)) {
                    // line 15
                    echo "                    <ul>
                        ";
                    // line 16
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["values"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                        // line 17
                        echo "                            <li>";
                        echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                        echo "</li>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 19
                    echo "                    </ul>
                    ";
                } else {
                    // line 21
                    echo "                        ";
                    if (($context["header"] == "X-Debug-Token-Link")) {
                        // line 22
                        echo "                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->shortenUri(($context["uri"] ?? $this->getContext($context, "uri"))), "html", null, true);
                        echo twig_escape_filter($this->env, $this->getAttribute($context["values"], 0, []), "html", null, true);
                        echo "\" target=\"_blank\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["values"], 0, []), "html", null, true);
                        echo "</a>
                        ";
                    } else {
                        // line 24
                        echo "                            ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["values"], 0, []), "html", null, true);
                        echo "
                        ";
                    }
                    // line 26
                    echo "                    ";
                }
                // line 27
                echo "                </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['header'], $context['values'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "    </table>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 33
    public function getrender_body($__body__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "body" => $__body__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_body"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_body"));

            // line 34
            echo "    ";
            if ( !twig_test_empty(($context["body"] ?? $this->getContext($context, "body")))) {
                // line 35
                echo "        <h4>Content</h4>

        ";
                // line 37
                $context["lang"] = $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->detectLang(($context["body"] ?? $this->getContext($context, "body")));
                // line 38
                echo "
        <pre><code class=\"language-";
                // line 39
                echo twig_escape_filter($this->env, ($context["lang"] ?? $this->getContext($context, "lang")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->prettyPrint(($context["body"] ?? $this->getContext($context, "body")), ($context["lang"] ?? $this->getContext($context, "lang"))), "html", null, true);
                echo "</code></pre>
    ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 43
    public function getrender_infos($__info__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "info" => $__info__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_infos"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_infos"));

            // line 44
            echo "    ";
            if ((($context["info"] ?? $this->getContext($context, "info")) && $this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "total_time", []))) {
                // line 45
                echo "        <h4>Time</h4>

        ";
                // line 47
                $context["wait_time"] = (($this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "namelookup_time", []) + $this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "connect_time", [])) + $this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "redirect_time", []));
                // line 48
                echo "        ";
                $context["process_time"] = ($this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "total_time", []) - ($context["wait_time"] ?? $this->getContext($context, "wait_time")));
                // line 49
                echo "
        <table>
            <thead>
                <tr>
                    <th>Measure</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tr>
                <td>Total</td>
                <td>";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->formatDuration($this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "total_time", [])), "html", null, true);
                echo "</td>
            </tr>
            <tr>
                <td>Name lookup</td>
                <td>";
                // line 63
                echo twig_escape_filter($this->env, $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->formatDuration($this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "namelookup_time", [])), "html", null, true);
                echo "</td>
            </tr>
            <tr>
                <td>Connection</td>
                <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->formatDuration($this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "connect_time", [])), "html", null, true);
                echo "</td>
            </tr>
            ";
                // line 69
                if ($this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "redirect_time", [])) {
                    // line 70
                    echo "                <tr>
                    <td>Redirect</td>
                    <td>";
                    // line 72
                    echo twig_escape_filter($this->env, $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->formatDuration($this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "redirect_time", [])), "html", null, true);
                    echo "</td>
                </tr>
            ";
                }
                // line 75
                echo "            <tr>
                <td>Process</td>
                <td>";
                // line 77
                echo twig_escape_filter($this->env, $this->env->getExtension('Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension')->formatDuration(($context["process_time"] ?? $this->getContext($context, "process_time"))), "html", null, true);
                echo "</td>
            </tr>
        </table>

        <div class=\"progress\">
            <div class=\"progress-bar progress-bar-warning\" style=\"width: ";
                // line 82
                echo twig_escape_filter($this->env, ((($context["wait_time"] ?? $this->getContext($context, "wait_time")) / $this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "total_time", [])) * 100), "html", null, true);
                echo "%\">
                <span class=\"sr-only\">Wait</span>
            </div>
            <div class=\"progress-bar progress-bar-success\" style=\"width: ";
                // line 85
                echo twig_escape_filter($this->env, ((($context["process_time"] ?? $this->getContext($context, "process_time")) / $this->getAttribute(($context["info"] ?? $this->getContext($context, "info")), "total_time", [])) * 100), "html", null, true);
                echo "%\">
                <span class=\"sr-only\">Process</span>
            </div>
        </div>
    ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@CsaGuzzle/Calls/macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 85,  305 => 82,  297 => 77,  293 => 75,  287 => 72,  283 => 70,  281 => 69,  276 => 67,  269 => 63,  262 => 59,  250 => 49,  247 => 48,  245 => 47,  241 => 45,  238 => 44,  220 => 43,  194 => 39,  191 => 38,  189 => 37,  185 => 35,  182 => 34,  164 => 33,  142 => 30,  134 => 27,  131 => 26,  125 => 24,  116 => 22,  113 => 21,  109 => 19,  100 => 17,  96 => 16,  93 => 15,  91 => 14,  86 => 12,  83 => 11,  79 => 10,  69 => 2,  50 => 1,  39 => 42,  36 => 32,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% macro render_headers(headers, uri) %}
    <h4>Headers</h4>
    <table>
        <thead>
            <tr>
                <th scope=\"col\" class=\"key\">Header</th>
                <th scope=\"col\">Value</th>
            </tr>
        </thead>
        {% for header, values in headers %}
            <tr>
                <td>{{ header }}</td>
                <td>
                    {% if values|length > 1 %}
                    <ul>
                        {% for value in values %}
                            <li>{{ value }}</li>
                        {% endfor %}
                    </ul>
                    {% else %}
                        {% if header == 'X-Debug-Token-Link' %}
                            <a href=\"{{ uri|csa_guzzle_short_uri }}{{ values.0}}\" target=\"_blank\">{{ values.0 }}</a>
                        {% else %}
                            {{ values.0 }}
                        {% endif %}
                    {% endif %}
                </td>
            </tr>
        {% endfor %}
    </table>
{% endmacro %}

{% macro render_body(body) %}
    {% if body is not empty %}
        <h4>Content</h4>

        {% set lang = csa_guzzle_detect_lang(body) %}

        <pre><code class=\"language-{{ lang }}\">{{ body|csa_guzzle_pretty_print(lang) }}</code></pre>
    {% endif %}
{% endmacro %}

{% macro render_infos(info) %}
    {% if info and info.total_time %}
        <h4>Time</h4>

        {% set wait_time = info.namelookup_time + info.connect_time + info.redirect_time %}
        {% set process_time = info.total_time - wait_time %}

        <table>
            <thead>
                <tr>
                    <th>Measure</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tr>
                <td>Total</td>
                <td>{{ info.total_time|csa_guzzle_format_duration }}</td>
            </tr>
            <tr>
                <td>Name lookup</td>
                <td>{{ info.namelookup_time|csa_guzzle_format_duration }}</td>
            </tr>
            <tr>
                <td>Connection</td>
                <td>{{ info.connect_time|csa_guzzle_format_duration }}</td>
            </tr>
            {% if info.redirect_time %}
                <tr>
                    <td>Redirect</td>
                    <td>{{ info.redirect_time|csa_guzzle_format_duration }}</td>
                </tr>
            {% endif %}
            <tr>
                <td>Process</td>
                <td>{{ process_time | csa_guzzle_format_duration }}</td>
            </tr>
        </table>

        <div class=\"progress\">
            <div class=\"progress-bar progress-bar-warning\" style=\"width: {{ wait_time/info.total_time * 100 }}%\">
                <span class=\"sr-only\">Wait</span>
            </div>
            <div class=\"progress-bar progress-bar-success\" style=\"width: {{ process_time/info.total_time * 100 }}%\">
                <span class=\"sr-only\">Process</span>
            </div>
        </div>
    {% endif %}
{% endmacro %}
", "@CsaGuzzle/Calls/macros.html.twig", "C:\\wamp64\\www\\prestashop\\vendor\\csa\\guzzle-bundle\\src\\Resources\\views\\Calls\\macros.html.twig");
    }
}
