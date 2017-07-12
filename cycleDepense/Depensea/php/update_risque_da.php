<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$risque_id=$_POST['risque_id'];
$risque=$_POST['risque'];
$mission_id=$_SESSION['idMission'];

$reponse = $bdd->exec('UPDATE tab_niveau_risque_a SET UTIL_ID = "'.$UTIL_ID.'",NIVEAU_RISQUE_NOM = "'.$risque.'" WHERE NIVEAU_RISQUE_ID= "' .$risque_id .'" AND MISSION_ID= "' .$mission_id .'"');


$req='UPDATE tab_niveau_risque_a SET UTIL_ID = "'.$UTIL_ID.'",NIVEAU_RISQUE_NOM = "'.$risque.'" WHERE NIVEAU_RISQUE_ID= "' .$risque_id .'" AND MISSION_ID= "' .$mission_id .'"';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

if($reponse) echo 'update';

?>