<?php
	@session_start();
	$mission_id=$_SESSION['idMission'];

	include '../../connexion.php';
	
	$reponse = $bdd->query('SELECT SYNTHESE,MISSION_ID FROM tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="impot"');
	
	$donnees=$reponse->fetch();
	
	if($donnees['SYNTHESE']==""){
		//echo utf8_encode('Rédiger ici votre synthèse');
	}
	else{		
		echo $donnees['SYNTHESE'];
	}

?>
