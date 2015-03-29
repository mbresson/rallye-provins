<?php

/* skel/nav.twig */
class __TwigTemplate_08df018080b7555b75a6f627320e381170653151ac068db137595aa19eb514f1 extends Twig_Template
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
<nav>

  <ul>
    <li>
      <a href='";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site("/start"), "html", null, true);
        echo "' title='' id='nav-home'>
        <span class='center'>
          <img alt='' src='";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/menu-home.png' />
          ";
        // line 9
        echo gettext("Home");
        // line 10
        echo "        </span>
      </a>
    </li>

    <li>
      <a href='";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site("/map"), "html", null, true);
        echo "' title='' id='nav-map'>
        <span class='center'>
          <img alt='' src='";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/menu-map.png' />
          ";
        // line 18
        echo gettext("Map");
        // line 19
        echo "        </span>
      </a>
    </li>

    <li>
      <a href='";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site("/itineraries"), "html", null, true);
        echo "' id='nav-itineraries' title=''>
        <span class='center'>
          <img alt='' src='";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/menu-itineraries.png' />
          ";
        // line 27
        echo gettext("Itineraries");
        // line 28
        echo "        </span>
      </a>
    </li>

    <li>
      ";
        // line 33
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : null), "cookies", array(), "any", false, true), "itinerary", array(), "any", false, true), "id", array(), "any", true, true)) {
            // line 34
            echo "        ";
            $context["stepsUrl"] = $this->env->getExtension('slim')->site((("/itineraries/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "cookies", array()), "itinerary", array()), "id", array())) . "/steps"));
            // line 35
            echo "        ";
            $context["disabled"] = false;
            // line 36
            echo "      ";
        } else {
            // line 37
            echo "        ";
            $context["stepsUrl"] = $this->env->getExtension('slim')->site("/404");
            // line 38
            echo "        ";
            $context["disabled"] = true;
            // line 39
            echo "      ";
        }
        // line 40
        echo "
      <a href='";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["stepsUrl"]) ? $context["stepsUrl"] : $this->getContext($context, "stepsUrl")), "html", null, true);
        echo "' title='' id='nav-steps' class='";
        if ((isset($context["disabled"]) ? $context["disabled"] : $this->getContext($context, "disabled"))) {
            echo "disabled";
        }
        echo "'>
        <span class='center'>
          <img alt='' src='";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/menu-steps";
        if ((isset($context["disabled"]) ? $context["disabled"] : $this->getContext($context, "disabled"))) {
            echo "-disabled";
        }
        echo ".png' />
          ";
        // line 44
        echo gettext("Steps");
        // line 45
        echo "        </span>
      </a>
    </li>

    <li>
      <a href='";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site("/share"), "html", null, true);
        echo "' id='nav-share' title=''>
        <span class='center'>
          <img alt='' src='";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/menu-share.png' />
          ";
        // line 53
        echo gettext("Share");
        // line 54
        echo "        </span>
      </a>
    </li>

    <li>
      <a href='";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site("/about"), "html", null, true);
        echo "' id='nav-about' title=''>
        <span class='center'>
          <img alt='' src='";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/menu-about.png' />
          ";
        // line 62
        echo gettext("About");
        // line 63
        echo "        </span>
      </a>
    </li>
  </ul>

</nav>

";
    }

    public function getTemplateName()
    {
        return "skel/nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 63,  156 => 62,  152 => 61,  147 => 59,  140 => 54,  138 => 53,  134 => 52,  129 => 50,  122 => 45,  120 => 44,  112 => 43,  103 => 41,  100 => 40,  97 => 39,  94 => 38,  91 => 37,  88 => 36,  85 => 35,  82 => 34,  80 => 33,  73 => 28,  71 => 27,  67 => 26,  62 => 24,  55 => 19,  53 => 18,  49 => 17,  44 => 15,  37 => 10,  35 => 9,  31 => 8,  26 => 6,  19 => 1,);
    }
}
