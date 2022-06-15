<?php
class HtmlGabarit 
{
    protected $variables = array();
    protected $module;
    protected $action;

    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;  
    }

    public function genererVue() 
    {
        include("vues/entete.inc.php");
        include("vues/$this->module.$this->action.php");
        include("vues/pied2page.inc.php");
    }
}