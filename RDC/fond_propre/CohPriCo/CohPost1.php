<?php
	session_start ();
	include '../../../connexion.php';
	$UTIL_ID = $_SESSION['id'];
	
	/////////////////////////////////////////////   kestion 1   //////////////////////////////////////////

	$RDC_CYCLE       = "Fond propre";
	$RDC_COMMENTAIRE = $_POST["cmt1"];
	$RDC_REPONSE     = $_POST["rep1"];
	$RDC_OBJECTIF    = "A";
	$RDC_RANG        = "1";
	$MISSION_ID      = $_SESSION['idMission'];

	$reqInsert       = $bdd->exec("INSERT INTO  tab_rdc (RDC_CYCLE, RDC_COMMENTAIRE, RDC_REPONSE, RDC_OBJECTIF, RDC_RANG, MISSION_ID,UTIL_ID) VALUE ('".$RDC_CYCLE."','".$RDC_COMMENTAIRE."','".$RDC_REPONSE."','".$RDC_OBJECTIF."',".$RDC_RANG.",".$MISSION_ID.",".$UTIL_ID.")");
	$req             = "INSERT INTO  tab_rdc (RDC_CYCLE, RDC_COMMENTAIRE, RDC_REPONSE, RDC_OBJECTIF, RDC_RANG, MISSION_ID,UTIL_ID) VALUE ('".$RDC_CYCLE."','".$RDC_COMMENTAIRE."','".$RDC_REPONSE."','".$RDC_OBJECTIF."',".$RDC_RANG.",".$MISSION_ID.",".$UTIL_ID.")";
	$file            = '../../../fichier/save_mission/mission.sql';
	

/*See "Suvit global" for the reason of this remove*/
	// file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
		
/////////////////////////////////////////////   kestion 2   //////////////////////////////////////////

	$RDC_CYCLE       = "Fond propre";
	$RDC_COMMENTAIRE = $_POST["cmt2"];
	$RDC_REPONSE     = $_POST["rep2"];
	$RDC_OBJECTIF    = "A";
	$RDC_RANG        = "2";
	$MISSION_ID      = $_SESSION['idMission'];
	
	
	$reqInsert1      = $bdd->exec("INSERT INTO  tab_rdc (RDC_CYCLE, RDC_COMMENTAIRE, RDC_REPONSE, RDC_OBJECTIF, RDC_RANG, MISSION_ID,UTIL_ID) VALUE ('".$RDC_CYCLE."','".$RDC_COMMENTAIRE."','".$RDC_REPONSE."','".$RDC_OBJECTIF."',".$RDC_RANG.",".$MISSION_ID.",".$UTIL_ID.")");
	$req1            = "INSERT INTO  tab_rdc (RDC_CYCLE, RDC_COMMENTAIRE, RDC_REPONSE, RDC_OBJECTIF, RDC_RANG, MISSION_ID,UTIL_ID) VALUE ('".$RDC_CYCLE."','".$RDC_COMMENTAIRE."','".$RDC_REPONSE."','".$RDC_OBJECTIF."',".$RDC_RANG.",".$MISSION_ID.",".$UTIL_ID.")";
	$file            = '../../../fichier/save_mission/mission.sql';
	

/*See "Suvit global" for the reason of this remove*/
	// file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

?>