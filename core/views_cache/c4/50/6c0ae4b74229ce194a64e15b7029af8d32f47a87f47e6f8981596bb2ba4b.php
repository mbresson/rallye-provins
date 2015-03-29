<?php

/* page-404.twig */
class __TwigTemplate_c4506c0ae4b74229ce194a64e15b7029af8d32f47a87f47e6f8981596bb2ba4b extends Twig_Template
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
        echo gettext("Page not found! Are you lost?");
        echo "</h2>

<h3>
  <a href='";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->site("/"), "html", null, true);
        echo "' class='button' title=\"";
        echo gettext("Go back home");
        echo "\">";
        echo gettext("Go back home");
        echo "</a>
</h3>

";
    }

    public function getTemplateName()
    {
        return "page-404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 8,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
