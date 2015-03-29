<?php

/* skel/array-contents.twig */
class __TwigTemplate_5296532077b1c01fc789c34af6867987a5c80ffa6e5dc9e77bc3bbe1aa96592a extends Twig_Template
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
            if ($this->getAttribute($context["item"], "icon", array(), "any", true, true)) {
                // line 11
                echo "  <div class='with-icon'>

    <img class='icon' src='";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
                echo "img/itineraries/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", array()), "html", null, true);
                echo "' alt='' />
  ";
            }
            // line 15
            echo "
  ";
            // line 16
            $context["classes"] = "";
            // line 17
            echo "  ";
            if ($this->getAttribute($context["item"], "classes", array(), "any", true, true)) {
                // line 18
                echo "  ";
                $context["classes"] = twig_join_filter($this->getAttribute($context["item"], "classes", array()), " ");
                // line 19
                echo "  ";
            }
            // line 20
            echo "
  ";
            // line 21
            if (($this->getAttribute($context["item"], "type", array()) == "title")) {
                // line 22
                echo "
    <h2 class='";
                // line 23
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), "html", null, true);
                echo "'>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "contents", array()), "html", null, true);
                echo "</h2>

  ";
            } elseif (($this->getAttribute(            // line 25
$context["item"], "type", array()) == "paragraph")) {
                // line 26
                echo "
    <p class='";
                // line 27
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), "html", null, true);
                echo "'>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "contents", array()), "html", null, true);
                echo "</p>

  ";
            } elseif (($this->getAttribute(            // line 29
$context["item"], "type", array()) == "image")) {
                // line 30
                echo "
    <div class='image ";
                // line 31
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), "html", null, true);
                echo "'>
      <img src='";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
                echo "img/itineraries/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "src", array()), "html_attr");
                echo "' alt='";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "alt", array()), "html_attr");
                echo "' />
    </div>

  ";
            }
            // line 36
            echo "
  ";
            // line 37
            if ($this->getAttribute($context["item"], "icon", array(), "any", true, true)) {
                // line 38
                echo "  </div>
  ";
            }
            // line 40
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "
";
    }

    public function getTemplateName()
    {
        return "skel/array-contents.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 42,  115 => 40,  111 => 38,  109 => 37,  106 => 36,  95 => 32,  91 => 31,  88 => 30,  86 => 29,  79 => 27,  76 => 26,  74 => 25,  67 => 23,  64 => 22,  62 => 21,  59 => 20,  56 => 19,  53 => 18,  50 => 17,  48 => 16,  45 => 15,  38 => 13,  34 => 11,  32 => 10,  29 => 9,  25 => 8,  22 => 7,  19 => 1,);
    }
}
