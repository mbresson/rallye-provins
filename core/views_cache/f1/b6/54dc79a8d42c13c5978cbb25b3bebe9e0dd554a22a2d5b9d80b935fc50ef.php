<?php

/* page-itinerary-steps.twig */
class __TwigTemplate_f1b654dc79a8d42c13c5978cbb25b3bebe9e0dd554a22a2d5b9d80b935fc50ef extends Twig_Template
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
        echo "
<h3>";
        // line 5
        echo gettext("Your progression:");
        echo "</h3>

<div class='progress' data-numsteps='";
        // line 7
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "steps", array())), "html", null, true);
        echo "'>
  <div class='step-container start'>
    <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/progress-start.png\" alt=\"\" />
  </div>

  <div class='step-container line'>
    <div class='step'></div>
  </div>

  <div class='step-container cursor'>
    <div class='step'></div>
  </div>

  <div class='step-container line'>
    <div class='step'></div>
  </div>

  <div class='step-container end'>
    <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/progress-end.png\" alt=\"\" />
  </div>
</div>

<ul class='steps' data-itinerary='";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array()), "html", null, true);
        echo "'>
  ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "steps", array()));
        foreach ($context['_seq'] as $context["step_position"] => $context["step"]) {
            // line 31
            echo "  <li class='step state-locked' data-position='";
            echo twig_escape_filter($this->env, $context["step_position"], "html", null, true);
            echo "'>
    <h3>
      <a href='";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site(((("itineraries/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array())) . "/") . $this->getAttribute($context["step"], "id", array()))), "html", null, true);
            echo "' title='' class='step-url'>
        <img alt='";
            // line 34
            echo gettext("Locked");
            echo " - ' src='";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
            echo "img/step-locked.png' class='icon state state-locked' />
        <img alt='";
            // line 35
            echo gettext("Current");
            echo " - ' src='";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
            echo "img/step-current.png' class='icon state state-current' />
        <img alt='";
            // line 36
            echo gettext("Complete");
            echo " - ' src='";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
            echo "img/step-complete.png' class='icon state state-complete' />

        <span class='position'>";
            // line 38
            echo twig_escape_filter($this->env, ($context["step_position"] + 1), "html", null, true);
            echo " - </span>

        <span class='name'>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($context["step"], "name", array()), "html", null, true);
            echo "</span>
      </a>
    </h3>
  </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['step_position'], $context['step'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "</ul>

";
    }

    public function getTemplateName()
    {
        return "page-itinerary-steps.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 45,  120 => 40,  115 => 38,  108 => 36,  102 => 35,  96 => 34,  92 => 33,  86 => 31,  82 => 30,  78 => 29,  71 => 25,  52 => 9,  47 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
