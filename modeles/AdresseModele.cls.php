<?php
class AdresseModele extends AccesBd
{
    public function tout()
    {
        return $this->lireTout("SELECT * FROM adresse", false);
    }
}