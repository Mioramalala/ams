<?php
include '../../connexion.php';

$numerocompte=$_POST['numerocompte'];
$mission_id=$_POST['mission_id'];
$comment_dcdivers=$_POST['comment_dcdivers'];
$objectif=$_POST['objectif'];

$reponse=$bdd->exec('INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID) VALUE 
	("'.$comment_dcdivers.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'")');

if(!$reponse) echo 'INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID) VALUE 
	("'.$comment_dcdivers.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'")';

?>