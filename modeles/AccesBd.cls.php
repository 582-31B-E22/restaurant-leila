<?php
class AccesBd 
{
    private PDO $pdo; // Objet de connexion PDO
    private PDOStatement $rp; // Objet de requête paramétrée PDO

    /**
     * Constructeur : initialise l'objet PDO
     * 
     */
    function __construct()
    {
        if(!isset($this->pdo)) {
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
            $this->pdo = new PDO("mysql:host=".BD_HOTE."; dbname=".BD_NOM."; charset=utf8",
                BD_UTIL, BD_MDP, $options); 
        }
    }
        
    /**
     * Effectue une requête SQL
     *
     * @param string $reqSql Requête SQL paramétrée
     * @param array $params Tableau contenant les valeurs des paramètres à 
     *              passer à la requête au moment de son exécution
     * @return void
     */
    private function soumettre(string $req, array $params) : void 
    {
        $this->rp = $this->pdo->prepare($req);
        $this->rp->execute($params);
    }

    /**
     * Effectue une requête SELECT et retourne un jeu d'enregistrements
     *
     * @param string $req Requête SQL de type SELECT
     * @param array $params Tableau contenant les valeurs des paramètres à 
     *              passer à la requête au moment de son exécution
     * 
     * @return object[] Tableau d'objets représentants les enregistrements
     */
    protected function lireTout(string $req, bool $groupe=true, array $params=[]) : array
    {
        $this->soumettre($req, $params);
        if($groupe) {
            return $this->rp->fetchAll(PDO::FETCH_GROUP);
        }
        else {
            return $this->rp->fetchAll();
        }
    }
    
    /**
     * Effectue une requête SELECT et retourne un seul enregistrement
     *
     * @param string $req Requête SQL de type SELECT
     * @param array $params Tableau contenant les valeurs des paramètres à 
     *              passer à la requête au moment de son exécution
     * 
     * @return object Objet représentant l'enregistrement retourné
     */
    protected function lireUn(string $req, array $params=[]) : object
    {
        $this->soumettre($req, $params);
        return $this->rp->fetch();
    }

    /**
     * Effectue une requête INSERT
     *
     * @param string $req Requête SQL de type INSERT
     * @param array $params Tableau contenant les valeurs des paramètres à 
     *              passer à la requête au moment de son exécution
     * @return int Identifiant de l'enregistrement ajouté, ou false
     */
    protected function creer(string $req, array $params=[]) : int 
    {
        $this->soumettre($req, $params);
        return $this->pdo->lastInsertId();
    }

    /**
     * Effectue une requête UPDATE
     *
     * @param string $req Requête SQL de type UPDATE
     * @param array $params Tableau contenant les valeurs des paramètres à 
     *              passer à la requête au moment de son exécution
     * @return int Le nombre d'enregistrements modifiés
     */
    protected function modifier(string $req, array $params=[]) : int
    {
        $this->soumettre($req, $params);
        return $this->rp->rowCount();
    }

    /**
     * Effectue une requête DELETE
     *
     * @param string $req Requête SQL de type DELETE
     * @param array $params Tableau contenant les valeurs des paramètres à 
     *              passer à la requête au moment de son exécution
     * @return int Le nombre d'enregistrements supprimés
     */
    protected function supprimer(string $req, array $params=[]) : int
    {
        // Simplement faire appel à la fonction modifier 
        // (puisque c'est la même implémentation)
        return $this->modifier($req, $params);
    }
}