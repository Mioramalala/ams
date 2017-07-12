<?php

include_once "../../../connexion.php";

$idM=$_POST['idM'];
$rubrique=$_POST['rubrique'];
$type=$_POST['typeba'];

$req = $bdd->prepare('UPDATE tab_importer SET rubrique_id = :rub, Type = :typ WHERE IMPORT_ID=:id');
    $req->execute(array(
    'rub' => $rubrique,
    'typ' => $type,
    'id' => $idM
    ));

    if($req)echo "ok";
    else echo "error";
// $sql = "UPDATE tab_importer SET rubrique_id = $rubrique,Type = $type WHERE IMPORT_ID` =".$idM;



?>