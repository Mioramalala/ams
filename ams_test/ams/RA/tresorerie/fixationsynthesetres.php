<?php
	include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$reponse = $bdd->query('SELECT SYNTHESE,MISSION_ID FROM tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="tresorerie"');
	
	$donnees=$reponse->fetch();
	
	if($donnees['SYNTHESE']==""){
		//echo utf8_encode('Rédiger votre synthèse ici');
	}
	else{		
		echo $donnees['SYNTHESE'];
	}

?>