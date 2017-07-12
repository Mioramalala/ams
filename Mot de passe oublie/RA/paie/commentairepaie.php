<?php
include '../../connexion.php';

$numerocompte=$_POST['numerocompte'];
$mission_id=$_POST['mission_id'];
$comment_paie=$_POST['comment_paie'];
$objectif=$_POST['objectif'];

$reponse=$bdd->exec('INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID) VALUE 
	("'.$comment_paie.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'")');

if(!$reponse) echo 'INSERT INTO  tab_commentaire_ra(COMMENTAIRE,COMMENTAIRE_OBJECTIF,IMPORT_ID,MISSION_ID) VALUE 
	("'.$comment_paie.'","'.$objectif.'",'.$numerocompte.',"'.$mission_id.'")';

?>