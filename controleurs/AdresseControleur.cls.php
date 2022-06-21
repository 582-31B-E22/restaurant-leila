<?php
class AdresseControleur extends Controleur
{
    public function index($params)
    {
        // 1) Isncrire tout comme action par défaut
        // Sinon la route adresse/index ne fonctionne pas
        $this->gabarit->affecterActionParDefaut('tout');

        // 2) Appeler la méthode tout()
        $this->tout($params);
    }

    public function tout($params)
    {
        // Chercher les adresses dans la BD et les affecter dans le tableau 
        // $variables du Gabarit
        $this->gabarit->affecter('succursales', $this->modele->tout());
    }

    
}