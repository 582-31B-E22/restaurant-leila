<?php
class PlatModele extends AccesBd {
    
    public function tout() {
        // Implémentation de la méthode
        $sql = "SELECT cat_nom, plat.*  FROM plat JOIN categorie ON pla_cat_id_ce=cat_id 
                WHERE cat_type='plat' AND pla_prix ORDER BY cat_id";
        return $this->lireTout($sql);
    }
}