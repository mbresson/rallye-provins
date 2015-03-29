<?php

/* page-itineraries.twig */
class __TwigTemplate_cce5316ace6e96cd05d16b9d2bd8f2b2267a820a0664e1ba16f9e61973ba662f extends Twig_Template
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
        echo "  <ul class='itineraries'>
    ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itineraries", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["itinerary_id"] => $context["itinerary"]) {
            // line 6
            echo "    <li class='itinerary'>
      <a href='";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site(("/itineraries/" . $context["itinerary_id"])), "html", null, true);
            echo "' title=''>
        <h2 class='name'>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["itinerary"], "name", array()), "html", null, true);
            echo "</h2>

        ";
            // line 10
            $this->env->loadTemplate("table-itinerary-summary.twig")->display(array_merge($context, array("itinerary" => $context["itinerary"])));
            // line 11
            echo "      </a>
    </li>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['itinerary_id'], $context['itinerary'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "  </ul>
";
    }

    public function getTemplateName()
    {
        return "page-itineraries.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 14,  73 => 11,  71 => 10,  66 => 8,  62 => 7,  59 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
