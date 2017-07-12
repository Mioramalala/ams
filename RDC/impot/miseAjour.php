<?php
@session_start();
include '../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$rep=$_POST['rep'];
$cmt=$_POST['cmt'];
$rang=$_POST['rang'];
$cycle=$_POST['cycle'];
$objectif=$_POST["objet"];

$sqlreq="UPDATE tab_rdc set UTIL_ID = '$UTIL_ID',RDC_REPONSE='$rep', RDC_COMMENTAIRE='$cmt' WHERE RDC_RANG='$rang' AND RDC_OBJECTIF='$objectif' AND RDC_CYCLE='$cycle' AND MISSION_ID='".$_SESSION['idMission']."'";

$req=$bdd->exec($sqlreq)or die(mysql_error());
//$req1='UPDATE tab_rdc set UTIL_ID = "'.$UTIL_ID.'",RDC_REPONSE="'.$rep.'", RDC_COMMENTAIRE="'.$cmt.'" WHERE RDC_RANG="'.$rang.'" AND RDC_OBJECTIF="'.$objectif.'" AND RDC_CYCLE="'.$cycle.'" AND MISSION_ID='.$_SESSION['idMission'];
		
$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $sqlreq.";", FILE_APPEND | LOCK_EX);

?>