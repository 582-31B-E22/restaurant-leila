<?php
// Inclure les espaces de nom pour les classe requises dans la librairie Twig
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HtmlGabarit 
{
    protected $variables = array();
    protected $module;
    protected $action;
    private $twig;

    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;
        
        $chargeurTmpl = new FilesystemLoader(["vues/"]);
        $this->twig = new Environment($chargeurTmpl, []);
    }

    public function affecter($nom, $valeur)
    {
        $this->variables[$nom] = $valeur;
    }

    public function affecterActionParDefaut($nomAction) {
        $this->action = $nomAction;
    }
 
    public function genererVue() 
    {
        $this->twig->display("$this->module.$this->action.twig", $this->variables);
    }
}