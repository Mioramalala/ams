<?php
@session_start();
$mission_id=$_SESSION['idMission'];

include '../../../connexion.php';

$poste_id=$_POST['poste_id'];
$risque=$_POST['risque'];
$UTIL_ID=$_SESSION['id'];

// à verifier
//$reponse = $bdd->exec('INSERT INTO tab_niveau_risque_A (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');

//Tinay editer
$reponse = $bdd->exec('INSERT INTO tab_niveau_risque_a (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'", "' .$poste_id .'", "' .$mission_id .'", "' .$UTIL_ID .'")');

if($reponse) echo 'enregistrer';
?>