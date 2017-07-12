<?php
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 include '../../../connexion.php';
 $UTIL_ID=$_SESSION['id'];

$text=$_POST['dataTable2String'];
$mission_id=$_POST['mission_id'];

//Je trie toutes la phrase en tableau
$mot=explode('*',$text);

//Je test si les données sont déjà insérer pour la mis à jour du table D2 à partir du mission_id
$queryMissionId='select MISSION_ID from tab_rdc_st_d2 where MISSION_ID='.$mission_id;
$reponseMissionId=$bdd->query($queryMissionId);
$donneesMissionId=$reponseMissionId->fetch();
if($donneesMissionId['MISSION_ID']!=0){
	$queryUpdate='update tab_rdc_st_d2 set UTIL_ID = "'.$UTIL_ID.'",T1_L1_N1="'.$mot[1].'",T1_L1_N2="'.$mot[2].'",T1_L1_N3="'.$mot[3].'",T1_L2_N1="'.$mot[4].'",T1_L2_N2="'.$mot[5].'",T1_L2_N3="'.$mot[6].'",T1_L3_N1="'.$mot[7].'",T1_L3_N2="'.$mot[8].'",T1_L3_N3="'.$mot[9].'",T1_L4_N1="'.$mot[10].'",T1_L4_N2="'.$mot[11].'",T1_L4_N3="'.$mot[12].'",T1_L5_N1="'.$mot[13].'",T1_L5_N2="'.$mot[14].'",T1_L5_N3="'.$mot[15].'",T2_L1_N1="'.$mot[16].'",T2_L1_N2="'.$mot[17].'",T2_L1_N3="'.$mot[18].'",T2_L2_N1="'.$mot[19].'",T2_L2_N2="'.$mot[20].'",T2_L2_N3="'.$mot[21].'",T2_L3_N1="'.$mot[22].'",T2_L3_N2="'.$mot[23].'",T2_L3_N3="'.$mot[24].'",T2_L4_N1="'.$mot[25].'",T2_L4_N2="'.$mot[26].'",T2_L4_N3="'.$mot[27].'",T2_L5_N1="'.$mot[28].'",T2_L5_N2="'.$mot[29].'",T2_L5_N3="'.$mot[30].'",T3_L1_N1="'.$mot[31].'",T3_L1_N2="'.$mot[32].'",T3_L1_N3="'.$mot[33].'",T3_L2_N1="'.$mot[34].'",T3_L2_N2="'.$mot[35].'",T3_L2_N3="'.$mot[36].'",T3_L3_N1="'.$mot[37].'",T3_L3_N2="'.$mot[38].'",T3_L3_N3="'.$mot[39].'",T3_L4_N1="'.$mot[40].'",T3_L4_N2="'.$mot[41].'",T3_L4_N3="'.$mot[42].'",T3_L5_N1="'.$mot[43].'",T3_L5_N2="'.$mot[44].'",T3_L5_N3="'.$mot[45].'",T4_L1_N1="'.$mot[46].'",T4_L1_N2="'.$mot[47].'",T4_L1_N3="'.$mot[48].'",T4_L2_N1="'.$mot[49].'",T4_L2_N2="'.$mot[50].'",T4_L2_N3="'.$mot[51].'",T4_L3_N1="'.$mot[52].'",T4_L3_N2="'.$mot[53].'",T4_L3_N3="'.$mot[54].'",T4_L4_N1="'.$mot[55].'",T4_L4_N2="'.$mot[56].'",T4_L4_N3="'.$mot[57].'",T4_L5_N1="'.$mot[58].'",T4_L5_N2="'.$mot[59].'",T4_L5_N3="'.$mot[60].'" where MISSION_ID='.$mission_id;
	$reponseUpdate=$bdd->exec($queryUpdate);
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
}
else{
	//J'execute le requette de l'execution d'insertion de la table D2
	$query=('insert into tab_rdc_st_d2 (T1_L1_N1,T1_L1_N2,T1_L1_N3,T1_L2_N1,T1_L2_N2,T1_L2_N3,T1_L3_N1,T1_L3_N2,T1_L3_N3,T1_L4_N1,T1_L4_N2,T1_L4_N3,T1_L5_N1,T1_L5_N2,T1_L5_N3,T2_L1_N1,T2_L1_N2,T2_L1_N3,T2_L2_N1,T2_L2_N2,T2_L2_N3,T2_L3_N1,T2_L3_N2,T2_L3_N3,T2_L4_N1,T2_L4_N2,T2_L4_N3,T2_L5_N1,T2_L5_N2,T2_L5_N3,T3_L1_N1,T3_L1_N2,T3_L1_N3,T3_L2_N1,T3_L2_N2,T3_L2_N3,T3_L3_N1,T3_L3_N2,T3_L3_N3,T3_L4_N1,T3_L4_N2,T3_L4_N3,T3_L5_N1,T3_L5_N2,T3_L5_N3,T4_L1_N1,T4_L1_N2,T4_L1_N3,T4_L2_N1,T4_L2_N2,T4_L2_N3,T4_L3_N1,T4_L3_N2,T4_L3_N3,T4_L4_N1,T4_L4_N2,T4_L4_N3,T4_L5_N1,T4_L5_N2,T4_L5_N3,MISSION_ID,UTIL_ID) value ("'.$mot[1].'","'.$mot[2].'","'.$mot[3].'","'.$mot[4].'","'.$mot[5].'","'.$mot[6].'","'.$mot[7].'","'.$mot[8].'","'.$mot[9].'","'.$mot[10].'","'.$mot[11].'","'.$mot[12].'","'.$mot[13].'","'.$mot[14].'","'.$mot[15].'","'.$mot[16].'","'.$mot[17].'","'.$mot[18].'","'.$mot[19].'","'.$mot[20].'","'.$mot[21].'","'.$mot[22].'","'.$mot[23].'","'.$mot[24].'","'.$mot[25].'","'.$mot[26].'","'.$mot[27].'","'.$mot[28].'","'.$mot[29].'","'.$mot[30].'","'.$mot[31].'","'.$mot[32].'","'.$mot[33].'","'.$mot[34].'","'.$mot[35].'","'.$mot[36].'","'.$mot[37].'","'.$mot[38].'","'.$mot[39].'","'.$mot[40].'","'.$mot[41].'","'.$mot[42].'","'.$mot[43].'","'.$mot[44].'","'.$mot[45].'","'.$mot[46].'","'.$mot[47].'","'.$mot[48].'","'.$mot[49].'","'.$mot[50].'","'.$mot[51].'","'.$mot[52].'","'.$mot[53].'","'.$mot[54].'","'.$mot[55].'","'.$mot[56].'","'.$mot[57].'","'.$mot[58].'","'.$mot[59].'","'.$mot[60]  .'",'. $mission_id.','.$UTIL_ID.')');
	$reponse=$bdd->exec($query);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $query.";", FILE_APPEND | LOCK_EX);
}
?>