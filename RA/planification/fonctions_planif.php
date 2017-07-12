<?php

function getPlanif($cycle, $mission_id){
	include '../../../connexion.php';
	$planif = "";

	$req = "SELECT PLANIF_GEN FROM tab_planification_ra WHERE MISSION_ID=".$mission_id." AND PLANIF_CYCLE='".$cycle."'
	ORDER BY PLANIF_ID DESC";
	$rep = $bdd->query($req);
	$donnees = $rep->fetch();

	$planif = $donnees['PLANIF_GEN'];

	return $planif;
}

function getSeuil($cycle, $mission_id){
	include '../../../connexion.php';
	$req = "SELECT SEUIL_SIGN FROM tab_planification_ra WHERE MISSION_ID=".$mission_id." AND PLANIF_CYCLE='".$cycle."'
	ORDER BY PLANIF_ID DESC";
	$rep = $bdd->query($req);
	$donnees = $rep->fetch();
	return $donnees['SEUIL_SIGN'];	
}

function getSondage($cycle, $mission_id){
	include '../../../connexion.php';
	$req = "SELECT TAUX_SONDAGE FROM tab_planification_ra WHERE MISSION_ID=".$mission_id." AND PLANIF_CYCLE='".$cycle."'
	ORDER BY PLANIF_ID DESC";
	$rep = $bdd->query($req);
	$donnees = $rep->fetch();
	return $donnees['TAUX_SONDAGE'];	
}

?>