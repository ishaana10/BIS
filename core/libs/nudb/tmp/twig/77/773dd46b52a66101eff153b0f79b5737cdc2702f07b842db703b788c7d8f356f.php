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

/* database/triggers/row.twig */
class __TwigTemplate_41502248f5fb5c050edddde497d009f4ceb6c4e83d2ad65e039540352dc94e23 extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<tr";
        if ( !twig_test_empty(($context["row_class"] ?? null))) {
            echo " class=\"";
            echo twig_escape_filter($this->env, ($context["row_class"] ?? null), "html", null, true);
            echo "\"";
        }
        echo ">
  <td>
    <input type=\"checkbox\" class=\"checkall\" name=\"item_name[]\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["trigger"] ?? null), "name", [], "any", false, false, false, 3), "html", null, true);
        echo "\">
  </td>
  <td>
    <span class='drop_sql hide'>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["trigger"] ?? null), "drop", [], "any", false, false, false, 6), "html", null, true);
        echo "</span>
    <strong>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["trigger"] ?? null), "name", [], "any", false, false, false, 7), "html", null, true);
        echo "</strong>
  </td>
  ";
        // line 9
        if (twig_test_empty(($context["table"] ?? null))) {
            // line 10
            echo "    <td>
      <a href=\"";
            // line 11
            echo PhpMyAdmin\Url::getFromRoute("/table/triggers", ["db" => ($context["db"] ?? null), "table" => twig_get_attribute($this->env, $this->source, ($context["trigger"] ?? null), "table", [], "any", false, false, false, 11)]);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["trigger"] ?? null), "table", [], "any", false, false, false, 11), "html", null, true);
            echo "</a>
    </td>
  ";
        }
        // line 14
        echo "  <td>
    ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["trigger"] ?? null), "action_timing", [], "any", false, false, false, 15), "html", null, true);
        echo "
  </td>
  <td>
    ";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["trigger"] ?? null), "event_manipulation", [], "any", false, false, false, 18), "html", null, true);
        echo "
  </td>
  <td>
    ";
        // line 21
        if (($context["has_edit_privilege"] ?? null)) {
            // line 22
            echo "      <a class=\"ajax edit_anchor\" href=\"";
            echo PhpMyAdmin\Url::getFromRoute("/database/triggers", ["db" =>             // line 23
($context["db"] ?? null), "table" =>             // line 24
($context["table"] ?? null), "edit_item" => true, "item_name" => twig_get_attribute($this->env, $this->source,             // line 26
($context["trigger"] ?? null), "name", [], "any", false, false, false, 26)]);
            // line 27
            echo "\">
        ";
            // line 28
            echo PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Edit"));
            echo "
      </a>
    ";
        } else {
            // line 31
            echo "      ";
            echo PhpMyAdmin\Html\Generator::getIcon("bd_edit", _gettext("Edit"));
            echo "
    ";
        }
        // line 33
        echo "  </td>
  <td>
    <a class=\"ajax export_anchor\" href=\"";
        // line 35
        echo PhpMyAdmin\Url::getFromRoute("/database/triggers", ["db" =>         // line 36
($context["db"] ?? null), "table" =>         // line 37
($context["table"] ?? null), "export_item" => true, "item_name" => twig_get_attribute($this->env, $this->source,         // line 39
($context["trigger"] ?? null), "name", [], "any", false, false, false, 39)]);
        // line 40
        echo "\">
      ";
        // line 41
        echo PhpMyAdmin\Html\Generator::getIcon("b_export", _gettext("Export"));
        echo "
    </a>
  </td>
  <td>
    ";
        // line 45
        if (($context["has_drop_privilege"] ?? null)) {
            // line 46
            echo "      ";
            echo PhpMyAdmin\Html\Generator::linkOrButton(PhpMyAdmin\Url::getFromRoute("/sql"), ["db" =>             // line 49
($context["db"] ?? null), "table" =>             // line 50
($context["table"] ?? null), "sql_query" => twig_get_attribute($this->env, $this->source,             // line 51
($context["trigger"] ?? null), "drop", [], "any", false, false, false, 51), "goto" => PhpMyAdmin\Url::getFromRoute("/database/triggers", ["db" =>             // line 52
($context["db"] ?? null)])], PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Drop")), ["class" => "ajax drop_anchor"]);
            // line 56
            echo "
    ";
        } else {
            // line 58
            echo "      ";
            echo PhpMyAdmin\Html\Generator::getIcon("bd_drop", _gettext("Drop"));
            echo "
    ";
        }
        // line 60
        echo "  </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "database/triggers/row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 60,  145 => 58,  141 => 56,  139 => 52,  138 => 51,  137 => 50,  136 => 49,  134 => 46,  132 => 45,  125 => 41,  122 => 40,  120 => 39,  119 => 37,  118 => 36,  117 => 35,  113 => 33,  107 => 31,  101 => 28,  98 => 27,  96 => 26,  95 => 24,  94 => 23,  92 => 22,  90 => 21,  84 => 18,  78 => 15,  75 => 14,  67 => 11,  64 => 10,  62 => 9,  57 => 7,  53 => 6,  47 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/triggers/row.twig", "/home/ictfjcom/public_html/ltkops/core/libs/nudb/templates/database/triggers/row.twig");
    }
}
