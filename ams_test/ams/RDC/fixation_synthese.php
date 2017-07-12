<?php
	include '../connexion.php';
	/*
	$reponse = $bdd->query('SELECT SYNTHESE_RDC,MISSION_ID FROM tab_validation_synthese_rdc where MISSION_ID='.$mission_id.' AND SYNTHESE_CYCLE_RDC="tresorerie"');
	
	$donnees=$reponse->fetch();
	
	if($donnees['SYNTHESE_RDC']==""){
		echo utf8_encode('Rédiger ici votre synthèse');
	}
	else{		
		echo $donnees['SYNTHESE_RDC'];
	}*/
	
	$mission_id         = $_POST['mission_id'];
	$synthese_cycle_rdc = $_POST['synthese_cycle_rdc'];

	$sql     = 'SELECT SYNTHESE_RDC FROM tab_validation_synthese_rdc WHERE MISSION_ID = :mission_id AND SYNTHESE_CYCLE_RDC = :synthese_cycle_rdc';
	$reponse = $bdd->prepare($sql);

	$reponse->execute(array(
		"mission_id"         => $mission_id,
		"synthese_cycle_rdc" => $synthese_cycle_rdc
	));
	
	if($donnees = $reponse->fetch()) {
		echo $donnees['SYNTHESE_RDC'];
	} else {

		$sql     = 'SELECT SYNTHESE_OBS FROM tab_synthese_feuille_rdc WHERE MISSION_ID = :mission_id AND SYNTHESE_CYCLE = :synthese_cycle';
		$reponse = $bdd->prepare($sql);

		$reponse->execute(array(
			"mission_id"     => $mission_id,
			"synthese_cycle" => $synthese_cycle_rdc
		));
		
		while($donnees = $reponse->fetch()) {
			echo $donnees['SYNTHESE_OBS']."\n\n";
		}
	}
?>