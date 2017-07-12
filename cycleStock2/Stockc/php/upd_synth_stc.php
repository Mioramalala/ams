<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];

$reponse=$bdd->exec('UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", SYNTHESE_RISQUE="'.$risque.'" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12');


$req1='UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", SYNTHESE_RISQUE="'.$risque.'" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

?>