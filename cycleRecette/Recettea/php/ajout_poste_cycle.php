<?php

include '../../../connexion.php';

$text=$_POST['text'];
$mission_id=$_POST['mission_id'];
$entrepiseId=$_POST['entrepiseId'];
$UTIL_ID=$_SESSION['id'];


$rep=$bdd->query('SELECT POSTE_CLE_ID FROM tab_poste_cle WHERE POSTE_CLE_NOM="'.$text.'" AND ENTREPRISE_ID='.$entrepiseId);
$d=$rep->fetch();
$posteCleId=$d['POSTE_CLE_ID'];

	
$reponse2=$bdd->exec('INSERT INTO tab_poste_cycle (POSTE_CYCLE_NOM, POSTE_CLE_ID, MISSION_ID, ENTREPRISE_ID, UTIL_ID) VALUE ("recette",'.$posteCleId.','.$mission_id.','.$entrepiseId.','.$UTIL_ID.')');

echo $reponse2;
?>