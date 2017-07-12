<?php
	include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$reponse = $bdd->query('SELECT SYNTHESE_RDC,MISSION_ID FROM tab_synthese_rdc_feuille where MISSION_ID='.$mission_id.' AND SYNTHESE_CYCLE_RDC="stock"');
	
	$donnees=$reponse->fetch();
	
	if($donnees['SYNTHESE_RDC']==""){
		echo utf8_encode('Rédiger ici votre synthèse');
	}
	else{		
		echo $donnees['SYNTHESE_RDC'];
	}
?>