<?php

/* skel/header.twig */
class __TwigTemplate_8f97b6bb38ee210e7be6d3fc266c6a94cf79ca58f5a5194263110cf9400dc207 extends Twig_Template
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
";
        // line 2
        if (($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "page", array()), "id", array()) != "start")) {
            // line 3
            echo "<header>
  <div id='hamburger'>
    <div></div>
    <div></div>
    <div></div>
  </div><!-- .hamburger -->

  <h1>
    ";
            // line 11
            if (($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "page", array()), "id", array()) == "itinerary-step")) {
                // line 12
                echo "    <span class='step-index'>";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "position", array()) + 1), "html", null, true);
                echo " - </span>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "name", array()), "html", null, true);
                echo "
    ";
            } else {
                // line 14
                echo "    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "page", array()), "title", array()), "html", null, true);
                echo "
    ";
            }
            // line 16
            echo "  </h1>
</header>
";
        }
        // line 19
        echo "
";
    }

    public function getTemplateName()
    {
        return "skel/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 19,  50 => 16,  44 => 14,  36 => 12,  34 => 11,  24 => 3,  22 => 2,  19 => 1,);
    }
}
