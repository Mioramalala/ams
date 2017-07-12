<?php
	include '../connexion.php';

	/*
	$mission_id=$_POST['mission_id'];
	$reponse = $bdd->query('SELECT SYNTHESE,MISSION_ID FROM tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="tresorerie"');
	
	$donnees=$reponse->fetch();
	
	if($donnees['SYNTHESE']==""){
		echo utf8_encode('Rédiger votre synthèse ici');
	}
	else{		
		echo $donnees['SYNTHESE'];
	}
*/
	$mission_id         = $_POST['mission_id'];
	$synthese_cycle_rdc = $_POST['synthese_cycle_rdc'];

	$reponse = $bdd->prepare('SELECT SYNTHESE_RDC FROM tab_validation_synthese_rdc where MISSION_ID = :mission_id AND SYNTHESE_CYCLE_RDC = :synthese_cycle_rdc');
	
	$reponse->execute(array(
		'mission_id'         => $mission_id,
		'synthese_cycle_rdc' => $synthese_cycle_rdc
	));

	echo $reponse->fetch() ? 'validee' : 'non validee';

?>