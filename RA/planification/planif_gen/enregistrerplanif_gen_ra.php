<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];
include '../../../connexion.php';

$SEUIL_SIGN_=$_POST["SEUIL_SIGN"];
$SONDAGE_=$_POST["TAUX_SONDAGE"];
$PLANIF_GEN_=$_POST["PLANIF_GEN"];
$GEN_ID_=$_POST["PLANIF_GEN_ID"];

$CYCLE_=$_POST["PLANIF_CYCLE"];

$SQL_="";

if(@$GEN_ID_=="")
{
	//print ("INSERTION");
		//INSERTION
		$SQL_="INSERT INTO tab_planif_gen_ra(PLANIF_GEN,PLANIF_SEUIL_SIGN,PLANIF_TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID,VALIDER) 
		               VALUES ('$PLANIF_GEN_','$SEUIL_SIGN_','$SONDAGE_','$CYCLE_','$mission_id','$UTIL_ID','1')";
	

}else
{
	//print ("MISE A JOURS");
	//MISE A JOURS
	$SQL_="UPDATE tab_planif_gen_ra SET
					PLANIF_SEUIL_SIGN='$SEUIL_SIGN_',
					PLANIF_TAUX_SONDAGE='$SONDAGE_',
					PLANIF_GEN='$PLANIF_GEN_',
					VALIDER='1'
					WHERE MISSION_ID='$mission_id' AND PLANIF_GEN_ID='$GEN_ID_'";
					

}
print($SQL_);
$reponse=$bdd->query($SQL_);
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $SQL_.";", FILE_APPEND | LOCK_EX);
?>