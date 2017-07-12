<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];
$poste_id=$_POST['poste_id'];
$risque=$_POST['risque'];


//à verifier
// $reponse = $bdd->exec('INSERT INTO tab_niveau_risque_A (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');
// $req='INSERT INTO tab_niveau_risque_A (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')';

//Tinay editer
$reponse = $bdd->exec('INSERT INTO tab_niveau_risque_a (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("' .$risque .'", "' .$poste_id .'", "' .$mission_id .'", "'.$UTIL_ID .'")');
$req='INSERT INTO tab_niveau_risque_a (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'", "'.$poste_id .'", "' .$mission_id .'", "'.$UTIL_ID .'")';

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

if($reponse) echo 'enregistrer';
?>