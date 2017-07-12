<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$obj_concl_id_f=$_POST['obj_concl_id_f'];

$reponse=$bdd->exec('UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", CONCLUSION_RISQUE="'.$risque.'" WHERE MISSION_ID='.$mission_id.' AND CONCLUSION_ID='.$obj_concl_id_f);

$req1='UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", CONCLUSION_RISQUE="'.$risque.'" WHERE MISSION_ID="'.$mission_id.'" AND CONCLUSION_ID="'.$obj_concl_id_f.'" ';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);


?>