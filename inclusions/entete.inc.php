<?php
  // Étape 1 : inclure la config de la bd
  include('config/bd.cfg.php');
  // Logique pour intégrer la BD
  // Autochargement des fichiers de classes
  spl_autoload_register(function($classe) {
    $fichier = preg_replace("//", "", $classe).".cls.php";
    if(file_exists($fichier)) {
      include($fichier);
    }
    else {
      exit("Problème majeur....");
    }
  });  
  
  // include('modeles/acces-bd.cls.php');
  // include('modeles/plat-modele.cls.php');
  // include('modeles/vin-modele.cls.php');
  
?>
<!DOCTYPE html>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:700,900|Roboto+Slab:300,700|Roboto:700,400' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Accueil | Restaurant Leila</title>
  <meta name="description" content="Restaurant Leila - Montréal">
  <link rel="stylesheet" href="css/ext/normalize.css">
  <link rel="stylesheet" href="css/leila.css">
</head>
<body>
  <div id="conteneur" class="page-accueil">
    <header>
      <div class="barre-haut">
        <nav class="social">
          <a href="http://www.facebook.com" target="lien-externe">
            <img alt="Facebook" src="images/iu/nav-icone-facebook.svg">
          </a>
          <a href="http://www.twitter.com" target="lien-externe">
            <img alt="Twitter" src="images/iu/nav-icone-twitter.svg">
          </a>
        </nav>
        <nav class="i18n">
          <a href="#" class="actif" title="Français">fr</a>
          <a href="#" title="English">en</a>
        </nav>
      </div>