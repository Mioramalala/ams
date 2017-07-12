<?php
@session_start();
include '../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$rep=$_POST['rep'];
$cmt=$_POST['cmt'];
$rang=$_POST['rang'];
$fonction=$_POST['cycle'];

$req=$bdd->exec('Update tab_rdc set UTIL_ID = "'.$UTIL_ID.'",REPONSE_RDC="'.$rep.'", COMMENTAIR_RDC="'.$cmt.'" WHERE RANG_RDC='.$rang.' and  MISSION_ID='.$_SESSION['idMission'].' and FUNCTION_RDC="'.$fonction.'"');

$req1='Update tab_rdc set UTIL_ID = "'.$UTIL_ID.'",REPONSE_RDC="'.$rep.'", COMMENTAIR_RDC="'.$cmt.'" WHERE RANG_RDC='.$rang.' and  MISSION_ID='.$_SESSION['idMission'].' and FUNCTION_RDC="'.$fonction.'"';
		
$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

?>