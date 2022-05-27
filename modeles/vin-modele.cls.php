<?php
class VinModele {
    // Connexion à la BD

    // Propriétés de la classe
    private $pdo = null; // Connexion PDO
    private $requete = null; // Requête paramétrée PDO

    // Constructeur (permet d'obtenir des instances de la classe)
    function __construct()
    {
        $this->pdo = new PDO("mysql:host=".BD_HOTE."; dbname=".BD_NOM."; charset=utf8",
            BD_UTIL, BD_MDP);     
    }

    // Méthodes de la classe

    /**
     * Cherche tous les plats
     * 
     * @return {object[]} Tableau d'objets standards PHP contenant les 
     * enregistrements des vins 
     */
    public function tout() {
        // Implémentation de la méthode
        $sql = "SELECT * FROM plat JOIN categorie ON pla_cat_id_ce=cat_id 
                WHERE cat_type='plat' ORDER BY cat_id";
        $this->requete = $this->pdo->prepare($sql);
        $this->requete->execute();
        $plats = [];
        while ($enreg = $this->requete->fetch(PDO::FETCH_OBJ)) {
            // Regrouper les plats par nom de catégorie
            $plats[$enreg->cat_nom][] = $enreg; 
        }
        return $plats;
    }

    public function creer() {

    }

    public function modifier() {

    }

    public function supprimer() {

    }

    
}