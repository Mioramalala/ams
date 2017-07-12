<?php 
	@session_start();
	$UTIL_ID=$_SESSION['id'];
	$mission_id=$_SESSION['idMission'];
	
	 include '../connexion.php';
	 $numeko=$_POST['num'];
	 $idko=$_POST['id'];
	 $cycleko=$_POST['cycle'];
	 $numeko2=$_POST['num2'];
	 
	$reponse=$bdd->exec('UPDATE tab_balance_general SET BALANCE_GENERAL_COMPTE_CONCERNE="'.$numeko.'",BALANCE_GENERAL_COMPTE_CONCERNE2="'.$numeko2.'",BALANCE_GENERAL_CYCLE="'.$cycleko.'",UTIL_ID="'.$UTIL_ID.'" WHERE MISSION_ID="'.$mission_id.'"  AND BALANCE_GENERAL_ID='.$idko);
	
	$req='UPDATE tab_balance_general SET BALANCE_GENERAL_COMPTE_CONCERNE="'.$numeko.'",BALANCE_GENERAL_COMPTE_CONCERNE2="'.$numeko2.'",BALANCE_GENERAL_CYCLE="'.$cycleko.'",UTIL_ID="'.$UTIL_ID.'" WHERE MISSION_ID="'.$mission_id.'"  AND BALANCE_GENERAL_ID='.$idko;
		
	$file = '../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
 ?>
