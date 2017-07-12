<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$categorie=$_POST['categorie'];
$produit=$_POST['produit'];
$designation=$_POST['designation'];
$etat_theorique=$_POST['etat_theorique'];
$etat_inventaire=$_POST['etat_inventaire'];
$ecart=$_POST['ecart'];
$observation=$_POST['observation'];
$mission_id=$_POST['mission_id'];
$cpt=$_POST['cpt'];

$queryData='select id from tab_rdc_st_d4 where mission_id='.$mission_id.' and cpt='.$cpt;
$reponseData=$bdd->query($queryData);
$donneesData=$reponseData->fetch();

if($donneesData['id']!=0){
	$queryUpdate='update tab_rdc_st_d4 set UTIL_ID = "'.$UTIL_ID.'",categorie="'.$categorie.'",produit="'.$produit.'", designation="'.$designation.'", etat_theorique="'.$etat_theorique.'", etat_inventaire="'.$etat_inventaire.'", ecart="'.$ecart.'",observation="'.$observation.'", mission_id='.$mission_id.', cpt='.$cpt.' where id='.$donneesData['id'];
	$reponseUpdate=$bdd->exec($queryUpdate);
	
	$req='update tab_rdc_st_d4 set UTIL_ID = "'.$UTIL_ID.'",categorie="'.$categorie.'",produit="'.$produit.'", designation="'.$designation.'", etat_theorique="'.$etat_theorique.'", etat_inventaire="'.$etat_inventaire.'", ecart="'.$ecart.'",observation="'.$observation.'", mission_id='.$mission_id.', cpt='.$cpt.' where id='.$donneesData['id'];
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

	echo $req;
}
else{
	$queryInsert='insert into tab_rdc_st_d4 (categorie, produit, designation, etat_theorique, etat_inventaire, ecart, observation, mission_id, cpt,UTIL_ID) value ("'.$categorie.'","'.$produit.'","'.$designation.'","'.$etat_theorique.'","'.$etat_inventaire.'","'.$ecart.'","'.$observation.'",'.$mission_id.','.$cpt.','.$UTIL_ID.')';
	$reponseInsert=$bdd->exec($queryInsert);
	
	$req1='insert into tab_rdc_st_d4 (categorie, produit, designation, etat_theorique, etat_inventaire, ecart, observation, mission_id, cpt,UTIL_ID) value ("'.$categorie.'","'.$produit.'","'.$designation.'","'.$etat_theorique.'","'.$etat_inventaire.'","'.$ecart.'","'.$observation.'",'.$mission_id.','.$cpt.','.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

	echo $req1;
}
?>