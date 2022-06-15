<?php
class PlatControleur extends Controleur
{
    public function index($params)
    {
        $this->tout($params);
    }

    public function tout($params)
    {
        // Chercher les plats de la BD (job de PlatModele)
        $resultat = $this->modele->tout();
        
    }

    public function ajouter()
    {
        

    }


}
