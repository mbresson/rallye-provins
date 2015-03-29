<?php

/* table-itinerary-summary.twig */
class __TwigTemplate_3f9121d3abff94a5ddedf462f643e9f021e50c2405c90cc0eee2e41d586b7302 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<table class='summary'>
  <tr>
    ";
        // line 4
        $context["hours"] = intval(floor(($this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "duration", array()) / 60)));
        // line 5
        echo "    ";
        $context["minutes"] = ($this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "duration", array()) - ((isset($context["hours"]) ? $context["hours"] : $this->getContext($context, "hours")) * 60));
        // line 6
        echo "
    <td class='duration'>
      <img alt='";
        // line 8
        echo gettext("Duration:");
        echo " ' src='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/itinerary-duration.png' class='icon' />

      <p>
        ";
        // line 11
        if (((isset($context["minutes"]) ? $context["minutes"] : $this->getContext($context, "minutes")) == 0)) {
            // line 12
            echo "          ";
            echo strtr(ngettext("1 hour", "%hours% hours", abs((isset($context["hours"]) ? $context["hours"] : $this->getContext($context, "hours")))), array("%hours%" => (isset($context["hours"]) ? $context["hours"] : $this->getContext($context, "hours")), ));
            // line 13
            echo "        ";
        } elseif (((isset($context["hours"]) ? $context["hours"] : $this->getContext($context, "hours")) == 0)) {
            // line 14
            echo "          ";
            echo strtr(ngettext("1 minute", "%minutes% minutes", abs((isset($context["minutes"]) ? $context["minutes"] : $this->getContext($context, "minutes")))), array("%minutes%" => (isset($context["minutes"]) ? $context["minutes"] : $this->getContext($context, "minutes")), ));
            // line 15
            echo "        ";
        } else {
            // line 16
            echo "          ";
            echo strtr(gettext("%hours%h%minutes%"), array("%hours%" => (isset($context["hours"]) ? $context["hours"] : $this->getContext($context, "hours")), "%minutes%" => (isset($context["minutes"]) ? $context["minutes"] : $this->getContext($context, "minutes")), ));
            // line 17
            echo "        ";
        }
        // line 18
        echo "      </p>
    </td><!-- .duration -->

    <td class='distance'>
      <img alt='";
        // line 22
        echo gettext("Distance:");
        echo " ' src='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/itinerary-distance.png' class='icon' />

      <p>
        ";
        // line 25
        $context["distance"] = $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "distance", array());
        // line 26
        echo "        ";
        echo strtr(gettext("%distance% km"), array("%distance%" => (isset($context["distance"]) ? $context["distance"] : $this->getContext($context, "distance")), ));
        // line 27
        echo "      </p>
    </td><!-- .distance -->

    <td class='public'>
      <img alt='";
        // line 31
        echo gettext("Public:");
        echo " ' src='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/itinerary-public.png' class='icon' />

      <p>
        ";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "target", array()), "html", null, true);
        echo "
      </p>
    </td><!-- .public -->

  </tr>
</table><!-- .summary -->


";
    }

    public function getTemplateName()
    {
        return "table-itinerary-summary.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 34,  86 => 31,  80 => 27,  77 => 26,  75 => 25,  67 => 22,  61 => 18,  58 => 17,  55 => 16,  52 => 15,  49 => 14,  46 => 13,  43 => 12,  41 => 11,  33 => 8,  29 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }
}
