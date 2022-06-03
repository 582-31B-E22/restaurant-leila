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
    protected function soumettre($sql, $params) 
    {
        $this->requete = $this->pdo->prepare($sql);
        $this->requete->execute($params);
    }

    protected function lire($sql, $params = [])
    {
        $this->soumettre($sql, $params);
        $enregistrements = [];
        while($enreg = $this->requete->fetch()) {
            $enregistrements[$enreg->cat_nom][] = $enreg;
        }
        return $enregistrements;
    }
    
    public function creer($sql, $params) 
    {
        $this->soumettre($sql, $params);
        return $this->pdo->lastInsertId();
    }

    public function modifier($sql, $params)
    {
        $this->soumettre($sql, $params);
        return $this->requete->rowCount();
    }

    public function supprimer()
    {

    }

    
}