<?php

/* array-contents.twig */
class __TwigTemplate_98ee839287432e9c02a8b2a4c89e35bfed2f22c54fff7ebad1a089561db03545 extends Twig_Template
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
        // line 7
        echo "
";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contents"]) ? $context["contents"] : $this->getContext($context, "contents")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 9
            echo "
  ";
            // line 10
            $context["classes"] = "";
            // line 11
            echo "  ";
            if ($this->getAttribute($context["item"], "classes", array(), "any", true, true)) {
                // line 12
                echo "  ";
                $context["classes"] = twig_join_filter($this->getAttribute($context["item"], "classes", array()), " ");
                // line 13
                echo "  ";
            }
            // line 14
            echo "
  ";
            // line 15
            if (($this->getAttribute($context["item"], "type", array()) == "title")) {
                // line 16
                echo "
    <h2 class='";
                // line 17
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), "html", null, true);
                echo "'>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "contents", array()), "html", null, true);
                echo "</h2>

  ";
            } elseif (($this->getAttribute(            // line 19
$context["item"], "type", array()) == "paragraph")) {
                // line 20
                echo "
    <p class='";
                // line 21
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), "html", null, true);
                echo "'>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "contents", array()), "html", null, true);
                echo "</p>

  ";
            } elseif (($this->getAttribute(            // line 23
$context["item"], "type", array()) == "image")) {
                // line 24
                echo "
    <div class='image ";
                // line 25
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), "html", null, true);
                echo "'>
      <img src='";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
                echo "img/itineraries/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "src", array()), "html_attr");
                echo "' alt='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "alt", array()), "html_attr");
                echo "' />
    </div>

  ";
            }
            // line 30
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
";
    }

    public function getTemplateName()
    {
        return "array-contents.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 32,  90 => 30,  79 => 26,  75 => 25,  72 => 24,  70 => 23,  63 => 21,  60 => 20,  58 => 19,  51 => 17,  48 => 16,  46 => 15,  43 => 14,  40 => 13,  37 => 12,  34 => 11,  32 => 10,  29 => 9,  25 => 8,  22 => 7,  19 => 1,);
    }
}
