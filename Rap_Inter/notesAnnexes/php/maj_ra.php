<?php
$cnx = "../../../connexion.php";
if (file_exists($cnx)) {
    # code...
    include_once $cnx;
// $val=true;
$idM=$_POST['idM'];
$rubrique=$_POST['rubrique'];
$sousrubrique=(isset($_POST['surub']) && $_POST['surub']!="")?$_POST['surub']:"";
$type=$_POST['typeba'];
$rubcycle=$_POST['rub'];

    $req = $bdd->prepare('UPDATE tab_ra SET rubrique_id = :idrub, Type = :type, rubrique_cycle = :rub, sous_rubrique = :surub WHERE RA_ID=:id');
    $val = $req->execute(array(
    'idrub' => $rubrique,
    'type' => $type,
    'rub' => $rubcycle,
    'surub' => $sousrubrique,
    'id' => $idM
    ));
}else
$val = false;



    if($val)echo "ok";
    else echo "Une erreur!";



?>