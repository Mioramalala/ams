<?php 
@session_start();
$UTIL_ID=$_SESSION['id'];
	
 include '../connexion.php';
 $numeko=$_POST['num'];
 $idko=$_POST['id'];
 $reponse=$bdd->exec('UPDATE tab_balance_general SET UTIL_ID="'.$UTIL_ID.'",BALANCE_GENERAL_CYCLE="'.$numeko.'" WHERE MISSION_ID="'.$mission_id.'"  AND  BALANCE_GENERAL_ID='.$idko);
 
 $req='UPDATE tab_balance_general SET UTIL_ID="'.$UTIL_ID.'",BALANCE_GENERAL_CYCLE="'.$numeko.'" WHERE MISSION_ID="'.$mission_id.'"  AND  BALANCE_GENERAL_ID='.$idko;
		
$file = '../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
 ?>