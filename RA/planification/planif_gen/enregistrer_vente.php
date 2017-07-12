<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';
	$fonct7=$_POST['fonct6'];
	$fonct77=$_POST['fonct66'];
	$fonct777=$_POST['fonct666'];
	$mission_id=$_POST['mission_id'];
	
	$reponse=$bdd->exec('INSERT INTO tab_planif_gen_ra(PLANIF_GEN,PLANIF_SEUIL_SIGN,PLANIF_TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID,VALIDER)
	 VALUES ("'.$fonct6.'","'.$fonct66.'","'.$fonct666.'","vente","'.$mission_id.'","'.$UTIL_ID.'",1)');
	
	/*$req='INSERT INTO tab_planif_gen_ra(PLANIF_GEN,PLANIF_SEUIL_SIGN,PLANIF_TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID) VALUES ("'.$fonct6.'","'.$fonct66.'","'.$fonct666.'","vente","'.$mission_id.'","'.$UTIL_ID.'")';
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);*/
?>