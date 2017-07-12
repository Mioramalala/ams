<?php
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
//data:{irsa:irsa,cnaps:cnaps,ecart:ecart,cmt:cmt},
	$irsa = $_POST['irsa'];
	$cnaps = $_POST['cnaps'];
	$ecart = $_POST['ecart'];
	$cmt = $_POST['cmt'];

	$req=$bdd->query("SELECT * FROM tab_rap_irsa_cnaps WHERE MISSION_ID='".$_SESSION['idMission']."'");
	$rowCount = $req->rowCount();

	if($rowCount == 0){
		$reqSyn=$bdd->exec("INSERT INTO  tab_rap_irsa_cnaps ( IRSA, CNAPS, ECART, CMT, MISSION_ID,UTIL_ID) VALUES ('".$irsa."','".$cnaps."','".$ecart."','".$cmt."',".$_SESSION['idMission'].",".$UTIL_ID.")");
		
		$reqSyn00="INSERT INTO  tab_rap_irsa_cnaps ( IRSA, CNAPS, ECART, CMT, MISSION_ID,UTIL_ID) VALUES ('".$irsa."','".$cnaps."','".$ecart."','".$cmt."',".$_SESSION['idMission'].",".$UTIL_ID.")";
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
	}
	else{
		$reqSyn1=$bdd->exec(' UPDATE tab_rap_irsa_cnaps SET UTIL_ID = "'.$UTIL_ID.'",IRSA ="'.$irsa.'", CNAPS="'.$cnaps.'", ECART="'.$ecart.'", CMT="'.$cmt.'" WHERE MISSION_ID='.$_SESSION['idMission']);
		
		$reqSyn11=' UPDATE tab_rap_irsa_cnaps SET UTIL_ID = "'.$UTIL_ID.'",IRSA ="'.$irsa.'", CNAPS="'.$cnaps.'", ECART="'.$ecart.'", CMT="'.$cmt.'" WHERE MISSION_ID='.$_SESSION['idMission'];
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
	}
?>