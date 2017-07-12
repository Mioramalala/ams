<?php
@session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	$mission_id=@$_SESSION['idMission'];
	$compt=$_POST["compt"];
	$libelet=$_POST["lib"];
	$solde=$_POST["solde"];
	$dateCirc=$_POST["dateCirc"];
	$dateRep=$_POST["dateRep"];
	$solde_circ=$_POST["solde_circ"];
	$obs=$_POST["obs"];
	$ecart=$_POST["ecart"];
	// echo "eto".$compt.$libelet.$solde.$dateCirc.$dateRep.$solde_circ.$ecart.$obs;

/////////////////////////////////////////////requet update/////////////////////////////////////////////////////////

	$sql='UPDATE  tab_rdc_cf_f8 SET  UTIL_ID = "'.$UTIL_ID.'",libelle_cf_f8="'.$libelet.'",solde_cf_f8="'.$solde.'",date_circ_cf_f8="'.$dateCirc.'",
	date_rep_cf_f8="'.$dateRep.'", solde_circ_cf_f8="'.$solde_circ.'",ecart_cf_f8="'.$ecart.'",observation_cf_f8="'.$obs.'"
		 WHERE  compt_cf_f8="'.$compt.'" AND id_mission="'.$_SESSION['idMission'].'"';
	$req=$bdd->exec($sql);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);
		
?>