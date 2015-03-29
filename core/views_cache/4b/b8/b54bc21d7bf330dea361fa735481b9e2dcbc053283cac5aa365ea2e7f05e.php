<?php

/* page-about.twig */
class __TwigTemplate_4bb8b54bc21d7bf330dea361fa735481b9e2dcbc053283cac5aa365ea2e7f05e extends Twig_Template
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
<h2>";
        // line 5
        echo gettext("Rallye Provins 2014-2015");
        echo "</h2>

<p>";
        // line 7
        echo gettext("Rallye Provins is a web application created by a team of four students of IMAC engineering school. Visitors in Provins can use it to discover the town in an entertaining way.");
        echo "</p>

<div class='logo'>
  <a href='http://www.ingenieur-imac.fr/' title='' target='_blank'><img src='";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/imac.png' alt='' /></a>
</div>

<p>
  ";
        // line 14
        $context["email"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "contact", array()), "email", array());
        // line 15
        echo "  ";
        echo strtr(gettext("If you have any comment or request, please contact us at <a href='mailto:%email%' title=''>%email%</a>"), array("%email%" => (isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")), "%email%" => (isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")), ));
        // line 16
        echo "</p>

<h3>";
        // line 18
        echo gettext("Rallye Provins was created by:");
        echo "</h3>

<ul>
  <li><em>Marie Benoist</em></li>
  <li><em>Matthieu Bresson</em></li>
  <li><em>Lisa Françoise</em></li>
  <li><em>Alice Neichols</em></li>
</ul>

<h4>";
        // line 27
        echo gettext("Many thanks to our translators:");
        echo "</h4>

<ul>
  <li><em>Dominique Touré</em> (";
        // line 30
        echo gettext("English translation");
        echo ")</li>
</ul>

<h3 class='copyright'>© Rallye Provins ";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "</h3>

";
    }

    public function getTemplateName()
    {
        return "page-about.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 33,  87 => 30,  81 => 27,  69 => 18,  65 => 16,  62 => 15,  60 => 14,  53 => 10,  47 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
