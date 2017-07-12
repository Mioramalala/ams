<?php

session_start();
include '../../../connexion.php';
	
	$mission_id = $_POST['mission_id'];
	$reference  = $_POST['reference'];
	$nbr        = $_POST['nbr'];

	echo '{';
	$queryAffiche   = 'select * from  tab_rdc_tr_e2 where mission_id=:mission_id and cpt=:cpt and reference=:reference ORDER BY cpt';
	$reponseAffiche = $bdd->prepare($queryAffiche);
	$reponseAffiche->execute(array(
		"mission_id" => $mission_id,
		"cpt"        => $nbr,
		"reference"  => $reference
	));
	
	while($donneesAffiche = $reponseAffiche->fetch()) {
		echo '"cpt"         :  '.$donneesAffiche['cpt'].',';
		echo '"avis"        : "'.addslashes($donneesAffiche['avis']).'",';
		echo '"date"        : "'.addslashes($donneesAffiche['date']).'",';
		echo '"nature"      : "'.addslashes($donneesAffiche['nature']).'",';
		echo '"compta"      : "'.addslashes($donneesAffiche['compta']).'",';
		echo '"observation" : "'.addslashes($donneesAffiche['observation']).'"';
	}
	echo '}';
	
	