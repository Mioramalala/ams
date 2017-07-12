<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];
include '../../connexion.php';

	$PLANIF_CYCLE=$_POST['PLANIF_CYCLE'];
	$fonction=$_POST['fonction'];
	$compte=$_POST['compte'];
	$planif_gen=$_POST['planif_gen'];
	$seuil_sign=$_POST['seuil_sign'];
	$taux_sondage=$_POST['taux_sondage'];
	//$mission_id=$_POST['mission_id'];


	$sqlExist="select count(*) as 'nbr_planif' from tab_planification_ra where MISSION_ID='$mission_id' and PLANIF_CYCLE='$PLANIF_CYCLE'";
	$req=$bdd->query($sqlExist);
	$resultat=$req->fetch();
	$SQL_="";

//print ($PLANIF_CYCLE);
if($resultat["nbr_planif"]==0)
{

	$SQL_="INSERT INTO tab_planification_ra(PLANIF_FONCT,PLANIF_COMPTE,PLANIF_GEN,SEUIL_SIGN,TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID)
	 					 VALUES ('$fonction','$compte','$planif_gen','$seuil_sign','$taux_sondage','$PLANIF_CYCLE','$mission_id','$UTIL_ID')";

}else
{
	$SQL_="UPDATE  tab_planification_ra
					SET PLANIF_FONCT='$fonction',
					 PLANIF_COMPTE='$compte',
					 PLANIF_GEN='$planif_gen',
					 SEUIL_SIGN='$seuil_sign',
					 TAUX_SONDAGE='$taux_sondage'

					 WHERE MISSION_ID='$mission_id' and PLANIF_CYCLE='$PLANIF_CYCLE'";

}
	//print ($SQL_);
$reponse=$bdd->exec($SQL_);


	

$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $SQL_.";", FILE_APPEND | LOCK_EX);
?>