<?php
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
	//data:data:{total:total,compta:compta,ecart:ecrat,id:id}
	$total = $_POST['total'];
	$compta = $_POST['compta'];
	$ecart = $_POST['ecart'];
	$id = $_POST['id'];

	$req=$bdd->query("SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = '".$id."' AND MISSION_ID='".$_SESSION['idMission']."'");
	$rowCount = $req->rowCount();

	if( $rowCount == 0 ){
		$reqSyn=$bdd->exec("INSERT INTO  tab_cadrage_salaire ( TOTAL, COMPTA, ECART, IDENTIFIANT, MISSION_ID,UTIL_ID) VALUES ('".$total."','".$compta."','".$ecart."',".$id.",".$_SESSION['idMission'].",".$UTIL_ID.")");
		
		$reqSyn00="INSERT INTO  tab_cadrage_salaire ( TOTAL, COMPTA, ECART, IDENTIFIANT, MISSION_ID,UTIL_ID) VALUES ('".$total."','".$compta."','".$ecart."',".$id.",".$_SESSION['idMission'].",".$UTIL_ID.")";
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
	}
	else{
		$reqSyn1=$bdd->exec(' UPDATE tab_cadrage_salaire SET UTIL_ID = "'.$UTIL_ID.'",TOTAL="'.$total.'", COMPTA="'.$compta.'", ECART="'.$ecart.'" WHERE  IDENTIFIANT = "'.$id.'" AND MISSION_ID='.$_SESSION['idMission']);
		
		$reqSyn11=' UPDATE tab_cadrage_salaire SET UTIL_ID = "'.$UTIL_ID.'",TOTAL="'.$total.'", COMPTA="'.$compta.'", ECART="'.$ecart.'" WHERE  IDENTIFIANT = "'.$id.'" AND MISSION_ID='.$_SESSION['idMission'];
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
		
	}
?>