<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$obj_concl_id_f=$_POST['obj_concl_id_f'];

$mission_id=$_SESSION['idMission'];

$reponse=$bdd->exec('UPDATE tab_conclusion SET UTIL_ID="'.$UTIL_ID.'",CONCLUSION_COMMENTAIRE="'.$commentaire.'", CONCLUSION_RISQUE="'.$risque.'" WHERE  MISSION_ID='.$mission_id.' AND CONCLUSION_ID='.$obj_concl_id_f);

$req="UPDATE tab_conclusion SET UTIL_ID="'.$UTIL_ID.'",CONCLUSION_COMMENTAIRE="'.$commentaire.'", CONCLUSION_RISQUE="'.$risque.'" WHERE CONCLUSION_ID='.$obj_concl_id_f.'";
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>