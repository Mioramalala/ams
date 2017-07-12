<?php

include '../../../connexion.php';
@session_start();
$mission_id=@$_SESSION['idMission'];
$UTIL_ID=$_SESSION['id'];

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];


$question_id=$_POST['question_id'];


$reponse = $bdd->query("INSERT INTO tab_objectif (OBJECTIF_COMMENTAIRE, OBJECTIF_QCM, CYCLE_ACHAT_ID, MISSION_ID, QUESTION_ID, UTIL_ID) VALUES ('$commentaire','$qcm','7','$mission_id','$question_id','$UTIL_ID')");

?>