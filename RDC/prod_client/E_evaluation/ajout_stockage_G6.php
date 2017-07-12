<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$id_compte=$_POST['id_compte'];
$id_libelle=$_POST['id_libelle'];
$soldeendevise=$_POST['soldeendevise'];
$devise=$_POST['devise'];
$tauxcloture=$_POST['tauxcloture'];
$result=$_POST['result'];
$soldecomptable=$_POST['soldecomptable'];
$result2=$_POST['result2'];
$observation=$_POST['observation'];

$mission_id=$_POST['mission_id'];

	$query='insert into tab_g6(G6_COMPTE,G6_LIBELLE,G6_S_DEVISE,G6_DEVISE,G6_TAUX,G6_RES,G6_S_COMPTA,G6_RES2,G6_OBSERVATION,MISSION_ID,UTIL_ID) value
	("'.$id_compte.'","'.$id_libelle.'","'.$soldeendevise.'","'.$devise.'","'.$tauxcloture.'","'.$result.'","'.$soldecomptable.'","'.$result2.'","'.$observation.'","'.$mission_id.'",'.$UTIL_ID.')';
	
	$reponse=$bdd->exec($query);
	
	$req1='insert into tab_g6(G6_COMPTE,G6_LIBELLE,G6_S_DEVISE,G6_DEVISE,G6_TAUX,G6_RES,G6_S_COMPTA,G6_RES2,G6_OBSERVATION,MISSION_ID,UTIL_ID) value
	("'.$id_compte.'","'.$id_libelle.'","'.$soldeendevise.'","'.$devise.'","'.$tauxcloture.'","'.$result.'","'.$soldecomptable.'","'.$result2.'","'.$observation.'","'.$mission_id.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
?>