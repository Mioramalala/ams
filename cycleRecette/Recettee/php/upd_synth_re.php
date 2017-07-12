<?php

include '../../../connexion.php';

@session_start();
$mission_id= $_SESSION['idMission'];

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$echo_score_re= $_POST['echo_score_re'];

// tinay editer: pas de update pour score??
$reponse=$bdd->exec('UPDATE tab_synthese SET 	SYNTHESE_COMMENTAIRE= "'.$commentaire.'", 
												SYNTHESE_RISQUE= "'.$risque.'", 
												SCORE= "' .$echo_score_re .'"
										WHERE 	MISSION_ID= "'.$mission_id .'" 
												AND CYCLE_ACHAT_ID=21'
					);

$req= 'UPDATE tab_synthese SET 	SYNTHESE_COMMENTAIRE= "'.$commentaire.'", 
												SYNTHESE_RISQUE= "'.$risque.'", 
												SCORE= "' .$echo_score_re .'"
										WHERE 	MISSION_ID= "'.$mission_id .'" 
												AND CYCLE_ACHAT_ID=21';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>