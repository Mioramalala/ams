<?php
@session_start();
include '../../../connexion.php';

$poste_id=$_POST['poste_id'];
$mission_id=$_POST['mission_id'];

$UTIL_ID=$_SESSION['id'];
$reponse=$bdd->exec('INSERT INTO tab_poste_cycle (POSTE_CYCLE_NOM, POSTE_CLE_ID, MISSION_ID,UTIL_ID) VALUE ("depense",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');

$req='INSERT INTO tab_poste_cycle (POSTE_CYCLE_NOM, POSTE_CLE_ID, MISSION_ID,UTIL_ID) VALUE ("depense",'.$poste_id.','.$mission_id.','.$UTIL_ID.')';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>