<?php
// Pilote de l'application (ou site Web)

// Inclure les fichiers de config
include('config/config.php');

$route = "";
if(isset($_GET["route"])) {
  $route = $_GET["route"];
}

$routeur = new Routeur($route);
$routeur->invoquerRoute();

class Routeur
{
  private $route = '';

  function __construct($r)
  {
    $this->route = $r;
    // Autochargement des fichiers de classes
    spl_autoload_register(function($nomClasse) {
      $nomFichier = "$nomClasse.cls.php";
      if(file_exists("modeles/$nomFichier")) {
        include("modeles/$nomFichier");
      }
      else if(file_exists("controleurs/$nomFichier")) {
        include("controleurs/$nomFichier");
      }
      else if(file_exists("gabarits/$nomFichier")) {
        include("gabarits/$nomFichier");
      }
    });
  }
  
  public function invoquerRoute() {
    $module = "accueil"; 
    $action = "index";
    $params = "";
    $routeTableau = explode('/', $this->route);
    
    if(count($routeTableau) > 0 && trim($routeTableau[0]) != '') {
      $module = array_shift($routeTableau);
      if(count($routeTableau) > 0 && trim($routeTableau[0]) != '') {
        $action = array_shift($routeTableau);
        $params = $routeTableau;
      }
    }

    // Instancier le controleur correspondant au module indiqué
    // et invoquer la méthode de cet objet correspondant à l'action indiquée
    $nomControleur = ucfirst($module).'Controleur'; // Exemple : VinControleur
    $nomModele = ucfirst($module).'Modele'; // Exemple : VinModele

    if(class_exists($nomControleur)) {
      if(!method_exists($nomControleur, $action)) {
        $action='index';
      }
      $controleur = new $nomControleur($nomModele, $module, $action);
      $controleur->$action($params);
    }
    else {
      $controleur = new Controleur('', 'accueil', 'index');
    }
  }
}