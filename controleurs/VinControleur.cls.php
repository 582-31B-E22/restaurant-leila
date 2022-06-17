<?php
class VinControleur extends Controleur
{
    public function index($params) 
    {
        $this->gabarit->affecterActionParDefaut('tout');
        $this->tout($params);
    }

    public function tout($params) 
    {
        // Chercher les données
        $resultat = $this->modele->tout();
        // Les injecter dans la vue
        $this->gabarit->affecter('carteDesVins', $resultat);
    }
    
}