<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';
	$fonction=trim($_POST['fonction']);
	$compte=trim($_POST['compte']);
	$planif_gen=trim($_POST['planif_gen']);
	$seuil_sign=trim($_POST['seuil_sign']);
	$taux_sondage=trim($_POST['taux_sondage']);
	$mission_id=trim($_POST['mission_id']);
	
	$reponse=$bdd->exec('INSERT INTO 
		tab_planification_ra(PLANIF_FONCT,PLANIF_COMPTE,PLANIF_GEN,SEUIL_SIGN,TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID) 
		VALUES ("'.$fonction.'","'.$compte.'","'.$planif_gen.'","'.$seuil_sign.'","'.$taux_sondage.'","charge","'.$mission_id.'","'.$UTIL_ID.'")
		ON DUPLICATE KEY UPDATE PLANIF_FONCT="'.$fonction.'", PLANIF_COMPTE="'.$compte.'", PLANIF_GEN="'.$planif_gen.'",
		SEUIL_SIGN="'.$seuil_sign.'",TAUX_SONDAGE="'.$taux_sondage.'",UTIL_ID="'.$UTIL_ID.'"');
	
	/*$req='INSERT INTO 
		tab_planification_ra(PLANIF_FONCT,PLANIF_COMPTE,PLANIF_GEN,SEUIL_SIGN,TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID) 
		VALUES ("'.$fonction.'","'.$compte.'","'.$planif_gen.'","'.$seuil_sign.'","'.$taux_sondage.'","charge","'.$mission_id.'","'.$UTIL_ID.'")
		ON DUPLICATE KEY UPDATE PLANIF_FONCT="'.$fonction.'", PLANIF_COMPTE="'.$compte.'", PLANIF_GEN="'.$planif_gen.'"
		SEUIL_SIGN="'.$seuil_sign.'",TAUX_SONDAGE="'.$taux_sondage.'",UTIL_ID="'.$UTIL_ID.'"';
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

	echo $req;*/
?>