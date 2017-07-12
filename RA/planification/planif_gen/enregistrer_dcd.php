<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';
	$fonct20=$_POST['fonct20'];
	$fonct201=$_POST['fonct201'];
	$fonct2011=$_POST['fonct2011'];
	$mission_id=$_POST['mission_id'];
	
	$reponse=$bdd->exec('INSERT INTO tab_planif_gen_ra(PLANIF_GEN,PLANIF_SEUIL_SIGN,PLANIF_TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID,VALIDER)
	 VALUES ("'.$fonct20.'","'.$fonct201.'","'.$fonct2011.'","dcd","'.$mission_id.'","'.$UTIL_ID.'",1)');
	
	/*$req='INSERT INTO tab_planif_gen_ra(PLANIF_GEN,PLANIF_SEUIL_SIGN,PLANIF_TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID) VALUES ("'.$fonct20.'","'.$fonct201.'","'.$fonct2011.'","dcd","'.$mission_id.'","'.$UTIL_ID.'")';
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);*/
	
?>