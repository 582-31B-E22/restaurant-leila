<?php
class Controleur 
{
    protected $modele;
    protected $gabarit;

    function __construct($modele, $module, $action)
    {
        if(class_exists($modele)) {
            $this->modele = new $modele();
        }
        $this->gabarit = new HtmlGabarit($module, $action);
        $this->gabarit->affecter('page', $module);
    }

    function __destruct()
    {
       $this->gabarit->genererVue(); 
    }

    public function index($params) 
    {

    }
}