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

/* database/structure/overhead.twig */
class __TwigTemplate_15bb848d07ce2ea4e96448b0579fca67273149dbd7c2d0f9e8028784eb64441d extends Template
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
        echo "<a href=\"";
        echo PhpMyAdmin\Url::getFromRoute("/table/structure", ($context["table_url_params"] ?? null));
        echo "#showusage\" id=\"overhead\">
  <span>";
        // line 2
        echo twig_escape_filter($this->env, ($context["formatted_overhead"] ?? null), "html", null, true);
        echo "</span>&nbsp;
  <span class=\"unit\">";
        // line 3
        echo twig_escape_filter($this->env, ($context["overhead_unit"] ?? null), "html", null, true);
        echo "</span>
</a>
";
    }

    public function getTemplateName()
    {
        return "database/structure/overhead.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/structure/overhead.twig", "/home/ictfjcom/public_html/BIS_DEV/core/libs/nudb/templates/database/structure/overhead.twig");
    }
}
