<?php
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id= $_POST['mission_id'];
$commentaire= $_POST['commentaire'];
$risque= $_POST['risque'];
$echo_score_rd = $_POST['echo_score_rd'];

//$reponse=$bdd->exec('UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'",UTIL_ID = "'.$UTIL_ID.'" WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=20'); // pas de score
$reponse=$bdd->exec(	'UPDATE tab_synthese 	SET SYNTHESE_COMMENTAIRE="'.$commentaire.'",
												SYNTHESE_RISQUE="'.$risque.'", 
												UTIL_ID = "'.$UTIL_ID.'",
												SCORE = "'.$echo_score_rd.'"
											WHERE MISSION_ID= "'.$mission_id.'" 
												AND CYCLE_ACHAT_ID=20'
					);
echo 'update';


$req= 'UPDATE tab_synthese 	SET SYNTHESE_COMMENTAIRE="'.$commentaire.'",
												SYNTHESE_RISQUE="'.$risque.'", 
												UTIL_ID = "'.$UTIL_ID.'",
												SCORE = "'.$echo_score_rd.'"
											WHERE MISSION_ID= "'.$mission_id.'" 
												AND CYCLE_ACHAT_ID=20';
												
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	
?>