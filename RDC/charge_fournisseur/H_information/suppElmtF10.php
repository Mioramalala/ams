<?php
	session_start();
	include '../../../connexion.php';

	$nature = $_POST['nature'];

	$sql ="DELETE FROM tab_rdc_cf_f10 WHERE NATURE = '".$nature."' AND MISSION_ID='".$_SESSION['idMission']."'";
	$req = $bdd->query($sql);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);
?>