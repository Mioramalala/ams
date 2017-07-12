<?php
	@session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
//{'compte':numCompte,'libelle':numLibelle,'obs':obs}
	$compte = $_POST['compte'];
	$libelle = $_POST['libelle'];
	$obs = $_POST['obs'];

	$req=$bdd->query(' SELECT  * FROM tab_F6 WHERE COMPTE="'.$compte.'" AND LIBELLE = "'.$libelle.'" AND MISSION_ID="'.$_SESSION['idMission'].'" ');
	$ligne = $req->rowCount();

	if( $ligne != 0 ){
		$requete1=' UPDATE tab_F6 SET UTIL_ID = "'.$UTIL_ID.'",OBS ="'.$obs.'" WHERE COMPTE = "'.$compte.'" AND LIBELLE = "'.$libelle.'" AND MISSION_ID="'.$_SESSION['idMission'].'" ';
		$update=$bdd->exec($requete1);
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $requete1.";", FILE_APPEND | LOCK_EX);
		
	}
	else{
		$req2=$bdd->query(' SELECT  * FROM tab_F6 WHERE COMPTE="'.$compte.'" AND LIBELLE = "'.$libelle.'" AND MISSION_ID="" ');
		$donnees = $req2->fetch();
		
		$requete2='INSERT INTO  tab_F6 ( COMPTE, DATY, JOURNAL, REFERENCE, LIBELLE, DEBIT, CREDIT, POINTAGE, REGULARITE_PJ, OBSERVATION, MISSION_ID,UTIL_ID) VALUES ("'.$compte.'","'.$donnees['DATY'].'","'.$donnees['JOURNAL'].'","'.$donnees['REFERENCE'].'","'.$libelle.'","'.$donnees['DEBIT'].'","'.$donnees['CREDIT'].'","'.$donnees['POINTAGE'].'","'.$donnees['REGULARITE_PJ'].'","'.$obs.'",'.$_SESSION['idMission'].','.$UTIL_ID.') ';
		$reqSyn=$bdd->exec($requete2);
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $requete2.";", FILE_APPEND | LOCK_EX);
		
	}

?>