<?php
	session_start();
	require_once("../connexion.php");

	$idMission = @$_SESSION['idMission'];
	$idUtilisateur = @$_SESSION['id'];

	if(isset($_GET['idMissionImportee'])){
		$id_mission_importee = $_GET['idMissionImportee'];
		/*
			Récupération des revues à importer
		*/
		//tab_synthese
		$sql = "SELECT `SYNTHESE_ID`, `SYNTHESE_COMMENTAIRE`, `SYNTHESE_RISQUE`, `SCORE`, `CYCLE_ACHAT_ID`, `UTIL_ID` FROM `tab_synthese` WHERE `MISSION_ID` = ".$id_mission_importee;
		$req = $bdd->query($sql);

		$tabr = array();

		while ( $tab_tmp = $req->fetch(PDO::FETCH_ASSOC) ) {
			$tab_tmp['MISSION_ID'] = $idMission;
			$tab[] = $tab_tmp; 
		}

		//tab_synthese_rsci_ra (srr)
		$sql_srr = "SELECT `DOMAINE`, `CARACTERE`, `EXHAUSTIVITE`, `REALITE`, `PROPRIETE`, `EVALUATION_CORRECTE`, `ENREGISTREMENT_BP`, `IMPUTATION_CORRECTE`, `TOTALISATION`, `BONNE_INFORMATION`, `RISQUE_GF`, `UTIL_ID` FROM `tab_synthese_rsci_ra` WHERE `MISSION_ID` = ".$id_mission_importee;
		$req_srr = $bdd->query($sql_srr);

		$tab_srr = array();

		while ( $tab_tmp = $req_srr->fetch(PDO::FETCH_ASSOC) ) {
			$tab_tmp['MISSION_ID'] = $idMission;
			$tab_srr[] = $tab_tmp; 
		}
		
		//tab_synthese_rsci (sr)
		$sql_sr = "SELECT `CYCLE`, `SYNTHESE`, `RISQUE`, `UTIL_ID` FROM `tab_synthese_rsci` WHERE `MISSION_ID` = ".$id_mission_importee;
		$req_sr = $bdd->query($sql_sr);

		$tab_sr = array();

		while ( $tab_tmp = $req_sr->fetch(PDO::FETCH_ASSOC) ) {
			$tab_tmp['MISSION_ID'] = $idMission;
			$tab_sr[] = $tab_tmp; 
		}

		//tab_incidence_ra (ir)
		$sql_ir = "SELECT `FONCTIONNEMENT`, `COMPTE`, `CYCLE`, `UTIL_ID` FROM `tab_incidence_ra` WHERE `MISSION_ID` = ".$id_mission_importee;
		$req_ir = $bdd->query($sql_ir);

		$tab_ir = array();

		while ( $tab_tmp = $req_ir->fetch(PDO::FETCH_ASSOC) ) {
			$tab_tmp['MISSION_ID'] = $idMission;
			$tab_ir[] = $tab_tmp; 
		}
		/*
			Insertion des revues importées pour la mission courante
		*/
		//Test si l'importation a été déjà fait

		$test = $bdd->query("SELECT * FROM `tab_synthese` WHERE `MISSION_ID` = ".$idMission)->fetchAll();
		$test_srr = $bdd->query("SELECT * FROM `tab_synthese_rsci_ra` WHERE `MISSION_ID` = ".$idMission)->fetchAll();
		$test_sr = $bdd->query("SELECT * FROM `tab_synthese_rsci` WHERE `MISSION_ID` = ".$idMission)->fetchAll();
		$test_ir = $bdd->query("SELECT * FROM `tab_incidence_ra` WHERE `MISSION_ID` = ".$idMission)->fetchAll();
		
		//tab_synthese
		if( count($test) == 0 ){
			for ($i=0; $i < count($tab); $i++) { 
				$bdd->exec("INSERT INTO `tab_synthese`(`SYNTHESE_COMMENTAIRE`, `SYNTHESE_RISQUE`, `SCORE`, `CYCLE_ACHAT_ID`, `MISSION_ID`, `UTIL_ID`)
						VALUES ('".addslashes($tab[$i]['SYNTHESE_COMMENTAIRE'])."', '".$tab[$i]['SYNTHESE_RISQUE']."', '".$tab[$i]['SCORE']."', '".$tab[$i]['CYCLE_ACHAT_ID']."', '".$tab[$i]['MISSION_ID']."', '".$tab[$i]['UTIL_ID']."')");
			}
		}
		else{
			for ($i=0; $i < count($tab); $i++) { 
				$bdd->exec("UPDATE `tab_synthese` SET
						`SYNTHESE_COMMENTAIRE` = '".addslashes($tab[$i]['SYNTHESE_COMMENTAIRE'])."',
						`SYNTHESE_RISQUE` = '".$tab[$i]['SYNTHESE_RISQUE']."',
						`SCORE` = '".$tab[$i]['SCORE']."',
						`CYCLE_ACHAT_ID` = '".$tab[$i]['CYCLE_ACHAT_ID']."',
						`UTIL_ID` = ".$idUtilisateur.",
						WHERE `MISSION_ID` = '".$idMission);
			}
		}

		//tab_synthese_rsci_ra (srr)
		if( count($test_srr) == 0 ){
			for ($i=0; $i < count($tab_srr); $i++) { 
				$bdd->exec("INSERT INTO `tab_synthese_rsci_ra`(`DOMAINE`, `CARACTERE`, `EXHAUSTIVITE`, `REALITE`, `PROPRIETE`, `EVALUATION_CORRECTE`, `ENREGISTREMENT_BP`, `IMPUTATION_CORRECTE`, `TOTALISATION`, `BONNE_INFORMATION`, `RISQUE_GF`, `MISSION_ID`, `UTIL_ID`)
						VALUES ('".addslashes($tab_srr[$i]['DOMAINE'])."', '".addslashes($tab_srr[$i]['CARACTERE'])."', '".addslashes($tab_srr[$i]['EXHAUSTIVITE'])."', '".addslashes($tab_srr[$i]['REALITE'])."', '".addslashes($tab_srr[$i]['PROPRIETE'])."', '".addslashes($tab_srr[$i]['EVALUATION_CORRECTE'])."', '".addslashes($tab_srr[$i]['ENREGISTREMENT_BP'])."', '".addslashes($tab_srr[$i]['IMPUTATION_CORRECTE'])."', '".addslashes($tab_srr[$i]['TOTALISATION'])."', '".addslashes($tab_srr[$i]['BONNE_INFORMATION'])."','".addslashes($tab_srr[$i]['RISQUE_GF'])."', '".addslashes($tab_srr[$i]['MISSION_ID'])."', '".addslashes($tab_srr[$i]['UTIL_ID'])."')");
			}
		}
		else{

			for ($i=0; $i < count($tab_srr); $i++) { 
				$bdd->exec("UPDATE `tab_synthese_rsci_ra` SET
						`DOMAINE` = '".addslashes($tab_srr[$i]['DOMAINE'])."',
						`CARACTERE` = '".addslashes($tab_srr[$i]['CARACTERE'])."',
						`EXHAUSTIVITE` = '".addslashes($tab_srr[$i]['EXHAUSTIVITE'])."',
						`REALITE` = '".addslashes($tab_srr[$i]['REALITE'])."',
						`PROPRIETE` = '".addslashes($tab_srr[$i]['PROPRIETE'])."',
						`EVALUATION_CORRECTE` = '".addslashes($tab_srr[$i]['EVALUATION_CORRECTE'])."',
						`ENREGISTREMENT_BP` = '".addslashes($tab_srr[$i]['ENREGISTREMENT_BP'])."',
						`IMPUTATION_CORRECTE` = '".addslashes($tab_srr[$i]['IMPUTATION_CORRECTE'])."',
						`TOTALISATION` = '".addslashes($tab_srr[$i]['TOTALISATION'])."',
						`BONNE_INFORMATION` = '".addslashes($tab_srr[$i]['BONNE_INFORMATION'])."',
						`RISQUE_GF` = '".addslashes($tab_srr[$i]['RISQUE_GF'])."',
						`UTIL_ID`= ".$idUtilisateur.", 
						WHERE `MISSION_ID` =  ".$idMission);
			}
		}

		//tab_synthese_rsci (sr)
		if(count($test_sr) == 0 ){
			for ($i=0; $i < count($tab_sr); $i++) { 
				$bdd->exec("INSERT INTO `tab_synthese_rsci`(`CYCLE`, `SYNTHESE`, `RISQUE`, `MISSION_ID`, `UTIL_ID`)
						VALUES ( '".addslashes($tab_sr[$i]['CYCLE'])."', '".addslashes($tab_sr[$i]['SYNTHESE'])."', '".addslashes($tab_sr[$i]['RISQUE'])."', '".addslashes($tab_sr[$i]['MISSION_ID'])."', '".addslashes($tab_sr[$i]['UTIL_ID'])."')");
			}
		}
		else{

			for ($i=0; $i < count($tab_sr); $i++) { 
				$bdd->exec("UPDATE `tab_synthese_rsci` SET
						`CYCLE`= '".$tab_sr[$i]['CYCLE']."',
						`SYNTHESE`= '".$tab_sr[$i]['SYNTHESE']."',
						`RISQUE`= '".$tab_sr[$i]['RISQUE']."',
						`UTIL_ID`= ".$idUtilisateur.", 
						WHERE `MISSION_ID` =  ".$idMission);
			}
		}

		//tab_incidence_ra (ir)
		if( count($test_ir) == 0 ){
			for ($i=0; $i < count($tab_ir); $i++) { 
				$bdd->exec("INSERT INTO `tab_incidence_ra`( `FONCTIONNEMENT`, `COMPTE`, `CYCLE`, `MISSION_ID`, `UTIL_ID`)
							VALUES ( '".addslashes($tab_ir[$i]['FONCTIONNEMENT'])."', '".addslashes($tab_ir[$i]['COMPTE'])."', '".addslashes($tab_ir[$i]['CYCLE'])."', '".addslashes($tab_ir[$i]['MISSION_ID'])."', '".addslashes($tab_ir[$i]['UTIL_ID'])."')");
			}
		}
		else{
			for ($i=0; $i < count($tab_ir); $i++) { 
				$bdd->exec("UPDATE `tab_incidence_ra` SET
						`FONCTIONNEMENT`= '".$tab_ir[$i]['FONCTIONNEMENT']."',
						`COMPTE`= '".$tab_ir[$i]['COMPTE']."',
						`CYCLE`= '".$tab_ir[$i]['CYCLE']."',
						`UTIL_ID`= ".$idUtilisateur.", 
						WHERE `MISSION_ID` =  ".$idMission);
			}
		}
	}

	$bdd = null;
?>