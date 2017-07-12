<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$synthese=$_POST['synthese'];
$mission_id=$_POST['mission_id'];
$cycle=$_POST['cycle'];
$objectif=$_POST['objectif'];
$reference=$_POST['reference'];

//J'active le requette qui test si les données existe déjà par cycle, objectif et mission_id
$queryId='select id from tab_rdc_st_ra where MISSION_ID='.$mission_id.' and OBJECTIF="'.$objectif.'" and CYCLE="'.$cycle.'" and REFERENCE="'.$reference.'"';
$reponseId=$bdd->query($queryId);
$donneesId=$reponseId->fetch();

//Je verifie si l'id existe si il existe alors je fais la mis à jour sinon je fait l'enregistrement
if($donneesId['id']!=0){
	$queryUpdate='update tab_rdc_st_ra set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'" where MISSION_ID='.$mission_id.' and id='.$donneesId['id'];
	$reponseUpdate=$bdd->exec($queryUpdate);
	
	$reqUpdate='update tab_rdc_st_ra set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'" where MISSION_ID='.$mission_id.' and id='.$donneesId['id'];
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $reqUpdate.";", FILE_APPEND | LOCK_EX);
}
else{
	$queryInsert='insert into tab_rdc_st_ra (SYNTHESE, MISSION_ID, OBJECTIF, CYCLE, REFERENCE,UTIL_ID) value ("'.$synthese.'",'.$mission_id.',"'.$objectif.'","'.$cycle.'","'.$reference.'",'.$UTIL_ID.')';
	$reponseInsert=$bdd->exec($queryInsert);
	
	$reqInsert='update tab_rdc_st_ra set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'" where MISSION_ID='.$mission_id.' and id='.$donneesId['id'];
			
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $reqInsert.";", FILE_APPEND | LOCK_EX);
}

?>