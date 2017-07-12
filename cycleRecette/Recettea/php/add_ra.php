<?php 
@session_start();
$mission_id=$_POST['mission_id'];
$poste_id=$_POST['poste_id'];
$ligne=$_POST['ligne'];
$result=$_POST['result'];
$cycleName=$_POST['cycleName'];
$UTIL_ID=$_SESSION ['id'];
include '../../../connexion.php';


$sql="INSERT INTO tab_fonct_a (FONCT_A_LIGNE, FONCT_A_RESULT, MISSION_ID, POSTE_CYCLE_ID, FONCT_A_NOM,UTIL_ID)
      VALUES ('$ligne.','$result','$mission_id','$poste_id','$cycleName','$UTIL_ID')";
	  $reponse=$bdd->query($sql);
      print $sql;


$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);



?>