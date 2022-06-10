<?php
// Pilote de l'application (ou site Web)
// Parfois appelé "Routeur" ou "Front Controller"

// Inclure les fichiers de config
include('config/bd.cfg.php');

$route = "";
if(isset($_GET["route"])) {
  // Exemples : vin ou plat/tout ou vin/ajouter ou plat/supprimer/15
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
      else {
        exit("Problème majeur....");
      }
    });
  }
  
  public function invoquerRoute() {
    $module = "accueil"; // Autres possibilités : plat, vin, etc.
    $action = "index";
    $param = "";
    $routeTableau = explode('/', $this->route);
    // Exemples : ['plat', 'supprimer', '17'] (ou ['plat', 'tout'] ou ['vin'])
    
    if(count($routeTableau) > 0 && trim($routeTableau[0]) != '') {
      // $module = 'plat' et $routeTableau = ['supprimer', '17']
      $module = array_shift($routeTableau);
      if(count($routeTableau) > 0 && trim($routeTableau[0]) != '') {
        // $action = 'supprimer' $routeTableau = ['17']
        $action = array_shift($routeTableau);
        $param = $routeTableau;
      }
    }

    // Instancier le controleur correspondant au module indiqué
    // et invoquer la méthode de cet objet correspondant à l'action indiquée
    $nomControleur = ucfirst($module).'Controleur'; // Exemple : VinControleur
    $nomModele = ucfirst($module).'Modele'; // Exemple : VinModele

    if(class_exists($nomControleur)) {
      if(!is_callable(array($nomControleur, $action))) {
        $action='index';
      }
      $controleur = new $nomControleur($nomModele, $module, $action);
      $controleur->$action($param);
    }
    else {
      $controleur = new AccueilControleur();
    }
  }
}