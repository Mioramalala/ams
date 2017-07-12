<?php

@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];
$reponse=$_POST['reponse'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_QCM, MISSION_ID, QUESTION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$reponse.'","'.$_SESSION['idMission'].'",'.$question_id.',33,'.$UTIL_ID.')');

if($reponse) echo 'enregistrer';
?>