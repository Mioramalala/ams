<?php
	
	session_start();
	include '../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
	$rep=$_POST["rep"];
	$cmt=$_POST["cmt"];
	$rang=$_POST["rang"];
	$cycle=$_POST["cycle"];
	$objectif=$_POST["objet"];
	
	$reqInsert=$bdd->exec("INSERT INTO  tab_rdc ( RDC_RANG, RDC_REPONSE, RDC_COMMENTAIRE, MISSION_ID, RDC_CYCLE, RDC_OBJECTIF,UTIL_ID) VALUE ('".$rang."','".$rep."','".$cmt."',".$_SESSION['idMission'].",'".$cycle."','".$objectif."',".$UTIL_ID.")");
	
	$reqInsert1="INSERT INTO  tab_rdc ( RDC_RANG, RDC_REPONSE, RDC_COMMENTAIRE, MISSION_ID, RDC_CYCLE, RDC_OBJECTIF,UTIL_ID) VALUE ('".$rang."','".$rep."','".$cmt."',".$_SESSION['idMission'].",'".$cycle."','".$objectif."',".$UTIL_ID.")";
		
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $reqInsert1.";", FILE_APPEND | LOCK_EX);
	
?>