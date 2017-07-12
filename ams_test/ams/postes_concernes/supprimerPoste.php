<?php 

	include '../connexion.php';

	$mission_id  = $_POST['mission_id'];
	$entrepiseId = $_POST['entrepiseId'];
	$poste       = $_POST['poste'];
	$cycle       = $_POST['cycle'];

	$reponse_select_poste_cycle = $bdd->prepare("SELECT POSTE_CYCLE_ID FROM tab_poste_cycle WHERE 
		POSTE_CYCLE_NOM = :poste_cycle_nom AND 
		ENTREPRISE_ID   = :entreprise_id   AND
		POSTE_CLE_ID    = :poste_cle_id    AND
		MISSION_ID      = :mission_id"
	);

	$reponse_select_poste_cycle->execute(array(
		"poste_cycle_nom" => $cycle,
		"entreprise_id"   => $entrepiseId,
		"poste_cle_id"    => $poste,
		"mission_id"      => $mission_id,
	));

	while($donnee = $reponse_select_poste_cycle->fetch()) {
		$reponse_delete_fonct = $bdd->prepare("DELETE FROM tab_fonct_a WHERE 
			POSTE_CYCLE_ID = :poste_cycle_id
		");

		$reponse_delete_fonct->execute(array(
			"poste_cycle_id" => $donnee["POSTE_CYCLE_ID"]
		));
	}

	$reponse_delete_poste_cycle = $bdd->prepare("DELETE FROM tab_poste_cycle WHERE 
		POSTE_CYCLE_NOM = :poste_cycle_nom AND 
		ENTREPRISE_ID   = :entreprise_id   AND
		POSTE_CLE_ID    = :poste_cle_id    AND
		MISSION_ID      = :mission_id"
	);

	$reponse_delete_poste_cycle->execute(array(
		"poste_cycle_nom" => $cycle,
		"entreprise_id"   => $entrepiseId,
		"poste_cle_id"    => $poste,
		"mission_id"      => $mission_id,
	));

/*
	$req = "DELETE cycle.* FROM tab_poste_cycle cycle
	INNER JOIN tab_poste_cle cle 
	ON cle.POSTE_CLE_ID = cycle.POSTE_CLE_ID
	WHERE cle.POSTE_CLE_NOM='".$poste."'
	AND cycle.ENTREPRISE_ID='".$entrepiseId."'
	AND cycle.POSTE_CYCLE_NOM='".$cycle."'
	AND cycle.MISSION_ID=".$mission_id;

	$bdd->exec($req);

	echo $req;
*/
?>