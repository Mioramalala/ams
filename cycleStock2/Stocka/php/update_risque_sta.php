<?php

include '../../../connexion.php';

$risque_id=$_POST['risque_id'];
$risque=$_POST['risque'];

$reponse = $bdd->exec('UPDATE tab_niveau_risque_a SET NIVEAU_RISQUE_NOM = "'.$risque.'",UTIL_ID="'.$UTIL_ID.'" WHERE MISSION_ID='.$mission_id.' AND NIVEAU_RISQUE_ID='.$risque_id);


$req1='UPDATE tab_niveau_risque_a SET NIVEAU_RISQUE_NOM = "'.$risque.'",UTIL_ID="'.$UTIL_ID.'" WHERE MISSION_ID="'.$mission_id.'" AND NIVEAU_RISQUE_ID="'.$risque_id.'" ';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);


if($reponse) echo 'update';

?>