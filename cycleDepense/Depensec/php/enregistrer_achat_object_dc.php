<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$mission_id=$_POST['mission_id'];
$question_id=$_POST['question_id'];

$reponse = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_COMMENTAIRE, OBJECTIF_QCM, CYCLE_ACHAT_ID, MISSION_ID, QUESTION_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$qcm.'",23,'.$mission_id.','.$question_id.','.$UTIL_ID.')');

$req='INSERT INTO tab_objectif (OBJECTIF_COMMENTAIRE, OBJECTIF_QCM, CYCLE_ACHAT_ID, MISSION_ID, QUESTION_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$qcm.'",23,'.$mission_id.','.$question_id.','.$UTIL_ID.')';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>