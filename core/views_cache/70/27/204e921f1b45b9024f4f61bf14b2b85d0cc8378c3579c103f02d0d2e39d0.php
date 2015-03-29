<?php

/* page-start.twig */
class __TwigTemplate_7027204e921f1b45b9024f4f61bf14b2b85d0cc8378c3579c103f02d0d2e39d0 extends Twig_Template
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
            'html_title' => array($this, 'block_html_title'),
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
    public function block_html_title($context, array $blocks = array())
    {
    }

    // line 5
    public function block_section($context, array $blocks = array())
    {
        // line 6
        echo "
<div class='cover'>
  <img src='";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "img/logo.png' alt='' />

  <h1>Rallye<br />PROVINS</h1>
</div><!-- .cover -->

<div class='language-selector'>
";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "I18N", array()), "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 15
            echo "
  <a class='button' href='";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site(("/itineraries?lc=" . $this->getAttribute($context["language"], "html", array()))), "html", null, true);
            echo "' title='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()), "html", null, true);
            echo "</a>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "page-start.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 19,  65 => 16,  62 => 15,  58 => 14,  49 => 8,  45 => 6,  42 => 5,  37 => 3,  11 => 1,);
    }
}
