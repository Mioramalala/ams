<?php
	@session_start();
	include '../connexion.php';
	
	$cycle = $_POST['cycle'];

	$result = array();

	$req0=$bdd->query('SELECT MISSION_ANNEE FROM tab_mission WHERE MISSION_ID ='.$_SESSION['idMission']);
	$res=$req0->fetch();
	$res2=$res["MISSION_ANNEE"]-1;
							
	$requete='SELECT * FROM tab_incidence_ra a,tab_mission b,tab_entreprise c WHERE CYCLE = "'.$cycle.'" AND b.ENTREPRISE_ID= c.ENTREPRISE_ID AND MISSION_ANNEE='.$res2;
							
	$req = $bdd->query($requete);
			
	if($donnees = $req->fetch()){
		array_push($result,$donnees['FONCTIONNEMENT']);
		array_push($result,$donnees['COMPTE']);
	}
	else{
		array_push($result,'');
		array_push($result,'');		
	}

	echo json_encode($result);
?>