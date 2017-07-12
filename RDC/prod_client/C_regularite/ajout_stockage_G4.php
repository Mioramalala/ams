<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$id_compte=$_POST['id_compte'];
$id_libelle=$_POST['id_libelle'];
$id_res=$_POST['id_res'];
$id_justification=$_POST['id_justification'];
$id_observation=$_POST['id_observation'];
$mission_id=$_POST['mission_id'];

$query='insert into tab_g4(G4_COMPTE, G4_LIBELLE,G4_RES,G4_JUSTIFICATION,G4_OBSERVATION,MISSION_ID,UTIL_ID) value
("'.$id_compte.'","'.$id_libelle.'","'.$id_res.'","'.$id_justification.'","'.$id_observation.'","'.$mission_id.'",'.$UTIL_ID.')';

$reponse=$bdd->exec($query);
	
$req1='insert into tab_g4(G4_COMPTE, G4_LIBELLE,G4_RES,G4_JUSTIFICATION,G4_OBSERVATION,MISSION_ID,UTIL_ID) value
("'.$id_compte.'","'.$id_libelle.'","'.$id_res.'","'.$id_justification.'","'.$id_observation.'","'.$mission_id.'",'.$UTIL_ID.')';
		
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
?>