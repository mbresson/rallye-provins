<?php

/* page-share.twig */
class __TwigTemplate_67dcd8611f239e20c5974fc30f445da265b3d8d3d46542310241ea383ff150eb extends Twig_Template
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
<div class='button social twitter' id='button-twitter-tweet'>";
        // line 15
        echo gettext("Tweet it!");
        echo "</div>

<div class='button social twitter' id='button-twitter-follow'>";
        // line 17
        echo gettext("Follow us on Twitter");
        echo "</div>

<div class='button social facebook' id='button-facebook-share'>";
        // line 19
        echo gettext("Share on Facebook");
        echo "</div>

<div class='button social facebook' id='button-facebook-like'>";
        // line 21
        echo gettext("Like on Facebook");
        echo "</div>

<div class='button social twitter' id='button-twitter-tweet'>
  <a class=\"twitter-share-button\" href=\"https://twitter.com/share\" data-url=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["shareUrl"]) ? $context["shareUrl"] : $this->getContext($context, "shareUrl")), "html", null, true);
        echo "\" data-via=\"RallyeProvins\" data-hashtags=\"Provins,Rallye\" data-text=\"";
        echo twig_escape_filter($this->env, (isset($context["shareText"]) ? $context["shareText"] : $this->getContext($context, "shareText")), "html", null, true);
        echo "\" data-count=\"none\">
    ";
        // line 25
        echo gettext("Tweet");
        // line 26
        echo "  </a>
</div>

<div class='button social twitter' id='button-twitter-follow'>
  <a class=\"twitter-follow-button\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "contact", array()), "twitter", array()), "html", null, true);
        echo "\" data-show-count=\"false\">
    ";
        // line 31
        echo gettext("Follow @RallyeProvins");
        // line 32
        echo "  </a>
</div>

<div class='button social facebook' id='button-facebook-share'>
  <div class=\"fb-share-button\" data-href=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["shareUrl"]) ? $context["shareUrl"] : $this->getContext($context, "shareUrl")), "html", null, true);
        echo "\" data-layout=\"button\"></div>
</div>

<div class='button social facebook' id='button-facebook-like'>
  <div class=\"fb-like\" data-href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "contact", array()), "facebook", array()), "html", null, true);
        echo "\" data-layout=\"button\" data-action=\"like\" data-show-faces=\"false\" data-share=\"false\"></div>
</div>


<p class='twitter'>
  <a class=\"twitter-share-button button\" href=\"https://twitter.com/share\" data-url=\"";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["shareUrl"]) ? $context["shareUrl"] : $this->getContext($context, "shareUrl")), "html", null, true);
        echo "\" data-via=\"RallyeProvins\" data-hashtags=\"Provins,Rallye\" data-text=\"";
        echo twig_escape_filter($this->env, (isset($context["shareText"]) ? $context["shareText"] : $this->getContext($context, "shareText")), "html", null, true);
        echo "\" data-count=\"none\">
    ";
        // line 46
        echo gettext("Tweet");
        // line 47
        echo "  </a>

  <a class=\"twitter-follow-button button\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["GLOB"]) ? $context["GLOB"] : $this->getContext($context, "GLOB")), "data", array()), "contact", array()), "twitter", array()), "html", null, true);
        echo "\" data-show-count=\"false\">
    ";
        // line 50
        echo gettext("Follow @RallyeProvins");
        // line 51
        echo "  </a>
</p>

<div class='facebook'>
  <div id=\"fb-root\"></div>

  <div class=\"fb-share-button button\" data-href=\"";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["shareUrl"]) ? $context["shareUrl"] : $this->getContext($context, "shareUrl")), "html", null, true);
        echo "\" data-layout=\"button\"></div>

  <div class=\"fb-like button\" data-href=\"";
        // line 59
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
        return array (  155 => 59,  150 => 57,  142 => 51,  140 => 50,  136 => 49,  132 => 47,  130 => 46,  124 => 45,  116 => 40,  109 => 36,  103 => 32,  101 => 31,  97 => 30,  91 => 26,  89 => 25,  83 => 24,  77 => 21,  72 => 19,  67 => 17,  62 => 15,  59 => 14,  56 => 12,  54 => 11,  51 => 10,  49 => 9,  45 => 7,  43 => 6,  39 => 4,  36 => 3,  11 => 1,);
    }
}
