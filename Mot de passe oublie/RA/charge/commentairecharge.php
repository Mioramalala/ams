<?php
include '../../connexion.php';

$numerocompte=$_POST['numerocompte'];
$mission_id=$_POST['mission_id'];
$comment_charge=$_POST['comment_charge'];
$objectif=$_POST['objectif'];

$reponse=$bdd->exec('INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID) VALUE 
	("'.$comment_charge.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'")');

if(!$reponse) echo 'INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID) VALUE 
	("'.$comment_charge.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'")';

?>