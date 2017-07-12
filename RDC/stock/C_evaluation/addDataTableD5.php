<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$categorie=$_POST['categorie'];
$code=$_POST['code'];
$designation=$_POST['designation'];
$prix=$_POST['prix'];
$cout=$_POST['cout'];
$ecart=$_POST['ecart'];
$centage=$_POST['centage'];
$observation=$_POST['observation'];
$mission_id=$_POST['mission_id'];
$cpt=$_POST['cpt'];
$reference=$_POST['reference'];

//J'active un requette pour vérifier si l'identifiant du table tab_rdc_st_d5 existe
$queryId='select id from tab_rdc_st_d5 where mission_id='.$mission_id.' and cpt='.$cpt.' and reference="'.$reference.'"';
$reponseId=$bdd->query($queryId);
$donneesId=$reponseId->fetch();

echo $donneesId['id'];
//J'active un mis à jour si l'identifiant existe ou j'enregistre les données si non
if($donneesId['id']!=0){
	$queryUpdate='update tab_rdc_st_d5 set UTIL_ID = "'.$UTIL_ID.'",categorie="'.$categorie.'", code="'.$code.'",designation="'.$designation.'", prix='.$prix.', cout='.$cout.', ecart='.$ecart.', centage='.$centage.', observation="'.$observation.'", mission_id='.$mission_id.', cpt='.$cpt.', reference="'.$reference.'" where id='.$donneesId['id'];
	$reponseUpdate=$bdd->exec($queryUpdate);
	echo $queryUpdate;
	
	$req='update tab_rdc_st_d5 set UTIL_ID = "'.$UTIL_ID.'",categorie="'.$categorie.'", code="'.$code.'",designation="'.$designation.'", prix='.$prix.', cout='.$cout.', ecart='.$ecart.', centage='.$centage.', observation="'.$observation.'", mission_id='.$mission_id.', cpt='.$cpt.', reference="'.$reference.'" where id='.$donneesId['id'];
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
else{
	$queryInsert='insert into tab_rdc_st_d5 (categorie, code, designation, prix, cout, ecart, centage, observation, mission_id, cpt, reference,UTIL_ID) value ("'.$categorie.'","'.$code.'","'.$designation.'",'.$prix.','.$cout.','.$ecart.','.$centage.',"'.$observation.'",'.$mission_id.','.$cpt.',"'.$reference.'",'.$UTIL_ID.')';
	$reponseInsert=$bdd->exec($queryInsert);
	echo $queryInsert;
	
	$req1='insert into tab_rdc_st_d5 (categorie, code, designation, prix, cout, ecart, centage, observation, mission_id, cpt, reference,UTIL_ID) value ("'.$categorie.'","'.$code.'","'.$designation.'",'.$prix.','.$cout.','.$ecart.','.$centage.',"'.$observation.'",'.$mission_id.','.$cpt.',"'.$reference.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
}
?>