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

/* table/structure/display_structure.twig */
class __TwigTemplate_758a2befa71fccb0b11f35ab975ef4ca76e467ffc40aa17d12c9e9ffe13b7843 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "table/page_with_secondary_tabs.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("table/page_with_secondary_tabs.twig", "table/structure/display_structure.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<h1 class=\"d-none d-print-block\">";
        echo twig_escape_filter($this->env, ($context["table"] ?? null), "html", null, true);
        echo "</h1>
<form method=\"post\" action=\"";
        // line 4
        echo PhpMyAdmin\Url::getFromRoute("/table/structure");
        echo "\" name=\"fieldsForm\" id=\"fieldsForm\">
    ";
        // line 5
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
        echo "
    <input type=\"hidden\" name=\"table_type\" value=";
        // line 7
        if (($context["db_is_system_schema"] ?? null)) {
            // line 8
            echo "\"information_schema\"";
        } elseif (        // line 9
($context["tbl_is_view"] ?? null)) {
            // line 10
            echo "\"view\"";
        } else {
            // line 12
            echo "\"table\"";
        }
        // line 13
        echo ">
    <div class=\"table-responsive-md\">
    <table id=\"tablestructure\" class=\"table table-striped table-hover w-auto align-middle\">
        ";
        // line 17
        echo "        <thead>
            <tr>
                <th class=\"d-print-none\"></th>
                <th>#</th>
                <th>";
echo _gettext("Name");
        // line 21
        echo "</th>
                <th>";
echo _gettext("Type");
        // line 22
        echo "</th>
                <th>";
echo _gettext("Collation");
        // line 23
        echo "</th>
                <th>";
echo _gettext("Attributes");
        // line 24
        echo "</th>
                <th>";
echo _gettext("Null");
        // line 25
        echo "</th>
                <th>";
echo _gettext("Default");
        // line 26
        echo "</th>
                ";
        // line 27
        if (($context["show_column_comments"] ?? null)) {
            // line 28
            echo "<th>";
echo _gettext("Comments");
            echo "</th>";
        }
        // line 30
        echo "                <th>";
echo _gettext("Extra");
        echo "</th>
                ";
        // line 32
        echo "                ";
        if (( !($context["db_is_system_schema"] ?? null) &&  !($context["tbl_is_view"] ?? null))) {
            // line 33
            echo "                    <th colspan=\"";
            echo ((PhpMyAdmin\Util::showIcons("ActionLinksMode")) ? ("8") : ("9"));
            // line 34
            echo "\" class=\"action d-print-none\">";
echo _gettext("Action");
            echo "</th>
                ";
        }
        // line 36
        echo "            </tr>
        </thead>
        <tbody>
        ";
        // line 40
        echo "        ";
        $context["rownum"] = 0;
        // line 41
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 42
            echo "            ";
            $context["rownum"] = (($context["rownum"] ?? null) + 1);
            // line 43
            echo "
            ";
            // line 44
            $context["extracted_columnspec"] = (($__internal_compile_0 = ($context["extracted_columnspecs"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[($context["rownum"] ?? null)] ?? null) : null);
            // line 45
            echo "            ";
            $context["field_name"] = twig_escape_filter($this->env, (($__internal_compile_1 = $context["row"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["Field"] ?? null) : null));
            // line 46
            echo "            ";
            // line 47
            echo "            ";
            $context["comments"] = (($__internal_compile_2 = ($context["row_comments"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[($context["rownum"] ?? null)] ?? null) : null);
            // line 48
            echo "            ";
            // line 49
            echo "
        <tr>
            <td class=\"text-center d-print-none\">
                <input type=\"checkbox\" class=\"checkall\" name=\"selected_fld[]\" value=\"";
            // line 52
            echo twig_escape_filter($this->env, (($__internal_compile_3 = $context["row"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["Field"] ?? null) : null), "html", null, true);
            echo "\" id=\"checkbox_row_";
            echo twig_escape_filter($this->env, ($context["rownum"] ?? null), "html", null, true);
            echo "\">
            </td>
            <td class=\"text-end\">";
            // line 54
            echo twig_escape_filter($this->env, ($context["rownum"] ?? null), "html", null, true);
            echo "</td>
            <th class=\"text-nowrap\">
                <label for=\"checkbox_row_";
            // line 56
            echo twig_escape_filter($this->env, ($context["rownum"] ?? null), "html", null, true);
            echo "\">
                    ";
            // line 57
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["displayed_fields"] ?? null), ($context["rownum"] ?? null), [], "array", false, true, false, 57), "comment", [], "any", true, true, false, 57)) {
                // line 58
                echo "                        <span class=\"commented_column\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_4 = ($context["displayed_fields"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[($context["rownum"] ?? null)] ?? null) : null), "comment", [], "any", false, false, false, 58), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_5 = ($context["displayed_fields"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[($context["rownum"] ?? null)] ?? null) : null), "text", [], "any", false, false, false, 58), "html", null, true);
                echo "</span>
                    ";
            } else {
                // line 60
                echo "                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_6 = ($context["displayed_fields"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[($context["rownum"] ?? null)] ?? null) : null), "text", [], "any", false, false, false, 60), "html", null, true);
                echo "
                    ";
            }
            // line 62
            echo "                    ";
            echo twig_get_attribute($this->env, $this->source, (($__internal_compile_7 = ($context["displayed_fields"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[($context["rownum"] ?? null)] ?? null) : null), "icon", [], "any", false, false, false, 62);
            echo "
                </label>
            </th>
            <td";
            // line 65
            echo ((((0 !== twig_compare("set", (($__internal_compile_8 = ($context["extracted_columnspec"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["type"] ?? null) : null))) && (0 !== twig_compare("enum", (($__internal_compile_9 = ($context["extracted_columnspec"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["type"] ?? null) : null))))) ? (" class=\"text-nowrap\"") : (""));
            echo ">
                <bdo dir=\"ltr\" lang=\"en\">
                    ";
            // line 67
            echo (($__internal_compile_10 = ($context["extracted_columnspec"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["displayed_type"] ?? null) : null);
            echo "
                    ";
            // line 68
            if (((( !(null === twig_get_attribute($this->env, $this->source, ($context["relation_parameters"] ?? null), "columnCommentsFeature", [], "any", false, false, false, 68)) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["relation_parameters"] ?? null), "browserTransformationFeature", [], "any", false, false, false, 68))) && ($context["browse_mime"] ?? null)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 69
($context["mime_map"] ?? null), (($__internal_compile_11 = $context["row"]) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["Field"] ?? null) : null), [], "array", false, true, false, 69), "mimetype", [], "array", true, true, false, 69))) {
                // line 70
                echo "                        <br>";
echo _gettext("Media type:");
                echo " ";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_replace_filter((($__internal_compile_12 = (($__internal_compile_13 = ($context["mime_map"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[(($__internal_compile_14 = $context["row"]) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["Field"] ?? null) : null)] ?? null) : null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["mimetype"] ?? null) : null), ["_" => "/"])), "html", null, true);
                echo "
                    ";
            }
            // line 72
            echo "                </bdo>
            </td>
            <td>
            ";
            // line 75
            if ( !twig_test_empty((($__internal_compile_15 = $context["row"]) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["Collation"] ?? null) : null))) {
                // line 76
                echo "                <dfn title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_16 = ($context["collations"] ?? null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[(($__internal_compile_17 = $context["row"]) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["Collation"] ?? null) : null)] ?? null) : null), "description", [], "any", false, false, false, 76), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_18 = ($context["collations"] ?? null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18[(($__internal_compile_19 = $context["row"]) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19["Collation"] ?? null) : null)] ?? null) : null), "name", [], "any", false, false, false, 76), "html", null, true);
                echo "</dfn>
            ";
            }
            // line 78
            echo "            </td>
            <td class=\"column_attribute text-nowrap\">";
            // line 79
            echo twig_escape_filter($this->env, (($__internal_compile_20 = ($context["attributes"] ?? null)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20[($context["rownum"] ?? null)] ?? null) : null), "html", null, true);
            echo "</td>
            <td>";
            // line 80
            echo twig_escape_filter($this->env, (((0 === twig_compare((($__internal_compile_21 = $context["row"]) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["Null"] ?? null) : null), "YES"))) ? (_gettext("Yes")) : (_gettext("No"))), "html", null, true);
            echo "</td>
            <td class=\"text-nowrap\">";
            // line 82
            if ( !(null === (($__internal_compile_22 = $context["row"]) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22["Default"] ?? null) : null))) {
                // line 83
                if ((0 === twig_compare((($__internal_compile_23 = ($context["extracted_columnspec"] ?? null)) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23["type"] ?? null) : null), "bit"))) {
                    // line 84
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::convertBitDefaultValue((($__internal_compile_24 = $context["row"]) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24["Default"] ?? null) : null)), "html", null, true);
                } else {
                    // line 86
                    echo twig_escape_filter($this->env, (($__internal_compile_25 = $context["row"]) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25["Default"] ?? null) : null), "html", null, true);
                }
            } elseif ((0 === twig_compare((($__internal_compile_26 =             // line 88
$context["row"]) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26["Null"] ?? null) : null), "YES"))) {
                // line 89
                echo "<em>NULL</em>";
            } else {
                // line 91
                echo "<em>";
echo _pgettext("None for default", "None");
                echo "</em>";
            }
            // line 93
            echo "</td>
            ";
            // line 94
            if (($context["show_column_comments"] ?? null)) {
                // line 95
                echo "                <td>
                    ";
                // line 96
                echo twig_escape_filter($this->env, ($context["comments"] ?? null), "html", null, true);
                echo "
                </td>
            ";
            }
            // line 99
            echo "            <td class=\"text-nowrap\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, (($__internal_compile_27 = $context["row"]) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27["Extra"] ?? null) : null)), "html", null, true);
            echo "</td>
            ";
            // line 100
            if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
                // line 101
                echo "                <td class=\"edit text-center d-print-none\">
                    <a class=\"change_column_anchor ajax\" href=\"";
                // line 102
                echo PhpMyAdmin\Url::getFromRoute("/table/structure/change", ["db" =>                 // line 103
($context["db"] ?? null), "table" =>                 // line 104
($context["table"] ?? null), "field" => (($__internal_compile_28 =                 // line 105
$context["row"]) && is_array($__internal_compile_28) || $__internal_compile_28 instanceof ArrayAccess ? ($__internal_compile_28["Field"] ?? null) : null), "change_column" => 1]);
                // line 107
                echo "\">
                      ";
                // line 108
                echo PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Change"));
                echo "
                    </a>
                </td>
                <td class=\"drop text-center d-print-none\">
                    <a class=\"drop_column_anchor ajax\" href=\"";
                // line 112
                echo PhpMyAdmin\Url::getFromRoute("/sql");
                echo "\" data-post=\"";
                echo PhpMyAdmin\Url::getCommon(["db" =>                 // line 113
($context["db"] ?? null), "table" =>                 // line 114
($context["table"] ?? null), "sql_query" => (((("ALTER TABLE " . PhpMyAdmin\Util::backquote(                // line 115
($context["table"] ?? null))) . " DROP ") . PhpMyAdmin\Util::backquote((($__internal_compile_29 = $context["row"]) && is_array($__internal_compile_29) || $__internal_compile_29 instanceof ArrayAccess ? ($__internal_compile_29["Field"] ?? null) : null))) . ";"), "dropped_column" => (($__internal_compile_30 =                 // line 116
$context["row"]) && is_array($__internal_compile_30) || $__internal_compile_30 instanceof ArrayAccess ? ($__internal_compile_30["Field"] ?? null) : null), "purge" => true, "message_to_show" => twig_sprintf(_gettext("Column %s has been dropped."), twig_escape_filter($this->env, (($__internal_compile_31 =                 // line 118
$context["row"]) && is_array($__internal_compile_31) || $__internal_compile_31 instanceof ArrayAccess ? ($__internal_compile_31["Field"] ?? null) : null)))], "", false);
                // line 119
                echo "\">
                      ";
                // line 120
                echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Drop"));
                echo "
                    </a>
                </td>
            ";
            }
            // line 124
            echo "
            ";
            // line 125
            if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
                // line 126
                echo "                ";
                $context["type"] = (( !twig_test_empty((($__internal_compile_32 = ($context["extracted_columnspec"] ?? null)) && is_array($__internal_compile_32) || $__internal_compile_32 instanceof ArrayAccess ? ($__internal_compile_32["print_type"] ?? null) : null))) ? ((($__internal_compile_33 = ($context["extracted_columnspec"] ?? null)) && is_array($__internal_compile_33) || $__internal_compile_33 instanceof ArrayAccess ? ($__internal_compile_33["print_type"] ?? null) : null)) : (""));
                // line 127
                echo "                <td class=\"d-print-none\">
                  ";
                // line 128
                if (($context["hide_structure_actions"] ?? null)) {
                    // line 129
                    echo "                  <div class=\"dropdown\">
                    <button class=\"btn btn-link p-0 dropdown-toggle\" type=\"button\" id=\"moreActionsButton\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">";
echo _gettext("More");
                    // line 130
                    echo "</button>
                    <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"moreActionsButton\">
                  ";
                } else {
                    // line 133
                    echo "                    <ul class=\"nav\">
                  ";
                }
                // line 135
                echo "                        <li class=\"";
                echo (( !($context["hide_structure_actions"] ?? null)) ? ("nav-item ") : (""));
                echo "primary text-nowrap\">
                          ";
                // line 136
                if (((((0 === twig_compare(($context["type"] ?? null), "text")) || (0 === twig_compare(($context["type"] ?? null), "blob"))) || (0 === twig_compare(($context["tbl_storage_engine"] ?? null), "ARCHIVE"))) || (($context["primary"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["primary"] ?? null), "hasColumn", [0 => ($context["field_name"] ?? null)], "method", false, false, false, 136)))) {
                    // line 137
                    echo "                            <span class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item-text") : ("nav-link px-1"));
                    echo " disabled\">";
                    echo PhpMyAdmin\Html\Generator::getIcon("bd_primary", _gettext("Primary"));
                    echo "</span>
                          ";
                } else {
                    // line 139
                    echo "                            <a rel=\"samepage\" class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                    echo " ajax add_key d-print-none add_primary_key_anchor\" href=\"";
                    echo PhpMyAdmin\Url::getFromRoute("/table/structure/add-key");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["db" =>                     // line 140
($context["db"] ?? null), "table" =>                     // line 141
($context["table"] ?? null), "sql_query" => ((((("ALTER TABLE " . PhpMyAdmin\Util::backquote(                    // line 142
($context["table"] ?? null))) . ((($context["primary"] ?? null)) ? (" DROP PRIMARY KEY,") : (""))) . " ADD PRIMARY KEY(") . PhpMyAdmin\Util::backquote((($__internal_compile_34 = $context["row"]) && is_array($__internal_compile_34) || $__internal_compile_34 instanceof ArrayAccess ? ($__internal_compile_34["Field"] ?? null) : null))) . ");"), "message_to_show" => twig_sprintf(_gettext("A primary key has been added on %s."), twig_escape_filter($this->env, (($__internal_compile_35 =                     // line 143
$context["row"]) && is_array($__internal_compile_35) || $__internal_compile_35 instanceof ArrayAccess ? ($__internal_compile_35["Field"] ?? null) : null)))], "", false);
                    // line 144
                    echo "\">
                              ";
                    // line 145
                    echo PhpMyAdmin\Html\Generator::getIcon("b_primary", _gettext("Primary"));
                    echo "
                            </a>
                          ";
                }
                // line 148
                echo "                        </li>

                        <li class=\"";
                // line 150
                echo (( !($context["hide_structure_actions"] ?? null)) ? ("nav-item ") : (""));
                echo "add_unique unique text-nowrap\">
                          ";
                // line 151
                if (((((0 === twig_compare(($context["type"] ?? null), "text")) || (0 === twig_compare(($context["type"] ?? null), "blob"))) || (0 === twig_compare(($context["tbl_storage_engine"] ?? null), "ARCHIVE"))) || twig_in_filter(($context["field_name"] ?? null), ($context["columns_with_unique_index"] ?? null)))) {
                    // line 152
                    echo "                            <span class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item-text") : ("nav-link px-1"));
                    echo " disabled\">";
                    echo PhpMyAdmin\Html\Generator::getIcon("bd_unique", _gettext("Unique"));
                    echo "</span>
                          ";
                } else {
                    // line 154
                    echo "                            <a rel=\"samepage\" class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                    echo " ajax add_key d-print-none add_unique_anchor\" href=\"";
                    echo PhpMyAdmin\Url::getFromRoute("/table/structure/add-key");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["db" =>                     // line 155
($context["db"] ?? null), "table" =>                     // line 156
($context["table"] ?? null), "sql_query" => (((("ALTER TABLE " . PhpMyAdmin\Util::backquote(                    // line 157
($context["table"] ?? null))) . " ADD UNIQUE(") . PhpMyAdmin\Util::backquote((($__internal_compile_36 = $context["row"]) && is_array($__internal_compile_36) || $__internal_compile_36 instanceof ArrayAccess ? ($__internal_compile_36["Field"] ?? null) : null))) . ");"), "message_to_show" => twig_sprintf(_gettext("An index has been added on %s."), twig_escape_filter($this->env, (($__internal_compile_37 =                     // line 158
$context["row"]) && is_array($__internal_compile_37) || $__internal_compile_37 instanceof ArrayAccess ? ($__internal_compile_37["Field"] ?? null) : null)))], "", false);
                    // line 159
                    echo "\">
                              ";
                    // line 160
                    echo PhpMyAdmin\Html\Generator::getIcon("b_unique", _gettext("Unique"));
                    echo "
                            </a>
                          ";
                }
                // line 163
                echo "                        </li>

                        <li class=\"";
                // line 165
                echo (( !($context["hide_structure_actions"] ?? null)) ? ("nav-item ") : (""));
                echo "add_index text-nowrap\">
                          ";
                // line 166
                if ((((0 === twig_compare(($context["type"] ?? null), "text")) || (0 === twig_compare(($context["type"] ?? null), "blob"))) || (0 === twig_compare(($context["tbl_storage_engine"] ?? null), "ARCHIVE")))) {
                    // line 167
                    echo "                            <span class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item-text") : ("nav-link px-1"));
                    echo " disabled\">";
                    echo PhpMyAdmin\Html\Generator::getIcon("bd_index", _gettext("Index"));
                    echo "</span>
                          ";
                } else {
                    // line 169
                    echo "                            <a rel=\"samepage\" class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                    echo " ajax add_key d-print-none add_index_anchor\" href=\"";
                    echo PhpMyAdmin\Url::getFromRoute("/table/structure/add-key");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["db" =>                     // line 170
($context["db"] ?? null), "table" =>                     // line 171
($context["table"] ?? null), "sql_query" => (((("ALTER TABLE " . PhpMyAdmin\Util::backquote(                    // line 172
($context["table"] ?? null))) . " ADD INDEX(") . PhpMyAdmin\Util::backquote((($__internal_compile_38 = $context["row"]) && is_array($__internal_compile_38) || $__internal_compile_38 instanceof ArrayAccess ? ($__internal_compile_38["Field"] ?? null) : null))) . ");"), "message_to_show" => twig_sprintf(_gettext("An index has been added on %s."), twig_escape_filter($this->env, (($__internal_compile_39 =                     // line 173
$context["row"]) && is_array($__internal_compile_39) || $__internal_compile_39 instanceof ArrayAccess ? ($__internal_compile_39["Field"] ?? null) : null)))], "", false);
                    // line 174
                    echo "\">
                              ";
                    // line 175
                    echo PhpMyAdmin\Html\Generator::getIcon("b_index", _gettext("Index"));
                    echo "
                            </a>
                          ";
                }
                // line 178
                echo "                        </li>

                        ";
                // line 180
                $context["spatial_types"] = [0 => "geometry", 1 => "point", 2 => "linestring", 3 => "polygon", 4 => "multipoint", 5 => "multilinestring", 6 => "multipolygon", 7 => "geomtrycollection"];
                // line 190
                echo "                        <li class=\"";
                echo (( !($context["hide_structure_actions"] ?? null)) ? ("nav-item ") : (""));
                echo "spatial text-nowrap\">
                          ";
                // line 191
                if (((((0 === twig_compare(($context["type"] ?? null), "text")) || (0 === twig_compare(($context["type"] ?? null), "blob"))) || (0 === twig_compare(($context["tbl_storage_engine"] ?? null), "ARCHIVE"))) || (!twig_in_filter(($context["type"] ?? null), ($context["spatial_types"] ?? null)) && ((0 === twig_compare(($context["tbl_storage_engine"] ?? null), "MYISAM")) || (0 <= twig_compare(($context["mysql_int_version"] ?? null), 50705)))))) {
                    // line 192
                    echo "                            <span class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item-text") : ("nav-link px-1"));
                    echo " disabled\">";
                    echo PhpMyAdmin\Html\Generator::getIcon("bd_spatial", _gettext("Spatial"));
                    echo "</span>
                          ";
                } else {
                    // line 194
                    echo "                            <a rel=\"samepage\" class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                    echo " ajax add_key d-print-none add_spatial_anchor\" href=\"";
                    echo PhpMyAdmin\Url::getFromRoute("/table/structure/add-key");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["db" =>                     // line 195
($context["db"] ?? null), "table" =>                     // line 196
($context["table"] ?? null), "sql_query" => (((("ALTER TABLE " . PhpMyAdmin\Util::backquote(                    // line 197
($context["table"] ?? null))) . " ADD SPATIAL(") . PhpMyAdmin\Util::backquote((($__internal_compile_40 = $context["row"]) && is_array($__internal_compile_40) || $__internal_compile_40 instanceof ArrayAccess ? ($__internal_compile_40["Field"] ?? null) : null))) . ");"), "message_to_show" => twig_sprintf(_gettext("An index has been added on %s."), twig_escape_filter($this->env, (($__internal_compile_41 =                     // line 198
$context["row"]) && is_array($__internal_compile_41) || $__internal_compile_41 instanceof ArrayAccess ? ($__internal_compile_41["Field"] ?? null) : null)))], "", false);
                    // line 199
                    echo "\">
                              ";
                    // line 200
                    echo PhpMyAdmin\Html\Generator::getIcon("b_spatial", _gettext("Spatial"));
                    echo "
                            </a>
                          ";
                }
                // line 203
                echo "                        </li>

                        ";
                // line 206
                echo "                        <li class=\"";
                echo (( !($context["hide_structure_actions"] ?? null)) ? ("nav-item ") : (""));
                echo "fulltext text-nowrap\">
                        ";
                // line 207
                if ((( !twig_test_empty(($context["tbl_storage_engine"] ?? null)) && ((((0 === twig_compare(                // line 208
($context["tbl_storage_engine"] ?? null), "MYISAM")) || (0 === twig_compare(                // line 209
($context["tbl_storage_engine"] ?? null), "ARIA"))) || (0 === twig_compare(                // line 210
($context["tbl_storage_engine"] ?? null), "MARIA"))) || ((0 === twig_compare(                // line 211
($context["tbl_storage_engine"] ?? null), "INNODB")) && (0 <= twig_compare(($context["mysql_int_version"] ?? null), 50604))))) && (twig_in_filter("text",                 // line 212
($context["type"] ?? null)) || twig_in_filter("char", ($context["type"] ?? null))))) {
                    // line 213
                    echo "                            <a rel=\"samepage\" class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                    echo " ajax add_key add_fulltext_anchor\" href=\"";
                    echo PhpMyAdmin\Url::getFromRoute("/table/structure/add-key");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["db" =>                     // line 214
($context["db"] ?? null), "table" =>                     // line 215
($context["table"] ?? null), "sql_query" => (((("ALTER TABLE " . PhpMyAdmin\Util::backquote(                    // line 216
($context["table"] ?? null))) . " ADD FULLTEXT(") . PhpMyAdmin\Util::backquote((($__internal_compile_42 = $context["row"]) && is_array($__internal_compile_42) || $__internal_compile_42 instanceof ArrayAccess ? ($__internal_compile_42["Field"] ?? null) : null))) . ");"), "message_to_show" => twig_sprintf(_gettext("An index has been added on %s."), twig_escape_filter($this->env, (($__internal_compile_43 =                     // line 217
$context["row"]) && is_array($__internal_compile_43) || $__internal_compile_43 instanceof ArrayAccess ? ($__internal_compile_43["Field"] ?? null) : null)))], "", false);
                    // line 218
                    echo "\">
                              ";
                    // line 219
                    echo PhpMyAdmin\Html\Generator::getIcon("b_ftext", _gettext("Fulltext"));
                    echo "
                            </a>
                        ";
                } else {
                    // line 222
                    echo "                            <span class=\"";
                    echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item-text") : ("nav-link px-1"));
                    echo " disabled\">";
                    echo PhpMyAdmin\Html\Generator::getIcon("bd_ftext", _gettext("Fulltext"));
                    echo "</span>
                        ";
                }
                // line 224
                echo "                        </li>

                        ";
                // line 227
                echo "                        <li class=\"";
                echo (( !($context["hide_structure_actions"] ?? null)) ? ("nav-item ") : (""));
                echo "browse text-nowrap\">
                            <a class=\"";
                // line 228
                echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                echo "\" href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/sql");
                echo "\" data-post=\"";
                echo PhpMyAdmin\Url::getCommon(["db" =>                 // line 229
($context["db"] ?? null), "table" =>                 // line 230
($context["table"] ?? null), "sql_query" => ((((((((("SELECT COUNT(*) AS " . PhpMyAdmin\Util::backquote(_gettext("Rows"))) . ", ") . PhpMyAdmin\Util::backquote((($__internal_compile_44 =                 // line 232
$context["row"]) && is_array($__internal_compile_44) || $__internal_compile_44 instanceof ArrayAccess ? ($__internal_compile_44["Field"] ?? null) : null))) . " FROM ") . PhpMyAdmin\Util::backquote(                // line 233
($context["table"] ?? null))) . " GROUP BY ") . PhpMyAdmin\Util::backquote((($__internal_compile_45 =                 // line 234
$context["row"]) && is_array($__internal_compile_45) || $__internal_compile_45 instanceof ArrayAccess ? ($__internal_compile_45["Field"] ?? null) : null))) . " ORDER BY ") . PhpMyAdmin\Util::backquote((($__internal_compile_46 =                 // line 235
$context["row"]) && is_array($__internal_compile_46) || $__internal_compile_46 instanceof ArrayAccess ? ($__internal_compile_46["Field"] ?? null) : null))), "is_browse_distinct" => true], "", false);
                // line 237
                echo "\">
                              ";
                // line 238
                echo PhpMyAdmin\Html\Generator::getIcon("b_browse", _gettext("Distinct values"));
                echo "
                            </a>
                        </li>
                        ";
                // line 241
                if ( !(null === twig_get_attribute($this->env, $this->source, ($context["relation_parameters"] ?? null), "centralColumnsFeature", [], "any", false, false, false, 241))) {
                    // line 242
                    echo "                            <li class=\"";
                    echo (( !($context["hide_structure_actions"] ?? null)) ? ("nav-item ") : (""));
                    echo "browse text-nowrap\">
                            ";
                    // line 243
                    if (twig_in_filter((($__internal_compile_47 = $context["row"]) && is_array($__internal_compile_47) || $__internal_compile_47 instanceof ArrayAccess ? ($__internal_compile_47["Field"] ?? null) : null), ($context["central_list"] ?? null))) {
                        // line 244
                        echo "                                <a class=\"";
                        echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                        echo "\" href=\"";
                        echo PhpMyAdmin\Url::getFromRoute("/table/structure/central-columns-remove");
                        echo "\" data-post=\"";
                        echo PhpMyAdmin\Url::getCommon(["db" =>                         // line 245
($context["db"] ?? null), "table" =>                         // line 246
($context["table"] ?? null), "selected_fld" => [0 => (($__internal_compile_48 =                         // line 247
$context["row"]) && is_array($__internal_compile_48) || $__internal_compile_48 instanceof ArrayAccess ? ($__internal_compile_48["Field"] ?? null) : null)]]);
                        // line 248
                        echo "\">
                                    ";
                        // line 249
                        echo PhpMyAdmin\Html\Generator::getIcon("centralColumns_delete", _gettext("Remove from central columns"));
                        echo "
                                </a>
                            ";
                    } else {
                        // line 252
                        echo "                                <a class=\"";
                        echo ((($context["hide_structure_actions"] ?? null)) ? ("dropdown-item") : ("nav-link px-1"));
                        echo "\" href=\"";
                        echo PhpMyAdmin\Url::getFromRoute("/table/structure/central-columns-add");
                        echo "\" data-post=\"";
                        echo PhpMyAdmin\Url::getCommon(["db" =>                         // line 253
($context["db"] ?? null), "table" =>                         // line 254
($context["table"] ?? null), "selected_fld" => [0 => (($__internal_compile_49 =                         // line 255
$context["row"]) && is_array($__internal_compile_49) || $__internal_compile_49 instanceof ArrayAccess ? ($__internal_compile_49["Field"] ?? null) : null)]]);
                        // line 256
                        echo "\">
                                    ";
                        // line 257
                        echo PhpMyAdmin\Html\Generator::getIcon("centralColumns_add", _gettext("Add to central columns"));
                        echo "
                                </a>
                            ";
                    }
                    // line 260
                    echo "                            </li>
                        ";
                }
                // line 262
                echo "                  ";
                if ( !($context["hide_structure_actions"] ?? null)) {
                    // line 263
                    echo "                    </ul>
                  ";
                } else {
                    // line 265
                    echo "                    </ul>
                  </div>
                  ";
                }
                // line 268
                echo "                </td>
            ";
            }
            // line 270
            echo "        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 272
        echo "        </tbody>
    </table>
    </div>
    <div class=\"d-print-none\">
        ";
        // line 276
        $this->loadTemplate("select_all.twig", "table/structure/display_structure.twig", 276)->display(twig_to_array(["text_dir" =>         // line 277
($context["text_dir"] ?? null), "form_name" => "fieldsForm"]));
        // line 280
        echo "
        <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
        // line 281
        echo PhpMyAdmin\Url::getFromRoute("/table/structure/browse");
        echo "\">
          ";
        // line 282
        echo PhpMyAdmin\Html\Generator::getIcon("b_browse", _gettext("Browse"));
        echo "
        </button>

        ";
        // line 285
        if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 286
            echo "          <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
            echo PhpMyAdmin\Url::getFromRoute("/table/structure/change");
            echo "\">
            ";
            // line 287
            echo PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Change"));
            echo "
          </button>
          <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
            // line 289
            echo PhpMyAdmin\Url::getFromRoute("/table/structure/drop-confirm");
            echo "\">
            ";
            // line 290
            echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Drop"));
            echo "
          </button>

          ";
            // line 293
            if ((0 !== twig_compare(($context["tbl_storage_engine"] ?? null), "ARCHIVE"))) {
                // line 294
                echo "            <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
                echo PhpMyAdmin\Url::getFromRoute("/table/structure/primary");
                echo "\">
              ";
                // line 295
                echo PhpMyAdmin\Html\Generator::getIcon("b_primary", _gettext("Primary"));
                echo "
            </button>
            <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
                // line 297
                echo PhpMyAdmin\Url::getFromRoute("/table/structure/unique");
                echo "\">
              ";
                // line 298
                echo PhpMyAdmin\Html\Generator::getIcon("b_unique", _gettext("Unique"));
                echo "
            </button>
            <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
                // line 300
                echo PhpMyAdmin\Url::getFromRoute("/table/structure/index");
                echo "\">
              ";
                // line 301
                echo PhpMyAdmin\Html\Generator::getIcon("b_index", _gettext("Index"));
                echo "
            </button>
            <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
                // line 303
                echo PhpMyAdmin\Url::getFromRoute("/table/structure/spatial");
                echo "\">
              ";
                // line 304
                echo PhpMyAdmin\Html\Generator::getIcon("b_spatial", _gettext("Spatial"));
                echo "
            </button>
            <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
                // line 306
                echo PhpMyAdmin\Url::getFromRoute("/table/structure/fulltext");
                echo "\">
              ";
                // line 307
                echo PhpMyAdmin\Html\Generator::getIcon("b_ftext", _gettext("Fulltext"));
                echo "
            </button>

            ";
                // line 310
                if ( !(null === twig_get_attribute($this->env, $this->source, ($context["relation_parameters"] ?? null), "centralColumnsFeature", [], "any", false, false, false, 310))) {
                    // line 311
                    echo "              <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
                    echo PhpMyAdmin\Url::getFromRoute("/table/structure/central-columns-add");
                    echo "\">
                ";
                    // line 312
                    echo PhpMyAdmin\Html\Generator::getIcon("centralColumns_add", _gettext("Add to central columns"));
                    echo "
              </button>
              <button class=\"btn btn-link mult_submit\" type=\"submit\" formaction=\"";
                    // line 314
                    echo PhpMyAdmin\Url::getFromRoute("/table/structure/central-columns-remove");
                    echo "\">
                ";
                    // line 315
                    echo PhpMyAdmin\Html\Generator::getIcon("centralColumns_delete", _gettext("Remove from central columns"));
                    echo "
              </button>
            ";
                }
                // line 318
                echo "          ";
            }
            // line 319
            echo "        ";
        }
        // line 320
        echo "    </div>
</form>
<hr class=\"d-print-none\">

<div class=\"modal fade\" id=\"moveColumnsModal\" tabindex=\"-1\" aria-labelledby=\"moveColumnsModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"moveColumnsModalLabel\">";
echo _gettext("Move columns");
        // line 328
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Close");
        // line 329
        echo "\"></button>
      </div>
      <div class=\"modal-body\">
        <div id=\"move_columns_dialog\" title=\"";
echo _gettext("Move columns");
        // line 332
        echo "\">
          <p>";
echo _gettext("Move the columns by dragging them up and down.");
        // line 333
        echo "</p>
          <form action=\"";
        // line 334
        echo PhpMyAdmin\Url::getFromRoute("/table/structure/move-columns");
        echo "\" name=\"move_column_form\" id=\"move_column_form\">
            <div>
              ";
        // line 336
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
        echo "
              <ul></ul>
            </div>
          </form>
        </div>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" id=\"designerModalGoButton\">";
echo _gettext("Go");
        // line 343
        echo "</button>
        <button type=\"button\" class=\"btn btn-secondary\" id=\"designerModalPreviewButton\">";
echo _gettext("Preview SQL");
        // line 344
        echo "</button>
        <button type=\"button\" class=\"btn btn-secondary\" id=\"designerModalCloseButton\" data-bs-dismiss=\"modal\">";
echo _gettext("Close");
        // line 345
        echo "</button>
      </div>
    </div>
  </div>
</div>

<div class=\"modal fade\" id=\"moveColumnsErrorModal\" tabindex=\"-1\" aria-labelledby=\"moveColumnsErrorModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"moveColumnsErrorModalLabel\">";
echo _gettext("Error");
        // line 355
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Close");
        // line 356
        echo "\"></button>
      </div>
      <div class=\"modal-body\">
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
echo _gettext("OK");
        // line 361
        echo "</button>
      </div>
    </div>
  </div>
</div>

";
        // line 368
        echo "<div id=\"structure-action-links\" class=\"d-print-none\">
    ";
        // line 369
        if ((($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 370
            echo "        ";
            echo PhpMyAdmin\Html\Generator::linkOrButton(PhpMyAdmin\Url::getFromRoute("/view/create"), ["db" =>             // line 372
($context["db"] ?? null), "table" => ($context["table"] ?? null)], PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Edit view"), true));
            // line 374
            echo "
    ";
        }
        // line 376
        echo "    <button type=\"button\" class=\"btn btn-link p-0 jsPrintButton\">";
        echo PhpMyAdmin\Html\Generator::getIcon("b_print", _gettext("Print"), true);
        echo "</button>
    ";
        // line 377
        if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 378
            echo "        ";
            // line 379
            echo "        ";
            if (((-1 === twig_compare(($context["mysql_int_version"] ?? null), 80000)) || ($context["is_mariadb"] ?? null))) {
                // line 380
                echo "          <a class=\"me-0\" href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/sql");
                echo "\" data-post=\"";
                echo PhpMyAdmin\Url::getCommon(["db" =>                 // line 381
($context["db"] ?? null), "table" =>                 // line 382
($context["table"] ?? null), "sql_query" => (("SELECT * FROM " . PhpMyAdmin\Util::backquote(                // line 383
($context["table"] ?? null))) . " PROCEDURE ANALYSE()"), "session_max_rows" => "all"], "", false);
                // line 385
                echo "\">
            ";
                // line 386
                echo PhpMyAdmin\Html\Generator::getIcon("b_tblanalyse", _gettext("Propose table structure"), true);
                // line 390
                echo "
          </a>
          ";
                // line 392
                echo PhpMyAdmin\Html\MySQLDocumentation::show("procedure_analyse");
                echo "
        ";
            }
            // line 394
            echo "        ";
            if (($context["is_active"] ?? null)) {
                // line 395
                echo "            <a href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking", ["db" => ($context["db"] ?? null), "table" => ($context["table"] ?? null)]);
                echo "\">
                ";
                // line 396
                echo PhpMyAdmin\Html\Generator::getIcon("eye", _gettext("Track table"), true);
                echo "
            </a>
        ";
            }
            // line 399
            echo "        <a href=\"#\" id=\"move_columns_anchor\">
            ";
            // line 400
            echo PhpMyAdmin\Html\Generator::getIcon("b_move", _gettext("Move columns"), true);
            echo "
        </a>
        <a href=\"";
            // line 402
            echo PhpMyAdmin\Url::getFromRoute("/normalization", ["db" => ($context["db"] ?? null), "table" => ($context["table"] ?? null)]);
            echo "\">
            ";
            // line 403
            echo PhpMyAdmin\Html\Generator::getIcon("normalize", _gettext("Normalize"), true);
            echo "
        </a>
    ";
        }
        // line 406
        echo "    ";
        if ((($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 407
            echo "        ";
            if (($context["is_active"] ?? null)) {
                // line 408
                echo "            <a href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking", ["db" => ($context["db"] ?? null), "table" => ($context["table"] ?? null)]);
                echo "\">
                ";
                // line 409
                echo PhpMyAdmin\Html\Generator::getIcon("eye", _gettext("Track view"), true);
                echo "
            </a>
        ";
            }
            // line 412
            echo "    ";
        }
        // line 413
        echo "</div>
";
        // line 414
        if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 415
            echo "    <form method=\"post\" action=\"";
            echo PhpMyAdmin\Url::getFromRoute("/table/add-field");
            echo "\" id=\"addColumns\" name=\"addColumns\" class=\"d-print-none\">
        ";
            // line 416
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
            echo "
        ";
            // line 417
            if (PhpMyAdmin\Util::showIcons("ActionLinksMode")) {
                // line 418
                echo "            ";
                echo PhpMyAdmin\Html\Generator::getImage("b_insrow", _gettext("Add column"));
                echo "&nbsp;
        ";
            }
            // line 420
            echo "        ";
            $context["num_fields"] = ('' === $tmp = "<input type=\"number\" name=\"num_fields\" value=\"1\" onfocus=\"this.select()\" min=\"1\" required>") ? '' : new Markup($tmp, $this->env->getCharset());
            // line 423
            echo "        ";
            echo twig_sprintf(_gettext("Add %s column(s)"), ($context["num_fields"] ?? null));
            echo "
        <input type=\"hidden\" name=\"field_where\" value=\"after\">&nbsp;
        ";
            // line 426
            echo "        <select name=\"after_field\">
            <option value=\"first\" data-pos=\"first\">
                ";
echo _gettext("at beginning of table");
            // line 429
            echo "            </option>
            ";
            // line 430
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["columns_list"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["one_column_name"]) {
                // line 431
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $context["one_column_name"], "html", null, true);
                echo "\"";
                // line 432
                echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["loop"], "revindex0", [], "any", false, false, false, 432), 0))) ? (" selected=\"selected\"") : (""));
                echo ">
                    ";
                // line 433
                echo twig_escape_filter($this->env, twig_sprintf(_gettext("after %s"), $context["one_column_name"]), "html", null, true);
                echo "
                </option>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['one_column_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 436
            echo "        </select>
        <input class=\"btn btn-primary\" type=\"submit\" value=\"";
echo _gettext("Go");
            // line 437
            echo "\">
    </form>
";
        }
        // line 440
        echo "
";
        // line 441
        if ((( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null)) && (0 !== twig_compare(($context["tbl_storage_engine"] ?? null), "ARCHIVE")))) {
            // line 442
            echo "  <div id=\"index_div\" class=\"w-100 ajax\">
    <fieldset class=\"pma-fieldset index_info\">
      <legend id=\"index_header\">
        ";
echo _gettext("Indexes");
            // line 446
            echo "        ";
            echo PhpMyAdmin\Html\MySQLDocumentation::show("optimizing-database-structure");
            echo "
      </legend>

      ";
            // line 449
            if ( !twig_test_empty(($context["indexes"] ?? null))) {
                // line 450
                echo "        ";
                echo ($context["indexes_duplicates"] ?? null);
                echo "

        ";
                // line 452
                echo twig_include($this->env, $context, "modals/preview_sql_confirmation.twig");
                echo "
        <div class=\"table-responsive jsresponsive\">
          <table class=\"table table-striped table-hover table-sm w-auto align-middle\" id=\"table_index\">
            <thead>
              <tr>
                <th colspan=\"3\" class=\"d-print-none\">";
echo _gettext("Action");
                // line 457
                echo "</th>
                <th>";
echo _gettext("Keyname");
                // line 458
                echo "</th>
                <th>";
echo _gettext("Type");
                // line 459
                echo "</th>
                <th>";
echo _gettext("Unique");
                // line 460
                echo "</th>
                <th>";
echo _gettext("Packed");
                // line 461
                echo "</th>
                <th>";
echo _gettext("Column");
                // line 462
                echo "</th>
                <th>";
echo _gettext("Cardinality");
                // line 463
                echo "</th>
                <th>";
echo _gettext("Collation");
                // line 464
                echo "</th>
                <th>";
echo _gettext("Null");
                // line 465
                echo "</th>
                <th>";
echo _gettext("Comment");
                // line 466
                echo "</th>
              </tr>
            </thead>

          <tbody class=\"row_span\">
            ";
                // line 471
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["indexes"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["index"]) {
                    // line 472
                    echo "                ";
                    $context["columns_count"] = twig_get_attribute($this->env, $this->source, $context["index"], "getColumnCount", [], "method", false, false, false, 472);
                    // line 473
                    echo "                <tr class=\"noclick\">
                <td rowspan=\"";
                    // line 474
                    echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                    echo "\" class=\"edit_index d-print-none ajax\">
                  <a class=\"ajax\" href=\"";
                    // line 475
                    echo PhpMyAdmin\Url::getFromRoute("/table/indexes");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["db" =>                     // line 476
($context["db"] ?? null), "table" =>                     // line 477
($context["table"] ?? null), "index" => twig_get_attribute($this->env, $this->source,                     // line 478
$context["index"], "getName", [], "method", false, false, false, 478)], "", false);
                    // line 479
                    echo "\">
                    ";
                    // line 480
                    echo PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Edit"));
                    echo "
                  </a>
                </td>
                <td rowspan=\"";
                    // line 483
                    echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                    echo "\" class=\"rename_index d-print-none ajax\" >
                  <a class=\"ajax\" href=\"";
                    // line 484
                    echo PhpMyAdmin\Url::getFromRoute("/table/indexes/rename");
                    echo "\" data-post=\"";
                    echo PhpMyAdmin\Url::getCommon(["db" =>                     // line 485
($context["db"] ?? null), "table" =>                     // line 486
($context["table"] ?? null), "index" => twig_get_attribute($this->env, $this->source,                     // line 487
$context["index"], "getName", [], "method", false, false, false, 487)], "", false);
                    // line 488
                    echo "\">
                    ";
                    // line 489
                    echo PhpMyAdmin\Html\Generator::getIcon("b_rename", _gettext("Rename"));
                    echo "
                  </a>
                </td>
                <td rowspan=\"";
                    // line 492
                    echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                    echo "\" class=\"d-print-none\">
                  ";
                    // line 493
                    if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["index"], "getName", [], "method", false, false, false, 493), "PRIMARY"))) {
                        // line 494
                        echo "                    ";
                        $context["index_params"] = ["sql_query" => (("ALTER TABLE " . PhpMyAdmin\Util::backquote(                        // line 495
($context["table"] ?? null))) . " DROP PRIMARY KEY;"), "message_to_show" => _gettext("The primary key has been dropped.")];
                        // line 498
                        echo "                  ";
                    } else {
                        // line 499
                        echo "                    ";
                        $context["index_params"] = ["sql_query" => (((("ALTER TABLE " . PhpMyAdmin\Util::backquote(                        // line 500
($context["table"] ?? null))) . " DROP INDEX ") . PhpMyAdmin\Util::backquote(twig_get_attribute($this->env, $this->source, $context["index"], "getName", [], "method", false, false, false, 500))) . ";"), "message_to_show" => twig_sprintf(_gettext("Index %s has been dropped."), twig_get_attribute($this->env, $this->source,                         // line 501
$context["index"], "getName", [], "method", false, false, false, 501))];
                        // line 503
                        echo "                  ";
                    }
                    // line 504
                    echo "
                  <input type=\"hidden\" class=\"drop_primary_key_index_msg\" value=\"";
                    // line 505
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["index_params"] ?? null), "sql_query", [], "any", false, false, false, 505), "html", null, true);
                    echo "\">
                  ";
                    // line 506
                    echo PhpMyAdmin\Html\Generator::linkOrButton(PhpMyAdmin\Url::getFromRoute("/sql"), twig_array_merge(                    // line 508
($context["index_params"] ?? null), ["db" => ($context["db"] ?? null), "table" => ($context["table"] ?? null)]), PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Drop")), ["class" => "drop_primary_key_index_anchor ajax"]);
                    // line 511
                    echo "
                </td>
                <th rowspan=\"";
                    // line 513
                    echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["index"], "getName", [], "method", false, false, false, 513), "html", null, true);
                    echo "</th>
                <td rowspan=\"";
                    // line 514
                    echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["index"], "getType", [], "method", true, true, false, 514)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["index"], "getType", [], "method", false, false, false, 514), twig_get_attribute($this->env, $this->source, $context["index"], "getChoice", [], "method", false, false, false, 514))) : (twig_get_attribute($this->env, $this->source, $context["index"], "getChoice", [], "method", false, false, false, 514))), "html", null, true);
                    echo "</td>
                <td rowspan=\"";
                    // line 515
                    echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["index"], "isUnique", [], "method", false, false, false, 515)) ? (_gettext("Yes")) : (_gettext("No"))), "html", null, true);
                    echo "</td>
                <td rowspan=\"";
                    // line 516
                    echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["index"], "isPacked", [], "method", false, false, false, 516);
                    echo "</td>

                ";
                    // line 518
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["index"], "getColumns", [], "method", false, false, false, 518));
                    foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                        // line 519
                        echo "                  ";
                        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["column"], "getSeqInIndex", [], "method", false, false, false, 519), 1))) {
                            // line 520
                            echo "                    <tr class=\"noclick\">
                  ";
                        }
                        // line 522
                        echo "                  <td>
                    ";
                        // line 523
                        if (twig_get_attribute($this->env, $this->source, $context["column"], "hasExpression", [], "method", false, false, false, 523)) {
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "getExpression", [], "method", false, false, false, 523), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "getName", [], "method", false, false, false, 523), "html", null, true);
                        }
                        // line 524
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["column"], "getSubPart", [], "method", false, false, false, 524))) {
                            // line 525
                            echo "                      (";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "getSubPart", [], "method", false, false, false, 525), "html", null, true);
                            echo ")
                    ";
                        }
                        // line 527
                        echo "                  </td>
                  <td>";
                        // line 528
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "getCardinality", [], "method", false, false, false, 528), "html", null, true);
                        echo "</td>
                  <td>";
                        // line 529
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "getCollation", [], "method", false, false, false, 529), "html", null, true);
                        echo "</td>
                  <td>";
                        // line 530
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "getNull", [0 => true], "method", false, false, false, 530), "html", null, true);
                        echo "</td>

                  ";
                        // line 532
                        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["column"], "getSeqInIndex", [], "method", false, false, false, 532), 1))) {
                            // line 533
                            echo "                    <td rowspan=\"";
                            echo twig_escape_filter($this->env, ($context["columns_count"] ?? null), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["index"], "getComments", [], "method", false, false, false, 533), "html", null, true);
                            echo "</td>
                  ";
                        }
                        // line 535
                        echo "                  </tr>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 537
                    echo "              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['index'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 538
                echo "            </tbody>
          </table>
        </div>
      ";
            } else {
                // line 542
                echo "        <div class=\"no_indexes_defined\">";
                echo $this->env->getFilter('notice')->getCallable()(_gettext("No index defined!"));
                echo "</div>
      ";
            }
            // line 544
            echo "    </fieldset>

    <fieldset class=\"pma-fieldset tblFooters d-print-none text-start\">
      <form action=\"";
            // line 547
            echo PhpMyAdmin\Url::getFromRoute("/table/indexes");
            echo "\" method=\"post\">
        ";
            // line 548
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
            echo "
        <input type=\"hidden\" name=\"create_index\" value=\"1\">

        ";
            // line 551
            ob_start(function () { return ''; });
            // line 552
            echo "          ";
echo _gettext("Create an index on %s columns");
            // line 553
            echo "        ";
            $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 551
            echo twig_sprintf($___internal_parse_0_, "<input class=\"mx-2\" type=\"number\" name=\"added_fields\" value=\"1\" min=\"1\" max=\"16\" required>");
            // line 554
            echo "
        <input class=\"btn btn-primary add_index ajax\" type=\"submit\" value=\"";
echo _gettext("Go");
            // line 555
            echo "\">
      </form>
    </fieldset>
  </div>
  ";
            // line 559
            echo twig_include($this->env, $context, "modals/index_dialog_modal.twig");
            echo "
";
        }
        // line 561
        echo "
";
        // line 563
        if (($context["have_partitioning"] ?? null)) {
            // line 564
            echo "    ";
            // line 565
            echo "    ";
            if (( !twig_test_empty(($context["partition_names"] ?? null)) &&  !(null === (($__internal_compile_50 = ($context["partition_names"] ?? null)) && is_array($__internal_compile_50) || $__internal_compile_50 instanceof ArrayAccess ? ($__internal_compile_50[0] ?? null) : null)))) {
                // line 566
                echo "        ";
                $context["first_partition"] = (($__internal_compile_51 = ($context["partitions"] ?? null)) && is_array($__internal_compile_51) || $__internal_compile_51 instanceof ArrayAccess ? ($__internal_compile_51[0] ?? null) : null);
                // line 567
                echo "        ";
                $context["range_or_list"] = ((((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["first_partition"] ?? null), "getMethod", [], "method", false, false, false, 567), "RANGE")) || (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 568
($context["first_partition"] ?? null), "getMethod", [], "method", false, false, false, 568), "RANGE COLUMNS"))) || (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 569
($context["first_partition"] ?? null), "getMethod", [], "method", false, false, false, 569), "LIST"))) || (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 570
($context["first_partition"] ?? null), "getMethod", [], "method", false, false, false, 570), "LIST COLUMNS")));
                // line 571
                echo "        ";
                $context["sub_partitions"] = twig_get_attribute($this->env, $this->source, ($context["first_partition"] ?? null), "getSubPartitions", [], "method", false, false, false, 571);
                // line 572
                echo "        ";
                $context["has_sub_partitions"] = twig_get_attribute($this->env, $this->source, ($context["first_partition"] ?? null), "hasSubPartitions", [], "method", false, false, false, 572);
                // line 573
                echo "        ";
                if (($context["has_sub_partitions"] ?? null)) {
                    // line 574
                    echo "            ";
                    $context["first_sub_partition"] = (($__internal_compile_52 = ($context["sub_partitions"] ?? null)) && is_array($__internal_compile_52) || $__internal_compile_52 instanceof ArrayAccess ? ($__internal_compile_52[0] ?? null) : null);
                    // line 575
                    echo "        ";
                }
                // line 576
                echo "
        ";
                // line 577
                if ((0 !== twig_compare(($context["default_sliders_state"] ?? null), "disabled"))) {
                    // line 578
                    echo "        <div class=\"mb-3\">
          <button class=\"btn btn-sm btn-secondary\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#partitionsCollapse\" aria-expanded=\"";
                    // line 579
                    echo (((0 === twig_compare(($context["default_sliders_state"] ?? null), "open"))) ? ("true") : ("false"));
                    echo "\" aria-controls=\"partitionsCollapse\">
            ";
echo _gettext("Partitions");
                    // line 581
                    echo "          </button>
        </div>
        <div class=\"collapse mb-3";
                    // line 583
                    echo (((0 === twig_compare(($context["default_sliders_state"] ?? null), "open"))) ? (" show") : (""));
                    echo "\" id=\"partitionsCollapse\">
        ";
                }
                // line 585
                echo "
        ";
                // line 586
                $this->loadTemplate("table/structure/display_partitions.twig", "table/structure/display_structure.twig", 586)->display(twig_to_array(["db" =>                 // line 587
($context["db"] ?? null), "table" =>                 // line 588
($context["table"] ?? null), "partitions" =>                 // line 589
($context["partitions"] ?? null), "partition_method" => twig_get_attribute($this->env, $this->source,                 // line 590
($context["first_partition"] ?? null), "getMethod", [], "method", false, false, false, 590), "partition_expression" => twig_get_attribute($this->env, $this->source,                 // line 591
($context["first_partition"] ?? null), "getExpression", [], "method", false, false, false, 591), "has_description" =>  !twig_test_empty(twig_get_attribute($this->env, $this->source,                 // line 592
($context["first_partition"] ?? null), "getDescription", [], "method", false, false, false, 592)), "has_sub_partitions" =>                 // line 593
($context["has_sub_partitions"] ?? null), "sub_partition_method" => ((                // line 594
($context["has_sub_partitions"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["first_sub_partition"] ?? null), "getMethod", [], "method", false, false, false, 594)) : ("")), "sub_partition_expression" => ((                // line 595
($context["has_sub_partitions"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["first_sub_partition"] ?? null), "getExpression", [], "method", false, false, false, 595)) : ("")), "range_or_list" =>                 // line 596
($context["range_or_list"] ?? null)]));
                // line 598
                echo "    ";
            } else {
                // line 599
                echo "        ";
                $this->loadTemplate("table/structure/display_partitions.twig", "table/structure/display_structure.twig", 599)->display(twig_to_array(["db" =>                 // line 600
($context["db"] ?? null), "table" =>                 // line 601
($context["table"] ?? null)]));
                // line 603
                echo "    ";
            }
            // line 604
            echo "    ";
            if ((0 !== twig_compare(($context["default_sliders_state"] ?? null), "disabled"))) {
                // line 605
                echo "    </div>
    ";
            }
        }
        // line 608
        echo "
";
        // line 610
        if (($context["show_stats"] ?? null)) {
            // line 611
            echo "    ";
            echo ($context["table_stats"] ?? null);
            echo "
";
        }
        // line 613
        echo "<div class=\"clearfloat\"></div>
";
    }

    public function getTemplateName()
    {
        return "table/structure/display_structure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1463 => 613,  1457 => 611,  1455 => 610,  1452 => 608,  1447 => 605,  1444 => 604,  1441 => 603,  1439 => 601,  1438 => 600,  1436 => 599,  1433 => 598,  1431 => 596,  1430 => 595,  1429 => 594,  1428 => 593,  1427 => 592,  1426 => 591,  1425 => 590,  1424 => 589,  1423 => 588,  1422 => 587,  1421 => 586,  1418 => 585,  1413 => 583,  1409 => 581,  1404 => 579,  1401 => 578,  1399 => 577,  1396 => 576,  1393 => 575,  1390 => 574,  1387 => 573,  1384 => 572,  1381 => 571,  1379 => 570,  1378 => 569,  1377 => 568,  1375 => 567,  1372 => 566,  1369 => 565,  1367 => 564,  1365 => 563,  1362 => 561,  1357 => 559,  1351 => 555,  1347 => 554,  1345 => 551,  1342 => 553,  1339 => 552,  1337 => 551,  1331 => 548,  1327 => 547,  1322 => 544,  1316 => 542,  1310 => 538,  1304 => 537,  1297 => 535,  1289 => 533,  1287 => 532,  1282 => 530,  1278 => 529,  1274 => 528,  1271 => 527,  1265 => 525,  1262 => 524,  1256 => 523,  1253 => 522,  1249 => 520,  1246 => 519,  1242 => 518,  1235 => 516,  1229 => 515,  1223 => 514,  1217 => 513,  1213 => 511,  1211 => 508,  1210 => 506,  1206 => 505,  1203 => 504,  1200 => 503,  1198 => 501,  1197 => 500,  1195 => 499,  1192 => 498,  1190 => 495,  1188 => 494,  1186 => 493,  1182 => 492,  1176 => 489,  1173 => 488,  1171 => 487,  1170 => 486,  1169 => 485,  1166 => 484,  1162 => 483,  1156 => 480,  1153 => 479,  1151 => 478,  1150 => 477,  1149 => 476,  1146 => 475,  1142 => 474,  1139 => 473,  1136 => 472,  1132 => 471,  1125 => 466,  1121 => 465,  1117 => 464,  1113 => 463,  1109 => 462,  1105 => 461,  1101 => 460,  1097 => 459,  1093 => 458,  1089 => 457,  1080 => 452,  1074 => 450,  1072 => 449,  1065 => 446,  1059 => 442,  1057 => 441,  1054 => 440,  1049 => 437,  1045 => 436,  1028 => 433,  1024 => 432,  1020 => 431,  1003 => 430,  1000 => 429,  995 => 426,  989 => 423,  986 => 420,  980 => 418,  978 => 417,  974 => 416,  969 => 415,  967 => 414,  964 => 413,  961 => 412,  955 => 409,  950 => 408,  947 => 407,  944 => 406,  938 => 403,  934 => 402,  929 => 400,  926 => 399,  920 => 396,  915 => 395,  912 => 394,  907 => 392,  903 => 390,  901 => 386,  898 => 385,  896 => 383,  895 => 382,  894 => 381,  890 => 380,  887 => 379,  885 => 378,  883 => 377,  878 => 376,  874 => 374,  872 => 372,  870 => 370,  868 => 369,  865 => 368,  857 => 361,  849 => 356,  845 => 355,  832 => 345,  828 => 344,  824 => 343,  813 => 336,  808 => 334,  805 => 333,  801 => 332,  795 => 329,  791 => 328,  780 => 320,  777 => 319,  774 => 318,  768 => 315,  764 => 314,  759 => 312,  754 => 311,  752 => 310,  746 => 307,  742 => 306,  737 => 304,  733 => 303,  728 => 301,  724 => 300,  719 => 298,  715 => 297,  710 => 295,  705 => 294,  703 => 293,  697 => 290,  693 => 289,  688 => 287,  683 => 286,  681 => 285,  675 => 282,  671 => 281,  668 => 280,  666 => 277,  665 => 276,  659 => 272,  652 => 270,  648 => 268,  643 => 265,  639 => 263,  636 => 262,  632 => 260,  626 => 257,  623 => 256,  621 => 255,  620 => 254,  619 => 253,  613 => 252,  607 => 249,  604 => 248,  602 => 247,  601 => 246,  600 => 245,  594 => 244,  592 => 243,  587 => 242,  585 => 241,  579 => 238,  576 => 237,  574 => 235,  573 => 234,  572 => 233,  571 => 232,  570 => 230,  569 => 229,  564 => 228,  559 => 227,  555 => 224,  547 => 222,  541 => 219,  538 => 218,  536 => 217,  535 => 216,  534 => 215,  533 => 214,  527 => 213,  525 => 212,  524 => 211,  523 => 210,  522 => 209,  521 => 208,  520 => 207,  515 => 206,  511 => 203,  505 => 200,  502 => 199,  500 => 198,  499 => 197,  498 => 196,  497 => 195,  491 => 194,  483 => 192,  481 => 191,  476 => 190,  474 => 180,  470 => 178,  464 => 175,  461 => 174,  459 => 173,  458 => 172,  457 => 171,  456 => 170,  450 => 169,  442 => 167,  440 => 166,  436 => 165,  432 => 163,  426 => 160,  423 => 159,  421 => 158,  420 => 157,  419 => 156,  418 => 155,  412 => 154,  404 => 152,  402 => 151,  398 => 150,  394 => 148,  388 => 145,  385 => 144,  383 => 143,  382 => 142,  381 => 141,  380 => 140,  374 => 139,  366 => 137,  364 => 136,  359 => 135,  355 => 133,  350 => 130,  346 => 129,  344 => 128,  341 => 127,  338 => 126,  336 => 125,  333 => 124,  326 => 120,  323 => 119,  321 => 118,  320 => 116,  319 => 115,  318 => 114,  317 => 113,  314 => 112,  307 => 108,  304 => 107,  302 => 105,  301 => 104,  300 => 103,  299 => 102,  296 => 101,  294 => 100,  289 => 99,  283 => 96,  280 => 95,  278 => 94,  275 => 93,  270 => 91,  267 => 89,  265 => 88,  262 => 86,  259 => 84,  257 => 83,  255 => 82,  251 => 80,  247 => 79,  244 => 78,  236 => 76,  234 => 75,  229 => 72,  221 => 70,  219 => 69,  218 => 68,  214 => 67,  209 => 65,  202 => 62,  196 => 60,  188 => 58,  186 => 57,  182 => 56,  177 => 54,  170 => 52,  165 => 49,  163 => 48,  160 => 47,  158 => 46,  155 => 45,  153 => 44,  150 => 43,  147 => 42,  142 => 41,  139 => 40,  134 => 36,  128 => 34,  125 => 33,  122 => 32,  117 => 30,  112 => 28,  110 => 27,  107 => 26,  103 => 25,  99 => 24,  95 => 23,  91 => 22,  87 => 21,  80 => 17,  75 => 13,  72 => 12,  69 => 10,  67 => 9,  65 => 8,  63 => 7,  59 => 5,  55 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "table/structure/display_structure.twig", "/home/ictfjcom/public_html/BIS_DEV/core/libs/nudb/templates/table/structure/display_structure.twig");
    }
}
