<?php
	session_start();
	include '../../../connexion.php';

	$periode = $_POST['periode'];
	$sql ="DELETE FROM tab_cad_salaire_irsa WHERE PERIODE = '".$periode."' AND MISSION_ID='".$_SESSION['idMission']."'";
	$req = $bdd->query($sql);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);
?>