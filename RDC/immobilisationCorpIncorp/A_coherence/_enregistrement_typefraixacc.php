<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 31/08/2016
 * Time: 11:10
 */


@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"]."/connexion.php";

$id_echantillon_GL=array();
$id_echantillon_GL=$_POST["id_echantillon_GL"];
$cout=$_POST["cout_"];



foreach ($id_echantillon_GL as $idEchant)
{

    $sqlUpdate="UPDATE tab_ehantillon_gl_fraixacc SET type_fraixacc ='$cout' WHERE id_mission='$mission_id'  and id_echantillon_GL ='$idEchant'";
    $reqlupdate=$bdd->query($sqlUpdate);

}


?>
