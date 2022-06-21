<?php
class AdresseModele extends AccesBd
{
    public function tout()
    {
        return $this->lire("SELECT * FROM adresse", false);
    }
}