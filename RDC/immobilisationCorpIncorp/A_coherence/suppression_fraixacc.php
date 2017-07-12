<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 29/08/2016
 * Time: 15:25
 */

@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"]."/connexion.php";

$checkfrais_acc=array();
$checkfrais_acc=$_GET["checkfrais_acc"];

foreach ($checkfrais_acc as $id_fraixacc)
{

    $sql_="delete from tab_Frais_Accessoire where id_mission='$mission_id' and id_frais_acc='$id_fraixacc'";
    $reponse1=$bdd->query($sql_);

}

?>