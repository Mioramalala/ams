<?php 
	if (isset($_POST["idMission"]) && isset($_POST["idSuperviseur"]) && isset($_POST["nomSuperviseur"])) {
		require '../connexion.php';

		$idMission = $_POST["idMission"];
		$idSuperviseur = $_POST["idSuperviseur"];
		$nomSuperviseur = $_POST["nomSuperviseur"];

		//update dans la table superviseur
		$sql = "update tab_superviseur set superviseur_nom = '".$nomSuperviseur."', util_id = ".$idSuperviseur." where mission_id =".$idMission;
		$bdd->exec($sql);

		//update dans repartition des taches
		$idTachePlanification = array (4,9,10,18,23,29,39,48,51,54,58);
		$sql = "update tab_distribution_tache set util_id = ".$idSuperviseur." where (tache_id = :tachePlanifie and mission_id = ".$idMission.")";
		$req = $bdd->prepare($sql);
		foreach ($idTachePlanification as $tachePlanifie) {
			$req->execute(array("tachePlanifie" => $tachePlanifie));
		}
		echo "Fait";
	} else {
		echo "Erreur de connexion";
	}
?>