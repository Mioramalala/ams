<?php

	@session_start();
	$UTIL_ID=$_SESSION['id'];
	include '../connexion.php';

	$mission_id = $_SESSION['idMission'];
	$mission_importe = $_POST['mission_importee'];

	$req = "INSERT INTO tab_import_revues(MISSION_ID, MISSION_ID_IMPORTEE) VALUES (".$mission_id.",".$mission_importe.")
	ON DUPLICATE KEY UPDATE MISSION_ID_IMPORTEE=".$mission_importe;
	$bdd->exec($req);

	echo $req;

?>
