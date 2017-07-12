<?php
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
include "$project_path/connexion.php";
$UTIL_ID=$_SESSION['id'];

$id_compte=utf8_decode($_POST['id_compte']);
$id_intitule=utf8_decode($_POST['id_intitule']);
$id_solde1=utf8_decode($_POST['id_solde1']);
$id_solde2=utf8_decode($_POST['id_solde2']);
$id_solde3=utf8_decode($_POST['id_solde3']);
$id_res1=utf8_decode($_POST['id_res1']);
$id_observation1=utf8_decode($_POST['id_observation1']);
$id_res2=utf8_decode($_POST['id_res2']);
$id_observation2=utf8_decode($_POST['id_observation2']);
$mission_id=utf8_decode($_POST['mission_id']);

	$query='insert into tab_g2(G2_COMPTE,G2_LIBELLE,G2_SOLDE1,G2_SOLDE2,G2_SOLDE3,G2_RES1,G2_OBSERVATION1,G2_RES2, 	G2_OBSERVATION2,MISSION_ID,UTIL_ID) value
	("'.$id_compte.'","'.$id_intitule.'","'.$id_solde1.'","'.$id_solde2.'","'.$id_solde3.'","'.$id_res1.'","'.$id_observation1.'","'.$id_res2.'","'.$id_observation2.'","'.$mission_id.'","'.$UTIL_ID.'")';
	$reponse=$bdd->exec($query);
	
	$reqInsert='insert into tab_g2(G2_COMPTE,G2_LIBELLE,G2_SOLDE1,G2_SOLDE2,G2_SOLDE3,G2_RES1,G2_OBSERVATION1,G2_RES2, 	G2_OBSERVATION2,MISSION_ID,UTIL_ID) value
	("'.$id_compte.'","'.$id_intitule.'","'.$id_solde1.'","'.$id_solde2.'","'.$id_solde3.'","'.$id_res1.'","'.$id_observation1.'","'.$id_res2.'","'.$id_observation2.'","'.$mission_id.'","'.$UTIL_ID.'")';
			
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $reqInsert.";", FILE_APPEND | LOCK_EX);
?>