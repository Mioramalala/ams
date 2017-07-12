<?php 
@session_start();
$UTIL_ID=$_SESSION['id'];

$mission_id=$_POST['mission_id'];
$poste_id=$_POST['poste_id'];
$ligne=$_POST['ligne'];
$result=$_POST['result'];
$cycleName=$_POST['cycleName'];

include '../../../connexion.php';

// $reponse = $bdd->exec('INSERT INTO tab_fonction_achat_a (FONCT_ACHAT_A_LIGNE, FONCT_ACHAT_A_RESULT, MISSION_ID, POSTE_CYCLE_ID) VALUES ('.$ligne.','.$result.','.$mission_id.','.$poste_id.')');
$reponse=$bdd->exec('INSERT INTO tab_fonct_a (FONCT_A_LIGNE, FONCT_A_RESULT, MISSION_ID, POSTE_CYCLE_ID, FONCT_A_NOM,UTIL_ID) VALUES ('.$ligne.','.$result.','.$mission_id.','.$poste_id.',"'.$cycleName.'","'.$UTIL_ID.'")');

$req1='INSERT INTO tab_fonct_a (FONCT_A_LIGNE, FONCT_A_RESULT, MISSION_ID, POSTE_CYCLE_ID, FONCT_A_NOM,UTIL_ID) VALUES ('.$ligne.','.$result.','.$mission_id.','.$poste_id.',"'.$cycleName.'","'.$UTIL_ID.'")';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

?>