<?php

include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];
$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$echo_score_de = $_POST['echo_score_de'];

$reponse=$bdd->exec('UPDATE tab_synthese SET SCORE = "'.$echo_score_de .'",SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'",UTIL_ID ="'.$UTIL_ID.'" WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=25');

$req= 'UPDATE tab_synthese SET SCORE = "'.$echo_score_de .'",SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'",UTIL_ID ="'.$UTIL_ID.'" WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=25';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>