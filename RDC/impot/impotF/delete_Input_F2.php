<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$ligne=$_POST['ligne'];
$mission_id=$_POST['mission_id'];

$rep=$bdd->exec('DELETE FROM tab_i3 WHERE LIGNE='.$ligne.' AND MISSION_ID='.$mission_id);

$queryDelete='DELETE FROM tab_i3 WHERE LIGNE='.$ligne.' AND MISSION_ID='.$mission_id;
	
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryDelete.";", FILE_APPEND | LOCK_EX);

?>