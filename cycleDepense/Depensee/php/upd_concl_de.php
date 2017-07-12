<?php

include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$obj_concl_id_f=$_POST['obj_concl_id_f'];
$mission_id=$_SESSION['idMission'];
$UTIL_ID=$_SESSION['id'];

$reponse=$bdd->exec('UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE="'.$commentaire.'", CONCLUSION_RISQUE="'.$risque.'",UTIL_ID ="'.$UTIL_ID.'" WHERE MISSION_ID='.$mission_id.'AND  CONCLUSION_ID='.$obj_concl_id_f);

$req="UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE="'.$commentaire.'", CONCLUSION_RISQUE="'.$risque.'",UTIL_ID ="'.$UTIL_ID.'" WHERE MISSION_ID='.$mission_id.'AND  CONCLUSION_ID='.$obj_concl_id_f.'";
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>