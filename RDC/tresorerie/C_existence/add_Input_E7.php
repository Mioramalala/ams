<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$observation=$_POST['observation'];
$compte=$_POST['compte'];
$mission_id=$_POST['mission_id'];

$rep0=$bdd->query('select ID from tab_e7 WHERE COMPTE="'.$compte.'" AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();
$dcd_id = $donnees0['ID'];

if($dcd_id==0){
	$rep=$bdd->exec('insert into tab_e7(COMPTE, OBSERVATION, MISSION_ID,UTIL_ID) values ("'.$compte.'","'.$observation.'",'.$mission_id.','.$UTIL_ID.')');
 
	$req='insert into tab_e7(COMPTE, OBSERVATION, MISSION_ID,UTIL_ID) values ("'.$compte.'","'.$observation.'",'.$mission_id.','.$UTIL_ID.')';
		
	file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
else{
	$rep1=$bdd->exec('update tab_e7 set UTIL_ID = "'.$UTIL_ID.'",OBSERVATION="'.$observation.'" where MISSION_ID="'.$mission_id.'" AND ID='.$dcd_id); 
	echo 'update'; 
 
	$req1='update tab_e7 set UTIL_ID = "'.$UTIL_ID.'",OBSERVATION="'.$observation.'" where MISSION_ID="'.$mission_id.'" AND ID='.$dcd_id;
		
	file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1 FILE_APPEND | LOCK_EX);
}

?>