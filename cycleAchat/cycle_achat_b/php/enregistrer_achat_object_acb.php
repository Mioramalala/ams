<?php
@session_start();
include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$mission_id=$_SESSION['idMission'];
$question_id=$_POST['question_id'];
$UTIL_ID=$_SESSION['id'];


$req='INSERT INTO tab_objectif (OBJECTIF_COMMENTAIRE, OBJECTIF_QCM, CYCLE_ACHAT_ID, MISSION_ID, QUESTION_ID, UTIL_ID)
      VALUES ("'.$commentaire.'","'.$qcm.'",2,'.$mission_id.','.$question_id.','.$UTIL_ID.')';
$reponse = $bdd->exec($req);

$file = $_SERVER["DOCUMENT_ROOT"].'/fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>