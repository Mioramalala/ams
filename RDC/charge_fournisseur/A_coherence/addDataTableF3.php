<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$text=$_POST['text'];
$mission_id=$_POST['mission_id'];
$reference=$_POST['reference'];

//J'active le triage du texte dans un tableau
$mot=explode('*',$text);

//J'active la verification des données si ils existent ou non à partir de mission_id
$queryMissionId='select MISSION_ID from tab_rdc_cf_f3 where MISSION_ID='.$mission_id.' and REFERENCE="'.$reference.'"';
$reponseMissionId=$bdd->query($queryMissionId);
$donneesMissionId=$reponseMissionId->fetch();

//J'active le test pour la mis à jour ou l'enregistrement des données dans la table tab_rdc_cf_f3
if($donneesMissionId['MISSION_ID']!=0){
	$queryUpdate='update tab_rdc_cf_f3 set UTIL_ID = '.$UTIL_ID.',L1_C1="'.$mot[1].'",L1_C2="'.$mot[2].'",L2_C1="'.$mot[3].'",L2_C2="'.$mot[4].'",L3_C1="'.$mot[5].'",L3_C2="'.$mot[6].'",L4_C1="'.$mot[7].'",L4_C2="'.$mot[8].'",L5_C1="'.$mot[9].'",L5_C2="'.$mot[10].'",L6_C1="'.$mot[11].'",L6_C2="'.$mot[12].'" where MISSION_ID='.$mission_id.' and REFERENCE="'.$reference.'"';
	$reponseUpdate=$bdd->exec($queryUpdate);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
	echo $queryUpdate;
}
else{
	$queryInsert='insert into tab_rdc_cf_f3 (L1_C1,L1_C2,L2_C1,L2_C2,L3_C1,L3_C2,L4_C1,L4_C2,L5_C1,L5_C2,L6_C1,L6_C2,MISSION_ID,REFERENCE,UTIL_ID) value ("'.$mot[1].'","'.$mot[2].'","'.$mot[3].'","'.$mot[4].'","'.$mot[5].'","'.$mot[6].'","'.$mot[7].'","'.$mot[8].'","'.$mot[9].'","'.$mot[10].'","'.$mot[11].'","'.$mot[12].'",'.$mission_id.',"'.$reference.'","'.$UTIL_ID.'")';
	$reponseInsert=$bdd->exec($queryInsert);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
	echo $queryInsert;
}



?>