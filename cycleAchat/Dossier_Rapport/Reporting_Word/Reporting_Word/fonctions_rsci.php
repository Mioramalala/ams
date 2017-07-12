<?php
	function decoder($texte){
		$texte = utf8_decode($texte);
		return html_entity_decode(iconv('UTF-8', 'windows-1252',$texte));
	}

	function compterReponses($cycle_id, $mission_id){
		$nbReponses = 0;

		$res_Compte = db_connect("SELECT COUNT(OBJECTIF_ID) AS COMPTE FROM tab_objectif 
		WHERE CYCLE_ACHAT_ID=".$cycle_id." AND MISSION_ID=".$mission_id);
		
		foreach ($res_Compte  as $val){$nbReponses = $val["COMPTE"];}

		return $nbReponses;
	}

	function compterReponsesNecessaires($cycle_id){
		
		$nbReponses = 0;

		$res_Compte = db_connect("SELECT COUNT(QUESTION_ID) AS COMPTE FROM tab_question 
						WHERE QUESTION_CYCLE_ACHAT=".$cycle_id);
		
		foreach ($res_Compte as $val){$nbReponses = $val["COMPTE"];}

		return $nbReponses;
	}

	function remplirObjectifA($document, $cycle_id, $mission_id, $numLigne, $cycle_nom){
		$rep =db_connect("SELECT POSTE_CLE_NOM FROM tab_poste_cle
						INNER JOIN tab_poste_cycle ON 
						tab_poste_cle.POSTE_CLE_ID = tab_poste_cycle.POSTE_CLE_ID
						WHERE tab_poste_cycle.POSTE_CYCLE_ID IN
						(SELECT POSTE_CYCLE_ID FROM tab_fonct_a 
						WHERE FONCT_A_RESULT=1 AND MISSION_ID=".$mission_id." 
						AND FONCT_A_NOM='".$cycle_nom."' AND FONCT_A_LIGNE=".$numLigne.")
						");
		
		$listePostes = array();

		foreach ($rep  as $val){
			$nom_poste = $val['POSTE_CLE_NOM'];
			array_push($listePostes, $nom_poste);
		}

		$s_listePostes = implode(", ", $listePostes);

		$document->setValue('Value'.$numLigne, decoder($s_listePostes));
		$document->setValue('Value'.$numLigne, "");
		return $s_listePostes;
	}

	function remplirTableauWord($document, $lettre_objectif, $cycle_id, $mission_id){
		$rep =db_connect("SELECT OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_RISQUE  
						FROM tab_objectif WHERE CYCLE_ACHAT_ID=".$cycle_id."
						AND MISSION_ID=".$mission_id);

		$num_ligne = 1;

		foreach ($rep  as $val){
			$qcm = $val['OBJECTIF_QCM'];
			$comment = $val['OBJECTIF_COMMENTAIRE'];
			$risque = $val['OBJECTIF_RISQUE'];

			if($risque=="f"){$risque="Faible";}
			else if($risque=="m"){$risque="Moyen";}
			else if($risque=="e"){$risque="Eleve";}

			$qcm = utf8_decode($qcm);
			$comment = utf8_decode($comment);

			$document->setValue('R'.$lettre_objectif.$num_ligne, $risque);
			$document->setValue($lettre_objectif.$num_ligne, $qcm);
			$document->setValue('CM'.$lettre_objectif.$num_ligne, html_entity_decode(iconv('UTF-8', 'windows-1252',$comment)));
			$num_ligne= $num_ligne+1;
		}
	}

	function remplirSynthese($document, $lettre_objectif, $cycle_id, $mission_id){
		$rep = db_connect("SELECT SCORE, SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE 
						FROM tab_synthese WHERE CYCLE_ACHAT_ID=".$cycle_id." AND MISSION_ID=".$mission_id);

		foreach ($rep  as $val){
			$score = $val['SCORE'];
			$comment = $val['SYNTHESE_COMMENTAIRE'];
			$risque =  $val['SYNTHESE_RISQUE'];

			$document->setValue('SS'.$lettre_objectif, decoder($score));
			$document->setValue('CS'.$lettre_objectif, decoder($comment));
			$document->setValue('RS'.$lettre_objectif, decoder($risque));
		}

	}

	function verifSyntheseExistant($cycle_id, $mission_id){
		$res = 0;

		$rep = db_connect("SELECT COUNT(SYNTHESE_ID) AS COMPTE 
		FROM tab_synthese WHERE CYCLE_ACHAT_ID=".$cycle_id." AND MISSION_ID=".$mission_id);

		foreach ($rep as $val){$res = $val["COMPTE"];}

		return $res;
	}

	function syntheseFinale($document, $nom_cycle, $mission_id){
		$rep = db_connect("SELECT SYNTHESE, RISQUE FROM tab_synthese_rsci WHERE
		CYCLE='".$nom_cycle."' AND MISSION_ID=".$mission_id);

		foreach ($rep as $val){
			$synthese = $val['SYNTHESE'];
			$document->setValue('SYNTH', decoder($synthese));
		}
	}

	function verifRapportExistant($utilisateur,$nom_fichier,$mission_id){
		$nom_fichier1="";
		$rep = db_connect("SELECT nom_fichier
			FROM tab_suivi_export_fichier
			WHERE nom_fichier LIKE '%".$nom_fichier."%'
			AND session_utiliser = '".$utilisateur."'
			AND MISSION_ID=".$mission_id." 
			ORDER BY Date_sortie DESC LIMIT 1" 
		);

		foreach ($rep as $val){
			$nom_fichier1 = $val['nom_fichier'];
		}
		return $nom_fichier1;
	}

	function nettoyerCasesVides($document,$lettre_objectif,$nbReponses){
		$document->setValue("RSA", "");
		$document->setValue("SSA", "");
		$document->setValue("CSA", "");

		for($i=1; $i<=$nbReponses; $i++){
			$document->setValue($lettre_objectif.$i, "");	
			$document->setValue("CM".$lettre_objectif.$i, "");			
			$document->setValue("RS".$lettre_objectif, "");		
			$document->setValue("SS".$lettre_objectif, "");		
			$document->setValue("CS".$lettre_objectif, "");	
			$document->setValue("R".$lettre_objectif.$i, "");		
		}

		$document->setValue("SYNTH", "");
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

	function remplirInfo($document, $ID_mission){
		$reponse=db_connect('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="achat" AND MISSION_ID='.$ID_mission);
		$complexite="";

		foreach ($reponse as $val){
			$complexite = $val['COMPLEXITE'];
			if($complexite=="s"){$complexite="Simple";}
			else if($complexite=="c"){$complexite="Complexe";}
			else if($complexite=="t"){$complexite="Tres complexe";}
		}

		$document->setValue("Value1",$complexite);

		$complexite="";
		$reponse=db_connect('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="vente" AND MISSION_ID='.$ID_mission);
		
		foreach ($reponse as $val){
			$complexite = $val['COMPLEXITE'];
			if($complexite=="s"){$complexite="Simple";}
			else if($complexite=="c"){$complexite="Complexe";}
			else if($complexite=="t"){$complexite="Tres complexe";}
		}

		$document->setValue("Value2",$complexite);

		$complexite="";
		$reponse=db_connect('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="tresorerie" AND MISSION_ID='.$ID_mission);
		
		foreach ($reponse as $val){
			$complexite = $val['COMPLEXITE'];
			if($complexite=="s"){$complexite="Simple";}
			else if($complexite=="c"){$complexite="Complexe";}
			else if($complexite=="t"){$complexite="Tres complexe";}
		}

		$document->setValue("Value3",$complexite);

		$complexite="";
		$reponse=db_connect('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="comptabilite" AND MISSION_ID='.$ID_mission);
		
		foreach ($reponse as $val){
			$complexite = $val['COMPLEXITE'];
			if($complexite=="s"){$complexite="Simple";}
			else if($complexite=="c"){$complexite="Complexe";}
			else if($complexite=="t"){$complexite="Tres complexe";}
		}

		$document->setValue("Value4",$complexite);

		$complexite="";
		$reponse=db_connect('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="paie" AND MISSION_ID='.$ID_mission);
		
		foreach ($reponse as $val){
			$complexite = $val['COMPLEXITE'];
			if($complexite=="s"){$complexite="Simple";}
			else if($complexite=="c"){$complexite="Complexe";}
			else if($complexite=="t"){$complexite="Tres complexe";}
		}

		$document->setValue("Value5",$complexite);

		$complexite="";
		$reponse=db_connect('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="vente" AND MISSION_ID='.$ID_mission);
		
			foreach ($reponse as $val){
			$complexite = $val['COMPLEXITE'];
			if($complexite=="s"){$complexite="Simple";}
			else if($complexite=="c"){$complexite="Complexe";}
			else if($complexite=="t"){$complexite="Tres complexe";}
		}

		$document->setValue("Value6",$complexite);
	}
?>
