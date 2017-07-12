<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$synthese_immo=$_POST['synthese_immo'];
	
	$reponse0=$bdd->query('select SYNTHESE_ID_RDC from tab_validation_synthese_rdc where MISSION_ID='.$mission_id.' AND SYNTHESE_CYCLE_RDC="immo"');
	
	$donnees0=$reponse0->fetch();
	
	if($donnees0['SYNTHESE_ID_RDC']!=0){
		$reponse1=$bdd->exec('update tab_validation_synthese_rdc set UTIL_ID = "'.$UTIL_ID.'",	SYNTHESE_RDC="'.$synthese_immo.'" where MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RDC='.$donnees0['SYNTHESE_ID_RDC']);
		if(!$reponse1) echo  'update tab_validation_synthese_rdc set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE_RDC="'.$synthese_immo.'" where MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RDC='.$donnees0['SYNTHESE_ID_RDC'];
	}
	else{
		$reponse=$bdd->exec('INSERT INTO tab_validation_synthese_rdc(SYNTHESE_RDC,SYNTHESE_CYCLE_RDC,MISSION_ID,UTIL_ID) VALUE 
		("'.$synthese_immo.'","immo","'.$mission_id.'","'.$UTIL_ID.'")');
	}
	
	$req='INSERT INTO tab_validation_synthese_rdc(SYNTHESE_RDC,SYNTHESE_CYCLE_RDC,MISSION_ID,UTIL_ID) VALUE 
	("'.$synthese_immo.'","immo","'.$mission_id.'","'.$UTIL_ID.'")';
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	
	$req2='update tab_validation_synthese_rdc set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE_RDC="'.$synthese_charge.'" where
		MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RDC='.$donnees0['SYNTHESE_ID_RDC'];
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
?>