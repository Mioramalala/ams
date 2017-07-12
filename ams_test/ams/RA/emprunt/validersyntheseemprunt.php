<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$synthese_emprunt=$_POST['synthese_emprunt'];
	
	$reponse0=$bdd->query('select SYNTHESE_ID_RA from  tab_synthese_ra where MISSION_ID='.$mission_id.' AND SYNTHESE_OBJECTIF="emprunt"');
	
	$donnees0=$reponse0->fetch();
	
	if($donnees0['SYNTHESE_ID_RA']!=0){
		$reponse1=$bdd->exec('update tab_synthese_ra set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese_emprunt.'" where
		MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RA='.$donnees0['SYNTHESE_ID_RA']);
		if(!$reponse1) echo  'update tab_synthese_ra set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese_emprunt.'" where
		MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RA='.$donnees0['SYNTHESE_ID_RA'];
	}
	else{
		$reponse=$bdd->exec('INSERT INTO tab_synthese_ra(SYNTHESE,SYNTHESE_OBJECTIF,MISSION_ID,UTIL_ID) VALUE 
		("'.$synthese_emprunt.'","emprunt","'.$mission_id.'","'.$UTIL_ID.'")');
	}
	
	$req='INSERT INTO tab_synthese_ra(SYNTHESE,SYNTHESE_OBJECTIF,MISSION_ID,UTIL_ID) VALUE 
	("'.$synthese_emprunt.'","emprunt","'.$mission_id.'","'.$UTIL_ID.'")';
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	
	$req2='update tab_synthese_ra set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese_emprunt.'" where
		MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RA='.$donnees0['SYNTHESE_ID_RA'];
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
?>