<?php
	@session_start();
	include '../connexion.php';
	header('Content-Type: text/html; charset=utf-8');
	mb_internal_encoding("UTF-8");

	$result = array();

	$req = $bdd->query('SELECT BONNE_INFORMATION, RISQUE_GF FROM tab_synthese_rsci_ra WHERE MISSION_ID ='.$_SESSION['idMission']);
	while($donnees = $req->fetch()){
		array_push($result,$donnees['BONNE_INFORMATION']);
		array_push($result,$donnees['RISQUE_GF']);
	}
	#	print_r($result);

	echo json_encode($result);
?>