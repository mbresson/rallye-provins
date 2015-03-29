<?php

/* page-share.twig */
class __TwigTemplate_341a837eb7a242b117180e2bbba2c6a5bf48712d2a8e0cb97cca1779b39d13e9 extends Twig_Template
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
<p>
  ";
        // line 6
        echo gettext("Rallye Provins is on Twitter and Facebook. If you like us, share the word with your friends.");
        // line 7
        echo "</p>

";
        // line 9
        $context["shareUrl"] = $this->env->getExtension('slim')->site("start");
        // line 10
        echo "
";
        // line 11
        ob_start();
        // line 12
        echo gettext("Are you visiting Provins? Give a try to Rallye Provins!");
        $context["shareText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 14
        echo "
<h3>Twitter</h3>

<p class='twitter'>
  <div class='social'>
    <a class=\"twitter-share-button\" href=\"https://twitter.com/share\" data-url=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["shareUrl"]) ? $context["shareUrl"] : $this->getContext($context, "shareUrl")), "html", null, true);
        echo "\" data-via=\"RallyeProvins\" data-hashtags=\"Provins,Rallye\" data-size=\"large\" data-text=\"";
        echo twig_escape_filter($this->env, (isset($context["shareText"]) ? $context["shareText"] : $this->getContext($context, "shareText")), "html", null, true);
        echo "\" data-count=\"none\">
      ";
        // line 20
        echo gettext("Tweet");
        // line 21
        echo "    </a>
  </div>

  <div class='social'>
    <a class=\"twitter-follow-button\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "contact", array()), "twitter", array()), "html", null, true);
        echo "\" data-show-count=\"false\" data-size=\"large\">
      ";
        // line 26
        echo gettext("Follow @RallyeProvins");
        // line 27
        echo "    </a>
  </div>
</p>

<h3>Facebook</h3>

<div class='facebook'>
  <div id=\"fb-root\"></div>

  <div class=\"fb-share-button social\" data-href=\"http://provins.matthieu-bresson.com\" data-layout=\"button\"></div>

  <div class=\"fb-like social\" data-href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "contact", array()), "facebook", array()), "html", null, true);
        echo "\" data-layout=\"button\" data-action=\"like\" data-show-faces=\"false\" data-share=\"false\"></div>
</div><!-- .facebook -->

";
    }

    public function getTemplateName()
    {
        return "page-share.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 38,  86 => 27,  84 => 26,  80 => 25,  74 => 21,  72 => 20,  66 => 19,  59 => 14,  56 => 12,  54 => 11,  51 => 10,  49 => 9,  45 => 7,  43 => 6,  39 => 4,  36 => 3,  11 => 1,);
    }
}
