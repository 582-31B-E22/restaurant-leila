<?php
// Instancier la classe PDO (pour obtenir un objet de "connexion" à MySQL)
$pdo = new PDO("mysql:host=localhost; dbname=leila; charset=utf8", 'root', '1234');
// Obtenir une instance d'un objet "requête paramétrée" PDO (PDOStatement)
$reqParamPDO = $pdo->prepare("SELECT * FROM plat JOIN categorie ON pla_cat_id_ce=cat_id");
$reqParamPDO->execute();
$lesPlats = $reqParamPDO->fetchAll(PDO::FETCH_OBJ);

// Afficher la structure $lesPlats
print_r($lesPlats);