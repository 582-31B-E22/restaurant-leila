<?php
class VinModele extends AccesBd {
    /**
     * Cherche tous les vins groupés par nom de catégorie
     * 
     * @return {object[]} Tableau d'objets standards PHP contenant les 
     * enregistrements des vins 
     */
    public function tout() {
        // On doit sélectionner la colonne de "groupage" en premier
        $sql = "SELECT cat_nom, vin.* FROM vin JOIN categorie ON vin_cat_id_ce=cat_id 
                WHERE cat_type='vin' AND vin_provenance LIKE '%Fr%' ORDER BY cat_id";
        return $this->lireTout($sql);
    }

}