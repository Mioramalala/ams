<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$echo_score_rb = $_POST['echo_score_rb'];

$reponse=$bdd->exec('UPDATE tab_synthese SET UTIL_ID="' .$UTIL_ID .'", SYNTHESE_COMMENTAIRE= "' .$commentaire .'", SYNTHESE_RISQUE= "' .$risque .'", SCORE= "' .$echo_score_rb .'" WHERE MISSION_ID= "' .$mission_id .'" AND CYCLE_ACHAT_ID=18');

$req= 'UPDATE tab_synthese SET UTIL_ID="' .$UTIL_ID .'", SYNTHESE_COMMENTAIRE= "' .$commentaire .'", SYNTHESE_RISQUE= "' .$risque .'", SCORE= "' .$echo_score_rb .'" WHERE MISSION_ID= "' .$mission_id .'" AND CYCLE_ACHAT_ID=18';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>