<?php
include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$synthese_immo=$_POST['synthese_immo'];
	
	$reponse0=$bdd->query('select SYNTHESE_ID_RA from  tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="immo"');
	
	$donnees0=$reponse0->fetch();
	
	if($donnees0['SYNTHESE_ID_RA']!=0){
		$reponse1=$bdd->exec('update tab_synthese_ra set SYNTHESE="'.$synthese_immo.'" where SYNTHESE_ID_RA='.$donnees0['SYNTHESE_ID_RA']);
		if(!$reponse1) echo  'update tab_synthese_ra set SYNTHESE="'.$synthese_immo.'" where SYNTHESE_ID_RA='.$donnees0['SYNTHESE_ID_RA'];
	}
	else{
		$reponse=$bdd->exec('INSERT INTO tab_synthese_ra(SYNTHESE,SYNTHESE_OBJECTIF,MISSION_ID) VALUE 
		("'.$synthese_immo.'","immo","'.$mission_id.'")');
	}
?>