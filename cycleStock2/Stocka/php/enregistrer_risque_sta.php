<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$poste_id=$_POST['poste_id'];
$risque=$_POST['risque'];

// à verifier
//$reponse = $bdd->exec('INSERT INTO tab_niveau_risque_A (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');
//$req1='INSERT INTO tab_niveau_risque_A (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')';

//tinay editer
$reponse = $bdd->exec('INSERT INTO tab_niveau_risque_a (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');
$req1='INSERT INTO tab_niveau_risque_a (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID,UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')';


$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

if($reponse) echo 'enregistrer';
?>