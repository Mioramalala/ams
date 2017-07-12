<?php
@session_start();
include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];

$question_id= $_POST['question_id'];
$mission_id= $_SESSION['idMission'];
$UTIL_ID= $_SESSION['id'];

$reponse = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_COMMENTAIRE, OBJECTIF_QCM, CYCLE_ACHAT_ID, MISSION_ID, QUESTION_ID, UTIL_ID) VALUES ("' .$commentaire .'", "' .$qcm .'", 3, "' .$mission_id .'", "' .$question_id .'", "' .$UTIL_ID .'")');

?>