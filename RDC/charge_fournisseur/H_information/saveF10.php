<?php
	@session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	$nat = $_POST['nat'];
	$na = $_POST['na'];
	$cmt = $_POST['cmnt'];

	if(!empty($nat)){
		$sql ="SELECT * FROM tab_rdc_cf_f10 WHERE NATURE = '".$nat."' AND MISSION_ID='".$_SESSION['idMission']."'";
		$req = $bdd->query($sql);
		$row = $req->rowCount();

		if($row == 0){
			$requete='INSERT INTO  tab_rdc_cf_f10 ( NATURE, ANNEXE, COMMENTAIRE, MISSION_ID,UTIL_ID) VALUES ("'.$nat.'","'.$na.'","'.$cmt.'",'.$_SESSION['idMission'].','.$UTIL_ID.')';
			$reqSyn=$bdd->exec($requete);
			$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $requete.";", FILE_APPEND | LOCK_EX);
			
		}
		else{
			$req1=' UPDATE tab_rdc_cf_f10 SET UTIL_ID = "'.$UTIL_ID.'",NATURE ="'.$nat.'", ANNEXE="'.$na.'", COMMENTAIRE="'.$cmt.'" WHERE NATURE = "'.$nat.'" AND MISSION_ID="'.$_SESSION['idMission'].'" ';
			$reqSyn=$bdd->exec($req1);
			
			$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
		}
	}
?>