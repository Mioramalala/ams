<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';
	$fonct1=$_POST['fonct1'];
	$fonct11=$_POST['fonct11'];
	$fonct111=$_POST['fonct111'];
	$mission_id=$_POST['mission_id'];
	
	$reponse=$bdd->exec('INSERT INTO tab_planif_gen_ra(PLANIF_GEN,PLANIF_SEUIL_SIGN,PLANIF_TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID,VALIDER) VALUES ("'.$fonct1.'","'.$fonct11.'","'.$fonct111.'","fond","'.$mission_id.'","'.$UTIL_ID.'",1)');
	
	/*$req='INSERT INTO tab_planif_gen_ra(PLANIF_GEN,PLANIF_SEUIL_SIGN,PLANIF_TAUX_SONDAGE,PLANIF_CYCLE,MISSION_ID,UTIL_ID) VALUES ("'.$fonct1.'","'.$fonct11.'","'.$fonct111.'","fond","'.$mission_id.'","'.$UTIL_ID.'")');
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);*/
?>