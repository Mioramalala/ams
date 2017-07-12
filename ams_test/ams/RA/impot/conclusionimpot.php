<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$conclusion_impot=$_POST['conclusion_impot'];
	
	$reponse0=$bdd->query('select CONCLUSION_RA_ID from tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="impot"');
	
	$donnees0=$reponse0->fetch();
	
	if($donnees0['CONCLUSION_RA_ID']!=0){
		$reponse1=$bdd->exec('update  tab_conclusion_ra set UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion_impot.'" where  MISSION_ID="'.$mission_id.'" AND  CONCLUSION_RA_ID='.$donnees0['CONCLUSION_RA_ID']);
		if(!$reponse1) echo  'update  tab_conclusion_ra set UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion_impot.'" where  MISSION_ID="'.$mission_id.'" AND  CONCLUSION_RA_ID='.$donnees0['CONCLUSION_RA_ID'];
	}
	else{
		$reponse=$bdd->exec('INSERT INTO  tab_conclusion_ra(CONCLUSION,CONCLUSION_OBJECTIF,MISSION_ID,UTIL_ID) VALUE 
	("'.$conclusion_impot.'","impot","'.$mission_id.'","'.$UTIL_ID.'")');
	}
	
	$req='INSERT INTO  tab_conclusion_ra(CONCLUSION,CONCLUSION_OBJECTIF,MISSION_ID,UTIL_ID) VALUE 
	("'.$conclusion_impot.'","impot","'.$mission_id.'","'.$UTIL_ID.'")';
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	
	$req2='update  tab_conclusion_ra set UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion_impot.'" where  MISSION_ID="'.$mission_id.'" AND  CONCLUSION_RA_ID='.$donnees0['CONCLUSION_RA_ID'];
	$file = '../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
?>