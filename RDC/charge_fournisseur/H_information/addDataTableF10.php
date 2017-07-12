<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$text=$_POST['text'];
$mission_id=$_POST['mission_id'];

//J'active le triage du texte en tableau de mot
$mot=explode('*',$text);

//J'active un requette pour verifier si les données existent à partir du mission_id
$queryMissionId='select MISSION_ID from tab_rdc_cf_f10 where MISSION_ID='.$mission_id;
$reponseMissionId=$bdd->query($queryMissionId);
$donneesMissionId=$reponseMissionId->fetch();

//Je fais la mis à jour ou l'enregistrement en dépendant du mission_id
if($donneesMissionId['MISSION_ID']!=0){
	$queryUpdate='update tab_rdc_cf_f10 set UTIL_ID = "'.$UTIL_ID.'",L1_C1_10="'.$mot[1].'",L1_C2_10="'.$mot[2].'",L2_C1_10="'.$mot[3].'",L2_C2_10="'.$mot[4].'",L3_C1_10="'.$mot[5].'",L3_C2_10="'.$mot[6].'",L4_C1_10="'.$mot[7].'",L4_C2_10="'.$mot[8].'",L5_C1_10="'.$mot[9].'",L5_C2_10="'.$mot[10].'",L6_C1_10="'.$mot[11].'",L6_C2_10="'.$mot[12].'" where MISSION_ID='.$mission_id;
	$reponseUpdate=$bdd->exec($queryUpdate);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
}
else{
	$queryInsert='insert into tab_rdc_cf_f10 (L1_C1_10,L1_C2_10,L2_C1_10,L2_C2_10,L3_C1_10,L3_C2_10,L4_C1_10,L4_C2_10,L5_C1_10,L5_C2_10,L6_C1_10,L6_C2_10,MISSION_ID,UTIL_ID) value ("'.$mot[1].'","'.$mot[2].'","'.$mot[3].'","'.$mot[4].'","'.$mot[5].'","'.$mot[6].'","'.$mot[7].'","'.$mot[8].'","'.$mot[9].'","'.$mot[10].'","'.$mot[11].'","'.$mot[12].'",'.$mission_id.','.$UTIL_ID.')';
	$reponseInsert=$bdd->exec($queryInsert);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
}