<?php
class PlatControleur extends Controleur
{
    public function index($params)
    {
        $this->gabarit->affecterActionParDefaut('tout');
        $this->tout($params);

    }

    public function tout($params)
    {
        // Chercher les plats de la BD (job de PlatModele)
        $resultat = $this->modele->tout();

        // Injecte le résultat dans la 'vue'
        $this->gabarit->affecter('menu', $resultat);
    }

    public function ajouter()
    {
        

    }


}
