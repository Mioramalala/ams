<?php 
	include 'connexion.php';
	if (isset($_POST["objectif"]) && isset($_POST["idMission"])) {
		$objectif = $_POST["objectif"];
		$idMission = $_POST["idMission"];
		$result = array();

		//implode
		$objImploded = implode(",", $objectif);
		$sql = "select t.cycle_achat_id, t.statut from tab_synthese t where t.cycle_achat_id in (".$objImploded.") and t.mission_id =".$idMission." order by t.cycle_achat_id"; 
		$req = $bdd->query($sql);
		while($res = $req->fetch()){
			$temp = array("cycleAchaId" => $res["cycle_achat_id"], "statut" => $res["statut"]);
			array_push($result,$temp);
		}
		echo json_encode($result);
	}
?>