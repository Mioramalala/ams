<?php
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 include '../../../connexion.php';
 $UTIL_ID=$_SESSION['id'];

$text=$_POST['dataTable3String'];
$mission_id=$_POST['mission_id'];

//J'active le triage du texte pour les séparer en tableau
$mot=explode('*',$text);

//Je test si les données existe déjà dans la table tab_rdc_st_d3
//Si les données existe je fait la mis à jour des données en fonction du mission_id
//Si les données n'existe pas encore, je fait un requette qui execute l'insertion des données dans la tab_rdc_st_d3

$queryMissionId='select MISSION_ID from tab_rdc_st_d3 where MISSION_ID='.$mission_id;
$reponseMissionId=$bdd->query($queryMissionId);
$donneesMissionId=$reponseMissionId->fetch();
if($donneesMissionId['MISSION_ID']!=0){
	$queryUpdate='update tab_rdc_st_d3 set UTIL_ID = "'.$UTIL_ID.'",L1_C1="'.$mot[1].'",L1_C2="'.$mot[2].'",L1_C3="'.$mot[3].'",L1_C4="'.$mot[4].'",L2_C1="'.$mot[5].'",L2_C2="'.$mot[6].'",L2_C3="'.$mot[7].'",L2_C4="'.$mot[8].'",L3_C1="'.$mot[9].'",L3_C2="'.$mot[10].'",L3_C3="'.$mot[11].'",L3_C4="'.$mot[12].'",L4_C1="'.$mot[13].'",L4_C2="'.$mot[14].'",L4_C3="'.$mot[15].'",L4_C4="'.$mot[16].'",L5_C1="'.$mot[17].'",L5_C2="'.$mot[18].'",L5_C3="'.$mot[19].'",L5_C4="'.$mot[20].'" where MISSION_ID='.$mission_id;
	$reponseQueryUpdate=$bdd->exec($queryUpdate);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
}
else{
	$query='insert into tab_rdc_st_d3 (L1_C1,L1_C2,L1_C3,L1_C4,L2_C1,L2_C2,L2_C3,L2_C4,L3_C1,L3_C2,L3_C3,L3_C4,L4_C1,L4_C2,L4_C3,L4_C4,L5_C1,L5_C2,L5_C3,L5_C4,MISSION_ID,UTIL_ID) value ("'.$mot[1].'","'.$mot[2].'","'.$mot[3].'","'.$mot[4].'","'.$mot[5].'","'.$mot[6].'","'.$mot[7].'","'.$mot[8].'","'.$mot[9].'","'.$mot[10].'","'.$mot[11].'","'.$mot[12].'","'.$mot[13].'","'.$mot[14].'","'.$mot[15].'","'.$mot[16].'","'.$mot[17].'","'.$mot[18].'","'.$mot[19].'","'.$mot[20].'",'.$mission_id.','.$UTIL_ID.')';
	$reponseQuery=$bdd->exec($query);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $query.";", FILE_APPEND | LOCK_EX);
}

?>