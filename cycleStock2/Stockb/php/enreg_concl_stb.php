<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$mission_id=$_POST['mission_id'];

$reponse=$bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUE ("'.$commentaire.'","'.$risque.'",'.$mission_id.',12,'.$UTIL_ID.')');

$req1='INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUE ("'.$commentaire.'","'.$risque.'",'.$mission_id.',12,'.$UTIL_ID.')';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

?>