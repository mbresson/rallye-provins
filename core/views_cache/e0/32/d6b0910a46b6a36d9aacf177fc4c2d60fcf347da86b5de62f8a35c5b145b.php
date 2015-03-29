<?php

/* page-itinerary-summary.twig */
class __TwigTemplate_e032d6b0910a46b6a36d9aacf177fc4c2d60fcf347da86b5de62f8a35c5b145b extends Twig_Template
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
            'body_classes' => array($this, 'block_body_classes'),
            'section_tag' => array($this, 'block_section_tag'),
            'section' => array($this, 'block_section'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "skel/html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["itinerary"] = $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body_classes($context, array $blocks = array())
    {
        $this->displayParentBlock("body_classes", $context, $blocks);
        echo " itinerary ";
    }

    // line 7
    public function block_section_tag($context, array $blocks = array())
    {
        $this->displayParentBlock("section_tag", $context, $blocks);
        echo " data-itinerary='";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "id", array()), "html", null, true);
        echo "' ";
    }

    // line 9
    public function block_section($context, array $blocks = array())
    {
        // line 10
        echo "
<h2 class='center'>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "name", array()), "html", null, true);
        echo "</h2>

<h3 class='center'>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "pitch", array()), "html", null, true);
        echo "</h3>

";
        // line 15
        if (($this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "start", array()) == $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "arrival", array()))) {
            // line 16
            echo "  <p class='start-arrival center'>
    <strong>";
            // line 17
            echo gettext("Start / Arrival:");
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "start", array()), "html", null, true);
            echo "
  </p>
";
        } else {
            // line 20
            echo "  <p class='start center'>
    <strong>";
            // line 21
            echo gettext("Start:");
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "start", array()), "html", null, true);
            echo "
  </p>

  <p class='arrival center'>
    <strong>";
            // line 25
            echo gettext("Arrival:");
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "arrival", array()), "html", null, true);
            echo "
  </p>
";
        }
        // line 28
        echo "
";
        // line 29
        $this->env->loadTemplate("table-itinerary-summary.twig")->display(array_merge($context, array("itinerary" => (isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")))));
        // line 30
        echo "
<div class='center preview'>
  <img src='";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/itineraries/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "preview-map", array(), "array"), "html", null, true);
        echo "' alt='' />
</div>

<p class='center'>
<a href='";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site(("/download/" . $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "I18N", array()), "preferred_language", array()))), "html", null, true);
        echo "?itinerary=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["itinerary"]) ? $context["itinerary"] : $this->getContext($context, "itinerary")), "id", array()), "html", null, true);
        echo "' title='";
        echo gettext("Start");
        echo "' data-msg-resume='";
        echo gettext("Resume");
        echo "' class='button' id='start-itinerary'>
    ";
        // line 37
        echo gettext("Start");
        // line 38
        echo "  </a>
</p>

";
    }

    public function getTemplateName()
    {
        return "page-itinerary-summary.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 38,  134 => 37,  124 => 36,  115 => 32,  111 => 30,  109 => 29,  106 => 28,  98 => 25,  89 => 21,  86 => 20,  78 => 17,  75 => 16,  73 => 15,  68 => 13,  63 => 11,  60 => 10,  57 => 9,  48 => 7,  41 => 5,  37 => 1,  35 => 3,  11 => 1,);
    }
}
