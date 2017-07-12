<?php

function Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur) {
include_once"../connexionPDO.php";
include_once"../../connexion.php";
		//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			$Date_sortie=date("Y-m-d");
			try{
					$res=$conx->prepare('INSERT INTO tab_suivi_export_fichier(Date_sortie,nom_fichier,session_utiliser,MISSION_ID,ENTREPRISE_ID,UTIL_ID)
					VALUES (:Date_sortie,:nom_fichier,:session_utiliser,:MISSION_ID,:ENTREPRISE_ID,:UTIL_ID )');
					$res->execute(array('Date_sortie'=>$Date_sortie,'nom_fichier'=>$fichier,'session_utiliser'=>$session_utiliser,'MISSION_ID'=>$ID_mission,'ENTREPRISE_ID'=>$ID_Entreprise,'UTIL_ID'=>$ID_Utilisateur ));
		       }catch(exception $e){}           
				//==============================s       
				//=====================================================================================================
}

	function get_Entreprise ($ID_mission){
		$sqlNbrPo=db_connect("SELECT ENTREPRISE_ID  FROM  tab_mission WHERE MISSION_ID='".$ID_mission."' " );
		
		foreach ($sqlNbrPo as $val){
			$ID_entreprise = $val["ENTREPRISE_ID"];	
		}

		return $ID_entreprise;
	}

	function get_nom_entreprise($ID_entreprise){
		$req=db_connect("SELECT ENTREPRISE_DENOMINATION_SOCIAL FROM tab_entreprise 
		WHERE ENTREPRISE_ID=".$ID_entreprise);

		foreach ($req as $val){
			$nom = $val["ENTREPRISE_DENOMINATION_SOCIAL"];	
		}

		return $nom;
	}
		
		//PRENDRE L'UTILISATEUR
	function get_ID_utilisateur($mail_utilisateur){
		$get_ID_util=db_connect("SELECT UTIL_ID  FROM tab_utilisateur WHERE UTIL_LOGIN ='".$mail_utilisateur ."' ");

		foreach ($get_ID_util as $val){
			$ID_utilisateur = $val['UTIL_ID'];
		}

		return $ID_utilisateur;
	}

	function getCollaborateurs($feuille, $case, $mission_id, $cycle){
		$collaborateurs = array();

		//$sql = "SELECT distinct(UTIL_NOM) FROM tab_rdc,tab_utilisateur WHERE tab_rdc.RDC_CYCLE='".$cycle."' 
		//and tab_rdc.UTIL_ID=tab_utilisateur.UTIL_ID and tab_rdc.MISSION_ID=".$mission_id;
		$sql = "SELECT `COLLAB_UTIL_NOM` FROM `tab_collaborateur` WHERE `COLLAB_STATUT`='actif' 
		AND COLLAB_MISSION_ID=".$mission_id;

		$rep=db_connect($sql); 

		foreach ($rep as $donnee){
			$utilID='';
			$ID = explode(" ", trim($donnee['COLLAB_UTIL_NOM']));
			foreach ($ID as $key => $value) {
				$utilID .= substr($value, 0, 1);
			}

		    array_push($collaborateurs, $utilID);
		}

		$s_collab = implode($collaborateurs, ", ");
		$feuille->setCellValue($case, $s_collab);
	}

	function getSuperviseurs($feuille, $case, $mission_id){
		$collaborateurs = array();

		$sql = "SELECT SUPERVISEUR_NOM FROM tab_superviseur WHERE MISSION_ID=".$mission_id;

		$rep = db_connect($sql); 

		foreach ($rep as $donnee){
			$utilID='';
			$ID = explode(" ", trim($donnee['SUPERVISEUR_NOM']));
			foreach ($ID as $key => $value) {
				$utilID .= substr($value, 0, 1);
			}
			
		    array_push($collaborateurs, $utilID);
		}

		$s_collab = implode($collaborateurs, ", ");
		$feuille->setCellValue($case, $s_collab);
	}

	function setSynthese($cycle, $mission_id){
		$synthese = "";

		$req = "SELECT `SYNTHESE_RDC` FROM `tab_validation_synthese_rdc` 
		WHERE `SYNTHESE_CYCLE_RDC`='".$cycle."' AND `MISSION_ID`=".$mission_id;

		$rep = db_connect($req);

		foreach ($rep as $donnee){
		    $synthese = $donnee['SYNTHESE_RDC'];
		}		

		return $synthese;		
	}


?>