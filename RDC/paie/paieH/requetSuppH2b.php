<?php
	session_start();
	include '../../../connexion.php';

	$nature = $_POST['nature'];

	$sql ="DELETE FROM tab_elt_annexe WHERE NATURE = '".$nature."' AND MISSION_ID='".$_SESSION['idMission']."'";
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);
	$req = $bdd->query($sql);
?>