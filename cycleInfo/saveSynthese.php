<?php
	@session_start();
	include '../connexion.php';

	$UTIL_ID = $_SESSION['id'];

	if(isset($_POST['synthese'])){
		$synthese = $_POST['synthese'];
		$risque = $_POST['risque'];
		
		$req = $bdd->query(" SELECT * FROM tab_synthese_rsci WHERE CYCLE = 'info' AND MISSION_ID =".$_SESSION['idMission']." ");
		$ligne = $req->rowCount();

		if( $ligne != 0 ){
			$update = $bdd->exec(" UPDATE tab_synthese_rsci SET SYNTHESE = '".$synthese."', RISQUE = '".$risque."', UTIL_ID = ".$UTIL_ID." WHERE CYCLE = 'info' AND MISSION_ID =".$_SESSION['idMission']." ");
		}
		else{
			$insert = $bdd->prepare(" INSERT INTO tab_synthese_rsci (CYCLE, SYNTHESE, RISQUE, MISSION_ID, UTIL_ID) VALUES (:a,:b,:c,:d,:e) ");
			$insert->execute(array(
				'a' => 'info',
				'b' => $synthese,
				'c' => $risque,
				'd' => $_SESSION['idMission'],
				'e' => $UTIL_ID
			));
		}
	}
?>