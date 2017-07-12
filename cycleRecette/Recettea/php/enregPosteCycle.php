<?php
@session_start();
include '../../../connexion.php';

$text=$_POST['text'];
$mission_id=$_POST['mission_id'];
$entrepiseId=$_POST['entrepiseId'];


$UTIL_ID=$_SESSION['id'];

$tab=explode(",",$text);

//Get the poste_cle_id in the tab_poste_cle with enterprise id and job name

for($i=0; $i<count($tab); $i++){
	
	$reponse=$bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cycle WHERE POSTE_CLE_ID='.$tab[$i].' AND MISSION_ID='.$mission_id.' AND ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="recette"');

	$donnees=$reponse->fetch();
	
	$posteCycleId=$donnees['POSTE_CYCLE_ID'];
	
	if($posteCycleId==0){		
		$reponse2=$bdd->exec('INSERT INTO tab_poste_cycle (POSTE_CYCLE_NOM, POSTE_CLE_ID, MISSION_ID, ENTREPRISE_ID,UTIL_ID) VALUE ("recette",'.$tab[$i].','.$mission_id.','.$entrepiseId.','.$UTIL_ID.')');

		
		$req='INSERT INTO tab_poste_cycle (POSTE_CYCLE_NOM, POSTE_CLE_ID, MISSION_ID, ENTREPRISE_ID,UTIL_ID) VALUE ("recette",'.$tab[$i].','.$mission_id.','.$entrepiseId.','.$UTIL_ID.')';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
		
	}
}
?>