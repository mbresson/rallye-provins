<?php

/* skel/html.twig */
class __TwigTemplate_e7a75cefd83a951f6c20299935c9f8ecae65b331ad2bd0f6509cfecee0d3e2d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'html_tag' => array($this, 'block_html_tag'),
            'head' => array($this, 'block_head'),
            'html_title' => array($this, 'block_html_title'),
            'head_links' => array($this, 'block_head_links'),
            'body_classes' => array($this, 'block_body_classes'),
            'section_tag' => array($this, 'block_section_tag'),
            'section' => array($this, 'block_section'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>

<html lang=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "I18N", array()), "languages", array()), $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "I18N", array()), "preferred_language", array()), array(), "array"), "html", array()), "html", null, true);
        echo "\" ";
        $this->displayBlock('html_tag', $context, $blocks);
        echo ">

  <head>
    ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 21
        echo "  </head>

  <body id='page-";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "page", array()), "id", array()), "html", null, true);
        echo "' class='lang-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "I18N", array()), "preferred_language", array()), "html", null, true);
        echo " ";
        $this->displayBlock('body_classes', $context, $blocks);
        echo "'>
  
  <div class='wrapper'>
    
    ";
        // line 27
        $this->env->loadTemplate("skel/header.twig")->display($context);
        // line 28
        echo "
    ";
        // line 29
        $this->env->loadTemplate("skel/nav.twig")->display($context);
        // line 30
        echo "
    <section ";
        // line 31
        $this->displayBlock('section_tag', $context, $blocks);
        echo ">
      ";
        // line 32
        $this->displayBlock('section', $context, $blocks);
        // line 34
        echo "    </section>

    ";
        // line 36
        $this->env->loadTemplate("skel/footer.twig")->display($context);
        // line 37
        echo "
    <div id='hamburgerLayer' class='hidden'></div>

    ";
        // line 40
        $this->displayBlock('scripts', $context, $blocks);
        // line 44
        echo "
  </div><!-- .wrapper -->

  </body>

</html>
";
    }

    // line 3
    public function block_html_tag($context, array $blocks = array())
    {
    }

    // line 6
    public function block_head($context, array $blocks = array())
    {
        // line 7
        echo "
    <meta charset='utf-8' />
    <meta content='target-densitydpi=device-dpi,width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0' name='viewport' />

    <title>";
        // line 11
        $this->displayBlock('html_title', $context, $blocks);
        echo "Rallye Provins</title>

    ";
        // line 13
        $this->displayBlock('head_links', $context, $blocks);
        // line 19
        echo "
    ";
    }

    // line 11
    public function block_html_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "page", array()), "title", array()), "html", null, true);
        echo " - ";
    }

    // line 13
    public function block_head_links($context, array $blocks = array())
    {
        // line 14
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "favicon.ico\" />
    <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "favicon-32x32.png\" sizes=\"32x32\" />

    <link rel='stylesheet' type='text/css' href='";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "css/main.min.css' />
    ";
    }

    // line 23
    public function block_body_classes($context, array $blocks = array())
    {
    }

    // line 31
    public function block_section_tag($context, array $blocks = array())
    {
    }

    // line 32
    public function block_section($context, array $blocks = array())
    {
        // line 33
        echo "      ";
    }

    // line 40
    public function block_scripts($context, array $blocks = array())
    {
        // line 41
        echo "    <script type='text/javascript' src='";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "js/jquery.min.js'></script>
    <script type='text/javascript' src='";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "Router", array()), "root", array()), "html", null, true);
        echo "js/script.min.js'></script>
    ";
    }

    public function getTemplateName()
    {
        return "skel/html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 42,  167 => 41,  164 => 40,  160 => 33,  157 => 32,  152 => 31,  147 => 23,  141 => 17,  136 => 15,  131 => 14,  128 => 13,  121 => 11,  116 => 19,  114 => 13,  109 => 11,  103 => 7,  100 => 6,  95 => 3,  85 => 44,  83 => 40,  78 => 37,  76 => 36,  72 => 34,  70 => 32,  66 => 31,  63 => 30,  61 => 29,  58 => 28,  56 => 27,  45 => 23,  41 => 21,  39 => 6,  31 => 3,  27 => 1,);
    }
}
