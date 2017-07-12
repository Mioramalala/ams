<?php
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	//data:{nat:nat,na:na}
	$nat = $_POST['nat'];
	$na = $_POST['na'];

	if(!empty($nat)){
		$sql ="SELECT * FROM tab_elt_annexe WHERE NATURE = '".$nat."' AND MISSION_ID='".$_SESSION['idMission']."'";
		$req = $bdd->query($sql);
		$row = $req->rowCount();

		if($row == 0){
			$reqSyn=$bdd->exec("INSERT INTO  tab_elt_annexe (NATURE, ANNEXE, MISSION_ID,UTIL_ID) VALUES ('".$nat."','".$na."',".$_SESSION['idMission'].",".$UTIL_ID.")");
			
			$reqSyn00="INSERT INTO  tab_elt_annexe (NATURE, ANNEXE, MISSION_ID,UTIL_ID) VALUES ('".$nat."','".$na."',".$_SESSION['idMission'].",".$UTIL_ID.")";
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
		}
		else{
			$reqSyn1=$bdd->exec(' UPDATE tab_elt_annexe SET UTIL_ID = "'.$UTIL_ID.'",NATURE ="'.$nat.'", ANNEXE="'.$na.'" WHERE NATURE = "'.$nat.'" AND MISSION_ID='.$_SESSION['idMission']);
			
			$reqSyn11=' UPDATE tab_elt_annexe SET UTIL_ID = "'.$UTIL_ID.'",NATURE ="'.$nat.'", ANNEXE="'.$na.'" WHERE NATURE = "'.$nat.'" AND MISSION_ID='.$_SESSION['idMission'];
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
		}
	}
?>