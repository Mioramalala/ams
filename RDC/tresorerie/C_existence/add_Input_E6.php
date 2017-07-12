<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$pv=$_POST['pv'];
$renvoi=$_POST['renvoi'];
$ecart1=$_POST['ecart1'];
$ecart2=$_POST['ecart2'];
$journal=$_POST['journal'];
$observation=$_POST['observation'];
$compte=$_POST['compte'];
$mission_id=$_POST['mission_id'];

$rep0=$bdd->query('select ID from tab_e6 WHERE COMPTE="'.$compte.'" AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();
$dcd_id = $donnees0['ID'];

if($dcd_id==0){
	$rep=$bdd->exec('insert into tab_e6(COMPTE, PV, RENVOI, ECART1, ECART2, JOURNAL, OBSERVATION, MISSION_ID,UTIL_ID) values ("'.$compte.'","'.$pv.'","'.$renvoi.'","'.$ecart1.'","'.$ecart2.'","'.$journal.'","'.$observation.'",'.$mission_id.','.$UTIL_ID.')');
 
	$req='insert into tab_e6(COMPTE, PV, RENVOI, ECART1, ECART2, JOURNAL, OBSERVATION, MISSION_ID,UTIL_ID) values ("'.$compte.'","'.$pv.'","'.$renvoi.'","'.$ecart1.'","'.$ecart2.'","'.$journal.'","'.$observation.'",'.$mission_id.','.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}

else{
	$rep1=$bdd->exec('update tab_e6 set UTIL_ID = "'.$UTIL_ID.'",PV="'.$pv.'",RENVOI="'.$renvoi.'",ECART1="'.$ecart1.'",ECART2="'.$ecart2.'",JOURNAL="'.$journal.'",OBSERVATION="'.$observation.'" where MISSION_ID="'.$mission_id.'" AND ID='.$dcd_id); 
 echo 'update'; 
 
	$req1='update tab_e6 set UTIL_ID = "'.$UTIL_ID.'",PV="'.$pv.'",RENVOI="'.$renvoi.'",ECART1="'.$ecart1.'",ECART2="'.$ecart2.'",JOURNAL="'.$journal.'",OBSERVATION="'.$observation.'" where MISSION_ID="'.$mission_id.'" AND ID='.$dcd_id;
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
}

?>