<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];

$mission_id= $_SESSION['idMission'];

$reponse=$bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUE ("'.$commentaire.'","'.$risque.'","'.$mission_id.'",24 ,"'.$UTIL_ID.'")');


$req='INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUE ("'.$commentaire.'","'.$risque.'", "'.$mission_id.'",24 ,"'.$UTIL_ID.'"")';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>