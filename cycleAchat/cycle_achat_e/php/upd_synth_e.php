<?php
	@session_start();
	include '../../../connexion.php';

	$mission_id= $_SESSION['idMission'];
	
	$commentaire=$_POST['commentaire'];
	$risque=$_POST['risque'];
	$UTIL_ID=$_SESSION['id'];
	$echo_score_e = $_POST['echo_score_e'];

	$reponse= $bdd->exec('UPDATE tab_synthese SET SCORE = "' .$echo_score_e .'", SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE= "' .$risque .'", UTIL_ID= "' .$UTIL_ID .'" WHERE MISSION_ID= "' .$mission_id.'" AND CYCLE_ACHAT_ID=5');

?>