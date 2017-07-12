<?php
	@session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
//{'compte':numCompte,'libelle':numLibelle,'obs':obs}
	$compte = $_POST['compte'];
	$libelle = $_POST['libelle'];
	$date=$_POST['date'];
	$journal=$_POST['journal'];
	$reference=$_POST['reference'];
	$debit=$_POST['debit'];
	$credit=$_POST['credit'];
	$solde=$_POST['solde'];
	$pointage=$_POST['pointage'];
	$regularite=$_POST['regularite'];
	$bc=$_POST['bc'];
	$bl=$_POST['bl'];
	$observation=$_POST['observation'];
	$renvoi=$_POST['renvoi'];



		//$requete1=;
		$update=$bdd->exec(' UPDATE tab_F6 SET 
		POINTAGE= "'.$pointage.'",
		REGULARITE_PJ ="'.$regularite.'",
		BC ="'.$bc.'",
		BL ="'.$bl.'",
		OBSERVATION ="'.$observation.'",
		RENVOI ="'.$renvoi.'"
		WHERE COMPTE = "'.$compte.'" 
		AND LIBELLE = "'.$libelle.'" 
		AND SOLDE = "'.$solde.'"
		AND MISSION_ID="'.$_SESSION['idMission'].'" ');
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $requete1.";", FILE_APPEND | LOCK_EX);
		
	
		/*$req2=$bdd->query(' SELECT  * FROM tab_F6 WHERE COMPTE="'.$compte.'" AND LIBELLE = "'.$libelle.'" AND MISSION_ID="" ');
		$donnees = $req2->fetch();
		
		$requete2='INSERT INTO  tab_F6 ( 
			COMPTE, 
			DATY, 
			JOURNAL, 
			REFERENCE, 
			LIBELLE, 
			DEBIT, 
			CREDIT, 
			POINTAGE, 
			REGULARITE_PJ, 
			OBSERVATION, 
			MISSION_ID,
			UTIL_ID) 
		VALUES ("'.$compte.'",
			"'.$date.'",
			"'.$journal.'",
			"'.$reference.'",
			"'.$libelle.'",
			"'.$debit.'",
			"'.$credit.'",
			"'.$pointage.'",
			"'.$regularite.'",
			"'.$observation.'",
			'.$_SESSION['idMission'].',
			'.$UTIL_ID.') ';
		$reqSyn=$bdd->exec($requete2);
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $requete2.";", FILE_APPEND | LOCK_EX);
		
	}*/

?>