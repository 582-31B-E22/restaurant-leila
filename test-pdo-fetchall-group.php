<?php
// fetchAll tout en groupant les enregistrement !!!!

// Instancier la classe PDO (pour obtenir un objet de "connexion" à MySQL)
$pdo = new PDO("mysql:host=localhost; dbname=leila; charset=utf8", 'root', '1234');
// Obtenir une instance d'un objet "requête paramétrée" PDO (PDOStatement)
$reqParamPDO = $pdo->prepare("SELECT cat_nom, plat.* FROM plat JOIN categorie ON pla_cat_id_ce=cat_id");
$reqParamPDO->execute();
$lesPlatsGroupes = $reqParamPDO->fetchAll(PDO::FETCH_OBJ | PDO::FETCH_GROUP);

// Afficher la structure $lesPlatsGroupes
print_r($lesPlatsGroupes);