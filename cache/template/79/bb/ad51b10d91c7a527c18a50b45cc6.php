<?php

/* index.html */
class __TwigTemplate_79bbad51b10d91c7a527c18a50b45cc6 extends Twig_Template
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
        echo "Вы успешно настроили  и запустили фреймворк , текущая дата выводится методом модели  -  ";
        if (isset($context["now"])) { $_now_ = $context["now"]; } else { $_now_ = null; }
        echo twig_escape_filter($this->env, $_now_, "html", null, true);
        echo " <br />
Controller Handy\\Modules\\Controller\\Index <br />
View Handy\\Modules\\View\\index.html <br />
Model Handy\\Modules\\Model\\MainModel <br />

Подробную документацию можно глянуть на http://handy.vv.si";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
