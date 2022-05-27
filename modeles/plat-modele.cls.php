<?php
class PlatModele {
    // Connexion à la BD

    // Propriétés de la classe
    private $pdo = null;
    private $requete = null;

    // Constructeur (permet d'obtenir des instances de la classe)
    function __construct()
    {
        $this->pdo = new PDO("mysql:host=".BD_HOTE."; dbname=".BD_NOM."; charset=utf8",
            BD_UTIL, BD_MDP);     
    }

    // Méthodes de la classe

    public function tout() {
        // Implémentation de la méthode
        // $this->requete = 
    }

    public function creer() {

    }

    public function modifier() {

    }

    public function supprimer() {

    }

    
}