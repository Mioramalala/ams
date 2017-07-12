<?php 
	@session_start();
	$UTIL_ID=$_SESSION['id'];
	
	include '../../../connexion.php';
	$mission_id=@$_SESSION['idMission'];
	$compt=$_POST["compt"];
	$libelet=$_POST["lib"];
	$solde=$_POST["solde"];
	$dateCirc=$_POST["dateCirc"];
	$dateRep=$_POST["dateRep"];
	$solde_circ=$_POST["solde_circ"];
	$obs=$_POST["obs"];
	$ecart=$_POST["ecart"];
////////////////////////////////////////////////requet insertion////////////////////////////////////////////////////////////
	$reqInsert=$bdd->exec('INSERT INTO  tab_rdc_cf_f8 ( compt_cf_f8, 
	libelle_cf_f8, solde_cf_f8 , date_circ_cf_f8, date_rep_cf_f8,
	solde_circ_cf_f8,ecart_cf_f8,observation_cf_f8,id_mission ) VALUE ("'.$compt.'","'.$libelet.'","'.$solde.'","'.$dateCirc.'","'.$dateRep.'","'.$solde_circ.'","'.$ecart.'","'.$obs.'",'.$mission_id.')');
	
	$req='INSERT INTO  tab_rdc_cf_f8 ( compt_cf_f8, 
	libelle_cf_f8, solde_cf_f8 , date_circ_cf_f8, date_rep_cf_f8,
	solde_circ_cf_f8,ecart_cf_f8,observation_cf_f8,id_mission ) VALUE ("'.$compt.'","'.$libelet.'","'.$solde.'","'.$dateCirc.'","'.$dateRep.'","'.$solde_circ.'","'.$ecart.'","'.$obs.'",'.$mission_id.')';
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>