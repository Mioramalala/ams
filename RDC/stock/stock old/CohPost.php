<?php
	session_start();
	include '../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
	$rep=$_POST["rep"];
	$cmt=$_POST["cmt"];
	$rang=$_POST["rang"];
	$fonction=$_POST["cycle"];
	
	$reqInsert=$bdd->exec("INSERT INTO  tab_rdc ( RANG_RDC, REPONSE_RDC, COMMENTAIR_RDC, MISSION_ID, FUNCTION_RDC,UTIL_ID) VALUE ('".$rang."','".$rep."','".$cmt."',".$_SESSION['idMission'].",'".$fonction."',".$UTIL_ID.")");
	
	$req="INSERT INTO  tab_rdc ( RANG_RDC, REPONSE_RDC, COMMENTAIR_RDC, MISSION_ID, FUNCTION_RDC,UTIL_ID) VALUE ('".$rang."','".$rep."','".$cmt."',".$_SESSION['idMission'].",'".$fonction."',".$UTIL_ID.")";
		
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
		
?>