<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../connexion.php';

$numerocompte=$_POST['numerocompte'];
$mission_id=$_POST['mission_id'];
$comment_paie=$_POST['comment_paie'];
$objectif=$_POST['objectif'];

// $reponseDel=$bdd->exec('delete from tab_ra where RA_CYCLE="paie" AND MISSION_ID='.$mission_id);

$reponse=$bdd->exec('INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID,UTIL_ID) VALUE 
	("'.$comment_paie.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'","'.$UTIL_ID.'")');

if(!$reponse) echo 'INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID,UTIL_ID) VALUE 
	("'.$comment_paie.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'","'.$UTIL_ID.'")';
	
$req='INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID,UTIL_ID) VALUE 
	("'.$comment_paie.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'","'.$UTIL_ID.'")';
$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>