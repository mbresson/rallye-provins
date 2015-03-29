<?php

/* page-itinerary-download.twig */
class __TwigTemplate_9309ee8283dc85abce52c65237df347d9c1685c964d827a8ebee3adde4524819 extends Twig_Template
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
            'html_tag' => array($this, 'block_html_tag'),
            'section' => array($this, 'block_section'),
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
    public function block_html_tag($context, array $blocks = array())
    {
        echo "manifest=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "cache", array()), "path", array()), "html", null, true);
        echo "\"";
    }

    // line 5
    public function block_section($context, array $blocks = array())
    {
        // line 6
        echo "
  <div class='downloader'
    data-itinerary='";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array()), "html", null, true);
        echo "'
    data-numsteps='";
        // line 9
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "steps", array())), "html", null, true);
        echo "'
    data-stepurl='";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site((("itineraries/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array())) . "/")), "html", null, true);
        echo "'
    data-steps='";
        // line 11
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "steps", array())), "html", null, true);
        echo "'>
  <h2>";
        // line 12
        echo gettext("The itinerary is loading, please wait...");
        echo "</h2>

  <div id='download-meter' class='meter' data-numFiles='";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "cache", array()), "numFiles", array()), "html", null, true);
        echo "' data-filesDownloaded='0'>
    <span style='width: 0%'></span>
  </div>
  </div><!-- .downloader -->

  <h2 class='hidden failure'>";
        // line 19
        echo gettext("Sorry, the itinerary could't be loaded!");
        echo "</h2>

";
    }

    public function getTemplateName()
    {
        return "page-itinerary-download.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 19,  73 => 14,  68 => 12,  64 => 11,  60 => 10,  56 => 9,  52 => 8,  48 => 6,  45 => 5,  37 => 3,  11 => 1,);
    }
}
