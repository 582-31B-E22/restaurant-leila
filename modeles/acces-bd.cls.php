<?php
class AccesBd 
{
    // Propriétés de la classe
    private $pdo = null; // Connexion PDO
    private $requete = null; // Requête paramétrée PDO

    // Constructeur (permet de configurer la connexion PDO)
    function __construct()
    {
        if(!$this->pdo) {
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
            $this->pdo = new PDO("mysql:host=".BD_HOTE."; dbname=".BD_NOM."; charset=utf8",
                BD_UTIL, BD_MDP, $options); 
        }
    }

    // Méthodes de la classe (implémentation de toutes les opérations CRUD)
    
        
    /**
     * Soumet une requête paramétrée.
     *
     * @param  string $sql Requête SQL
     * @param  array $params Tableau des paramètres utilisés dans la requête SQL
     * @return void
     */
    private function soumettre($sql, $params) 
    {
        $this->requete = $this->pdo->prepare($sql);
        $this->requete->execute($params);
    }

        
    /**
     * Obtenir un jeu d'enregistrement de la BD
     *
     * @param  string $sql Requête SQL
     * @param  array $params Paramètres à passer à la requête paramétrées PDO
     * @return array Tableau contenant les enregistrements
     */
    protected function lire($sql, $params = [])
    {
        $this->soumettre($sql, $params);
        return $this->requete->fetchAll(PDO::FETCH_GROUP);
    }
    
    protected function creer($sql, $params) 
    {
        $this->soumettre($sql, $params);
        return $this->pdo->lastInsertId();
    }

    protected function modifier($sql, $params)
    {
        $this->soumettre($sql, $params);
        return $this->requete->rowCount();
    }

    protected function supprimer()
    {

    }

    
}