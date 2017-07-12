<?php
	require_once("../connexion.php");
	session_start()

	$idMission = $_SESSION['idMission'];

	if(isset($_GET['idMissionImportee']){
		$id_mission_importee = $_GET['idMissionImportee'];
		
		//tab_synthese_rsci_ra (srr)
		$sql_srr = "SELECT `DOMAINE`, `CARACTERE`, `EXHAUSTIVITE`, `REALITE`, `PROPRIETE`, `EVALUATION_CORRECTE`, `ENREGISTREMENT_BP`, `IMPUTATION_CORRECTE`, `TOTALISATION`, `BONNE_INFORMATION`, `RISQUE_GF`, `UTIL_ID` FROM `tab_synthese_rsci_ra` WHERE `MISSION_ID` = ".$idMission;
		$req_srr = $bdd->query($sql_srr);
		
		$tab_srr = array();

		while ( $tab_tmp = $req_srr->fetch() ) {
			$tab_srr[] = $tab_tmp; 
		}
		
		//tab_synthese_rsci (sr)
		$sql_sr = "SELECT `CYCLE`, `SYNTHESE`, `RISQUE`, `UTIL_ID` FROM `tab_synthese_rsci` WHERE `MISSION_ID` = ".$idMission;
		$req_sr = $bdd->query($sql_sr);
		
		$tab_sr = array();

		while ( $tab_tmp = $req_sr->fetch() ) {
			$tab_sr[] = $tab_tmp; 
		}

		//tab_incidence_ra (ir)
		$sql_ir = "SELECT `FONCTIONNEMENT`, `COMPTE`, `CYCLE`, `UTIL_ID` FROM `tab_incidence_ra` WHERE `MISSION_ID` = ".$idMission;
		$req_ir = $bdd->query($sql_ir);
		
		$tab_ir = array();

		while ( $tab_tmp = $req_ir->fetch() ) {
			$tab_ir[] = $tab_tmp; 
		}

		echo "---------------------------------------\n";
		var_dump($tab_srr);
		echo "---------------------------------------\n";
		var_dump($tab_sr);
		echo "---------------------------------------\n";
		var_dump($tab_ir);
	}
?>