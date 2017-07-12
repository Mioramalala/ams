<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';
$donnees=$_POST['donnees'];
$nature=$_POST['nature'];

$reponse=$bdd->exec('INSERT INTO tab_g9(G9_NATURE, G9_ANNEXE,MISSION_ID,UTIL_ID) VALUES ("'.$nature.'","'.$donnees.'","'.$mission_id.'",'.$UTIL_ID.')
					ON DUPLICATE KEY UPDATE G9_ANNEXE="'.$donnees.'", UTIL_ID='.$UTIL_ID);

$req1='INSERT INTO tab_g9(G9_NATURE, G9_ANNEXE,MISSION_ID,UTIL_ID) VALUES ("'.$nature.'","'.$donnees.'","'.$mission_id.'",'.$UTIL_ID.')
					ON DUPLICATE KEY UPDATE G9_ANNEXE="'.$donnees.'", UTIL_ID='.$UTIL_ID;
		
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

echo $req1;
?>