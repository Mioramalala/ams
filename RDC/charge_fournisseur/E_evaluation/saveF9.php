<?php
	@session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
	$compte = $_POST['compte'];
	$obs = $_POST['obs'];

	$req=$bdd->query(' SELECT  * FROM tab_rdc_cf_f9 WHERE COMPTE="'.$compte.'" AND MISSION_ID="'.$_SESSION['idMission'].'"');
	$linge = $req->rowCount();

	if( $linge != 0 ){
		$requete0=' UPDATE tab_rdc_cf_f9 SET UTIL_ID = "'.$UTIL_ID.'",OBSERVATION ="'.$obs.'" WHERE COMPTE = "'.$compte.'" AND MISSION_ID="'.$_SESSION['idMission'].'" ';
		$update=$bdd->exec($requete0);
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $requete0.";", FILE_APPEND | LOCK_EX);
	}
	else{
		$req2=$bdd->query(' SELECT  * FROM tab_rdc_cf_f9 WHERE COMPTE="'.$compte.'" AND MISSION_ID=""');
		$donnees = $req2->fetch();
		
		$requete='INSERT INTO  tab_rdc_cf_f9 ( COMPTE, LIBELLE, SOLDE_EURO, CDC_EURO, SOLDE_CDC_MGA, SOLDE_CPBLE_MGA, ECART_MGA, ACTIF, PASSIF, OBSERVATION, FSS_ETRANGER, MISSION_ID,UTIL_ID) VALUES ("'.$compte.'","'.$donnees['LIBELLE'].'","'.$donnees['SOLDE_EURO'].'","'.$donnees['CDC_EURO'].'","'.$donnees['SOLDE_CDC_MGA'].'","'.$donnees['SOLDE_CPBLE_MGA'].'","'.$donnees['ECART_MGA'].'","'.$donnees['ACTIF'].'","'.$donnees['PASSIF'].'","'.$obs.'","'.$donnees['FSS_ETRANGER'].'",'.$_SESSION['idMission'].','.$UTIL_ID.') ';
		$reqSyn=$bdd->exec($requete);
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $requete.";", FILE_APPEND | LOCK_EX);
		
	}

?>