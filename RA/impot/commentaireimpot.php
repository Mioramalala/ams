<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../connexion.php';

$numerocompte=$_POST['numerocompte'];
$mission_id=$_POST['mission_id'];
$comment_impot=$_POST['comment_impot'];
$objectif=$_POST['objectif'];

$reponse=$bdd->exec('INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID,UTIL_ID) VALUE 
	("'.$comment_impot.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'","'.$UTIL_ID.'")');

if(!$reponse) echo 'INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID,UTIL_ID) VALUE 
	("'.$comment_impot.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'","'.$UTIL_ID.'")';
	
$req='INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID,UTIL_ID) VALUE 
	("'.$comment_impot.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'","'.$UTIL_ID.'")';
$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>