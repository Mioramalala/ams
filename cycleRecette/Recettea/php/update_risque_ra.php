<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];

include '../../../connexion.php';

$risque_id=$_POST['risque_id'];
$risque=$_POST['risque'];

$reponse = $bdd->exec('UPDATE tab_niveau_risque_a SET NIVEAU_RISQUE_NOM = "' .$risque .'" WHERE MISSION_ID= "' .$mission_id .'" AND NIVEAU_RISQUE_ID= "' .$risque_id .'"');

if($reponse) echo 'update';


$req="UPDATE tab_niveau_risque_a SET NIVEAU_RISQUE_NOM = "' .$risque .'" WHERE NIVEAU_RISQUE_ID='.$risque_id.'";
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);


?>