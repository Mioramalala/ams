<?php

@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];
$risque=$_POST['risque'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_RISQUE, MISSION_ID, QUESTION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$risque.'","'.$_SESSION['idMission'].'",'.$question_id.',33,'.$UTIL_ID.')');

if($reponse) echo 'enregistrer';
?>