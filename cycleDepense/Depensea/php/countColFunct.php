<?php

include '../../../connexion.php';
@session_start();
$entrepriseId = $_SESSION["id_Entre"];
$missionId = $_SESSION['idMission'];

$cpt = 0;
$result = 0;
$checkLigne = false;

//check ligne : verifie si chaqhe ligne de la separation de fonction est checkée, pour depense_a, il ya 24 lignes à cocher
$sql = "SELECT COUNT(DISTINCT `FONCT_A_LIGNE`) AS nombreLigne
			FROM tab_fonct_a AS tf
			INNER JOIN tab_poste_cycle AS tc
			ON tf.`POSTE_CYCLE_ID`= tc.`POSTE_CYCLE_ID`
			INNER JOIN tab_poste_cle AS tcle
			ON tc.`POSTE_CLE_ID` = tcle.`POSTE_CLE_ID`
			WHERE tf.`MISSION_ID`=".$missionId."
			AND tc.`POSTE_CYCLE_NOM` = 'depense'
			AND tc.`MISSION_ID` = ".$missionId."
			AND tc.`ENTREPRISE_ID` = ".$entrepriseId."
			AND tf.`FONCT_A_NOM`= 'depense'";
$req = $bdd->query($sql);

$rep = $req->fetch();

if($rep["nombreLigne"] >= 24) {

	$checkLigne = true;

	$result = 1;

}



if ($checkLigne) {
	//check colonne : verifie si chaque colonne de la separation de fonction est checkée	
	$reponse = $bdd->query("SELECT `POSTE_CYCLE_ID` FROM `tab_poste_cycle` AS tcycle
								INNER JOIN `tab_poste_cle` AS tcle
								ON tcycle.`POSTE_CLE_ID` = tcle.`POSTE_CLE_ID`
								WHERE tcycle.`MISSION_ID` = ".$missionId."
								AND tcycle.`ENTREPRISE_ID` = ".$entrepriseId."
								AND tcle.`ENTREPRISE_ID` = ".$entrepriseId."
								AND tcycle.`POSTE_CYCLE_NOM` = 'depense'");
	$query = "SELECT COUNT(FONCT_A_ID) AS COMPTE 
				FROM tab_fonct_a
				WHERE `POSTE_CYCLE_ID` = :idPosteCycle
				AND `MISSION_ID` = ".$missionId."
				AND `FONCT_A_NOM` = 'depense'";
	$req = $bdd->prepare($query);
	while($donnees=$reponse->fetch()){
		$req->execute(array("idPosteCycle" => $donnees["POSTE_CYCLE_ID"]));
		$donnees1 = $req->fetch();
		$cpt = $donnees1['COMPTE'];

		if($cpt==0){
			$result = 0;
			break;
		}
	}
} else {
	$result = 0;
} 


echo $result;



?>