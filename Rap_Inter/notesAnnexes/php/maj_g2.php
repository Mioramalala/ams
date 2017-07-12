<?php

include_once "../../../connexion.php";

$idM=$_POST['idM'];
$rubrique=$_POST['rubrique'];
// $idcycle=$_POST['cycle'];
$type=$_POST['typeba'];
// $rubcycle=$_POST['rub'];

$req = $bdd->prepare('UPDATE tab_gl_genc2 SET rubrique_id = :idrub, type = :type  WHERE GL_GENC2_ID=:id');
   $val = $req->execute(array(
    'idrub' => $rubrique,
    'type' => $type,
    'id' => $idM
    ));

    if($val)echo "ok";
    else echo "error";
// $sql = "UPDATE tab_importer SET rubrique_id = $rubrique,Type = $type WHERE IMPORT_ID` =".$idM;



?>