<?php

/* page-map.twig */
class __TwigTemplate_16f3e1aaf97a1132df73c368480564d030f8e5bcd3028b922c64e09ffdf60680 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("skel/html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'section' => array($this, 'block_section'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "skel/html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_section($context, array $blocks = array())
    {
        // line 4
        echo "<div class='map-wrapper'>
  ";
        // line 5
        if ($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : null), "data", array(), "any", false, true), "itinerary", array(), "any", true, true)) {
            // line 6
            echo "
    ";
            // line 7
            $context["baseStepUrl"] = $this->env->getExtension('slim')->site((("itineraries/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array())) . "/"));
            // line 8
            echo "    <div class='map' data-steps='";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "steps", array())), "html", null, true);
            echo "' data-itinerary='";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array()), "html", null, true);
            echo "' data-basestepurl='";
            echo twig_escape_filter($this->env, (isset($context["baseStepUrl"]) ? $context["baseStepUrl"] : $this->getContext($context, "baseStepUrl")), "html", null, true);
            echo "'>
    </div>
  ";
        } else {
            // line 11
            echo "    <div class='map generic'></div>
  ";
        }
        // line 13
        echo "</div><!-- .map-wrapper -->
";
    }

    // line 16
    public function block_scripts($context, array $blocks = array())
    {
        // line 17
        echo "<script src=\"https://maps.google.com/maps/api/js?sensor=true\" type=\"text/javascript\"></script>
";
        // line 18
        $this->displayParentBlock("scripts", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "page-map.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 18,  73 => 17,  70 => 16,  65 => 13,  61 => 11,  50 => 8,  48 => 7,  45 => 6,  43 => 5,  40 => 4,  37 => 3,  11 => 1,);
    }
}
