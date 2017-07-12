<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

if ( isset($_POST['a'])){
$rubrique=@$_POST['a'];
// echo $rubrique;
}
$reqInsert=$bdd->exec("INSERT INTO  tab_Frais_Accessoire ( nom_frais_acc, 
id_mission,UTIL_ID) VALUE ('".$rubrique."',".$mission_id.",".$UTIL_ID.")");

$req="INSERT INTO  tab_Frais_Accessoire (nom_frais_acc,id_mission,UTIL_ID) VALUE ('".$rubrique."',".$mission_id.",".$UTIL_ID.")";
	  
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>