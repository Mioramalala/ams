<?php
include '../../../connexion.php';

@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id= $_SESSION['idMission'];

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$echo_score_stb = $_POST['echo_score_stb'];

$reponse=$bdd->exec('UPDATE tab_synthese SET SCORE = "' .$echo_score_stb .'", SYNTHESE_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", SYNTHESE_RISQUE="'.$risque.'" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=11');

$req1= 'UPDATE tab_synthese SET SCORE = "' .$echo_score_stb .'", SYNTHESE_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", SYNTHESE_RISQUE="'.$risque.'" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=11';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

?>