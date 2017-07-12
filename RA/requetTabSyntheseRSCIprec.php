<?php
	@session_start();
	include '../connexion.php';
	header('Content-Type: text/html; charset=utf-8');
	mb_internal_encoding("UTF-8");

	$result = array();

	$req0=$bdd->query('SELECT MISSION_ANNEE FROM tab_mission WHERE MISSION_ID ='.$_SESSION['idMission']);
	$res=$req0->fetch();
	$res2=$res["MISSION_ANNEE"]-1;
							
	$requete='SELECT BONNE_INFORMATION, RISQUE_GF FROM tab_synthese_rsci_ra a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND MISSION_ANNEE='.$res2;
	
	$req = $bdd->query($requete);
	
	while($donnees = $req->fetch()){
		array_push($result,$donnees['BONNE_INFORMATION']);
		array_push($result,$donnees['RISQUE_GF']);
	}
	#	print_r($result);

	echo json_encode($result);
?>