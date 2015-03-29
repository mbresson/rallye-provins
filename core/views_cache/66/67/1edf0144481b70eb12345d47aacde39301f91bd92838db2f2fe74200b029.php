<?php

/* page-itinerary-step.twig */
class __TwigTemplate_66671edf0144481b70eb12345d47aacde39301f91bd92838db2f2fe74200b029 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("skel/html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_section_tag($context, array $blocks = array())
    {
        $this->displayParentBlock("section_tag", $context, $blocks);
        echo " data-itinerary='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array()), "html", null, true);
        echo "' data-stepindex='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "position", array()), "html", null, true);
        echo "' ";
    }

    // line 14
    public function block_section($context, array $blocks = array())
    {
        // line 15
        echo "

<div class='contents'>
";
        // line 18
        $this->env->loadTemplate("skel/array-contents.twig")->display(array_merge($context, array("contents" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "contents", array()), "contents", array()))));
        // line 19
        echo "</div><!-- .contents -->


";
        // line 22
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : null), "data", array(), "any", false, true), "step", array(), "any", false, true), "contents", array(), "any", false, true), "question", array(), "any", true, true)) {
            // line 23
            echo "
  ";
            // line 24
            $context["question"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "contents", array()), "question", array());
            // line 25
            echo "
  <div class='question'>
    <h3>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "contents", array()), "html", null, true);
            echo "</h3>

    <form method='get' action='#'>
      <fieldset>
        ";
            // line 31
            if (twig_test_iterable($this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "answer", array()))) {
                // line 32
                echo "          <legend class='small'><em>";
                echo gettext("Multiple choice question");
                echo "</em></legend>

          ";
                // line 34
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "choices", array()));
                foreach ($context['_seq'] as $context["choiceIndex"] => $context["choice"]) {
                    // line 35
                    echo "            <div class='choice ";
                    if (twig_in_filter($context["choiceIndex"], $this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "answer", array()))) {
                        echo "right";
                    } else {
                        echo "wrong";
                    }
                    echo "'>
              <label for='question-choice-";
                    // line 36
                    echo twig_escape_filter($this->env, $context["choiceIndex"], "html", null, true);
                    echo "'>
                <input type='checkbox' name='choice' value='";
                    // line 37
                    echo twig_escape_filter($this->env, $context["choiceIndex"], "html", null, true);
                    echo "' id='question-choice-";
                    echo twig_escape_filter($this->env, $context["choiceIndex"], "html", null, true);
                    echo "' />
                ";
                    // line 38
                    echo twig_escape_filter($this->env, $context["choice"], "html", null, true);
                    echo "
              </label>
            </div>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['choiceIndex'], $context['choice'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 42
                echo "
        ";
            } else {
                // line 44
                echo "
          ";
                // line 45
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "choices", array()));
                foreach ($context['_seq'] as $context["choiceIndex"] => $context["choice"]) {
                    // line 46
                    echo "            <div class='choice ";
                    if (($this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "answer", array()) == $context["choiceIndex"])) {
                        echo "right";
                    } else {
                        echo "wrong";
                    }
                    echo "'>
              <label for='question-choice-";
                    // line 47
                    echo twig_escape_filter($this->env, $context["choiceIndex"], "html", null, true);
                    echo "'>
                <input type='radio' name='choice' value='";
                    // line 48
                    echo twig_escape_filter($this->env, $context["choiceIndex"], "html", null, true);
                    echo "' id='question-choice-";
                    echo twig_escape_filter($this->env, $context["choiceIndex"], "html", null, true);
                    echo "' />
                ";
                    // line 49
                    echo twig_escape_filter($this->env, $context["choice"], "html", null, true);
                    echo "
              </label>
            </div>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['choiceIndex'], $context['choice'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 53
                echo "
        ";
            }
            // line 55
            echo "
        <input type='hidden' value='";
            // line 56
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "answer", array())), "html", null, true);
            echo "' name='answer' />

      </fieldset>

      <input type=\"submit\" class='button submit' value='";
            // line 60
            echo gettext("Check");
            echo "' />

      ";
            // line 62
            if ($this->getAttribute((isset($context["question"]) ? $context["question"] : null), "explanations", array(), "any", true, true)) {
                // line 63
                echo "        <div class='explanations'>
          ";
                // line 64
                $this->env->loadTemplate("skel/array-contents.twig")->display(array_merge($context, array("contents" => $this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "explanations", array()))));
                // line 65
                echo "        </div>
      ";
            }
            // line 67
            echo "
    </form>
  </div><!-- .question -->
";
        }
        // line 71
        echo "

";
        // line 74
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "position", array()) + 1) == twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "contents", array()), "steps", array())))) {
            // line 75
            echo "<div class='center'>
  <p>
    <a class='button' id='link-home' href='";
            // line 77
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site("/itineraries"), "html", null, true);
            echo "' title=''>";
            echo gettext("Go back to the home screen");
            echo "</a>
  </p>
</div>
";
        }
        // line 81
        echo "

<div class='controls'>

  ";
        // line 86
        echo "  ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "position", array()) > 0)) {
            // line 87
            echo "
    ";
            // line 88
            $context["stepBackUrl"] = $this->env->getExtension('slim')->site(((("/itineraries/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array())) . "/") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "contents", array()), "steps", array()), ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "position", array()) - 1), array(), "array")));
            // line 89
            echo "
    <a href='";
            // line 90
            echo twig_escape_filter($this->env, (isset($context["stepBackUrl"]) ? $context["stepBackUrl"] : $this->getContext($context, "stepBackUrl")), "html", null, true);
            echo "' title='";
            echo gettext("Previous step");
            echo "' class='step-back'>
      <img src='";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
            echo "img/left_arrow.png' alt='";
            echo gettext("Previous step");
            echo "' />
    </a>

  ";
        }
        // line 95
        echo "
  ";
        // line 97
        echo "  ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "position", array()) < (twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "contents", array()), "steps", array())) - 1))) {
            // line 98
            echo "
    ";
            // line 99
            $context["stepNextUrl"] = $this->env->getExtension('slim')->site(((("/itineraries/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "id", array())) . "/") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "itinerary", array()), "contents", array()), "steps", array()), ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "step", array()), "position", array()) + 1), array(), "array")));
            // line 100
            echo "
    <a href='";
            // line 101
            echo twig_escape_filter($this->env, (isset($context["stepNextUrl"]) ? $context["stepNextUrl"] : $this->getContext($context, "stepNextUrl")), "html", null, true);
            echo "' title='";
            echo gettext("Next step");
            echo "' class='step-next'>
      <img src='";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
            echo "img/right_arrow.png' alt='";
            echo gettext("Next step");
            echo "' />
    </a>

  ";
        }
        // line 106
        echo "</div><!-- .controls -->


";
    }

    public function getTemplateName()
    {
        return "page-itinerary-step.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 106,  269 => 102,  263 => 101,  260 => 100,  258 => 99,  255 => 98,  252 => 97,  249 => 95,  240 => 91,  234 => 90,  231 => 89,  229 => 88,  226 => 87,  223 => 86,  217 => 81,  208 => 77,  204 => 75,  202 => 74,  198 => 71,  192 => 67,  188 => 65,  186 => 64,  183 => 63,  181 => 62,  176 => 60,  169 => 56,  166 => 55,  162 => 53,  152 => 49,  146 => 48,  142 => 47,  133 => 46,  129 => 45,  126 => 44,  122 => 42,  112 => 38,  106 => 37,  102 => 36,  93 => 35,  89 => 34,  83 => 32,  81 => 31,  74 => 27,  70 => 25,  68 => 24,  65 => 23,  63 => 22,  58 => 19,  56 => 18,  51 => 15,  48 => 14,  37 => 12,  11 => 2,);
    }
}
