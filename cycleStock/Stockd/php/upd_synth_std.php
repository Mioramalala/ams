<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$echo_score_std=$_POST['echo_score_std'];

$sqlUpdate="UPDATE tab_synthese 
              SET SYNTHESE_COMMENTAIRE='$commentaire',
              UTIL_ID='$UTIL_ID',
              SYNTHESE_RISQUE='$risque',
              SCORE='$echo_score_std'
              WHERE MISSION_ID='$mission_id' AND CYCLE_ACHAT_ID='13'";

$reponse=$bdd->query($sqlUpdate);
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $sqlUpdate.";", FILE_APPEND | LOCK_EX);

?>