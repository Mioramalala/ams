<?php

// tinay editer

@session_start();
include '../../../connexion.php';

$question_id= $_POST['question_id'];
$risque= $_POST['risque'];
$UTIL_ID= $_SESSION['id'];
$mission_id= $_SESSION['idMission'];

$reponse = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_RISQUE, MISSION_ID, QUESTION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("' .$risque .'", "' .$mission_id .'", "' .$question_id .'",32, "'.$UTIL_ID .'")');
if ($response) echo 'Risque enregistre';
?>