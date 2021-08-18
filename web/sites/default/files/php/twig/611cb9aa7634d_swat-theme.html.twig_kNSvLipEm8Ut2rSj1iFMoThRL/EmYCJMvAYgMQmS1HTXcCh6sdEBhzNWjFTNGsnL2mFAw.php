<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/swat/templates/swat-theme.html.twig */
class __TwigTemplate_1d604cd464150eebd98dcb5c3c40952024e83918b6f3754220c87ca8d42caead extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("swat/swat"), "html", null, true);
        echo "
<div class=\"swat-content\">
  <div class=\"swat-form\">
    ";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 4, $this->source), "html", null, true);
        echo "
  </div>
  ";
        // line 6
        if (($context["items"] ?? null)) {
            // line 7
            echo "    <div class=\"db-show\">
      ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 9
                echo "        <div class=\"module_body\">
          <div class=\"feedback_content\">
            <div class=\"user-information\">
              <div class=\"user-avatar-photo\">";
                // line 12
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "ava", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
                echo "</div>
              <div class=\"creator-information\">
                <div class=\"user-name\">";
                // line 14
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "name", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                echo "</div>
                <div class=\"feedback-add-time\">";
                // line 15
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "time", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
                echo "</div>
              </div>
            </div>
            <div class=\"feedback-information\">
              <div class=\"feedback\">";
                // line 19
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "feedback", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
                echo "</div>
              <a target=\"_blank\" href=\"";
                // line 20
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "uri", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "photo", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                echo "</a>
            </div>
            <div class=\"contact-information\">
              <div class=\"user-email\">
                <a href=\"mailto:";
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "email", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "email", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                echo "</a>
              </div>
              <div class=\"user-phone\">
                <a href=\"tel:+";
                // line 27
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "phone", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "phone", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "</a>
              </div>
            </div>
          </div>
          ";
                // line 31
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administrator"], "method", false, false, true, 31)) {
                    // line 32
                    echo "            <div class=\"buttons\">
              <a class=\"btn delete use-ajax\" data-dialog-type=\"modal\"
                 data-dialog-options=\"{&quot;width&quot;:400}\"
                 href=\"/admin/content/swats/manage/";
                    // line 35
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "swat", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
                    echo "/delete?destination=";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("response_form.content"));
                    echo "\">Delete</a>
              <a class=\"btn edit use-ajax\" data-dialog-type=\"modal\"
                 data-dialog-options=\"{&quot;width&quot;:400}\"
                 href=\"/admin/content/swats/manage/";
                    // line 38
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["s"], "swat", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                    echo "?destination=";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("response_form.content"));
                    echo "\">Edit</a>
            </div>
          ";
                }
                // line 41
                echo "        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "    </div>
  ";
        }
        // line 45
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/swat/templates/swat-theme.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 45,  140 => 43,  133 => 41,  125 => 38,  117 => 35,  112 => 32,  110 => 31,  101 => 27,  93 => 24,  84 => 20,  80 => 19,  73 => 15,  69 => 14,  64 => 12,  59 => 9,  55 => 8,  52 => 7,  50 => 6,  45 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/swat/templates/swat-theme.html.twig", "/var/www/web/modules/custom/swat/templates/swat-theme.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 6, "for" => 8);
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 1, "path" => 35);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape'],
                ['attach_library', 'path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
