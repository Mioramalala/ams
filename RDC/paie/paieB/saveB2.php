<?php 
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];

	$date = $_POST['date'];
	$police = $_POST['police'];
	$nature = $_POST['nature'];
	$montant = $_POST['montant'];
	$comment = $_POST['comment'];
	$fichier = $_POST['name'];

	/*if(isset($date) && isset($police) && isset($nature) && isset($montant) && isset($comment) ){*/

		$req=$bdd->query("SELECT * FROM tab_recapassurance WHERE RAS_DATE = '".$date."' AND MISSION_ID='".$_SESSION['idMission']."'");
		$rowCount = $req->rowCount();
		
		if( $rowCount == 0 ){
			$reqSyn=$bdd->exec("INSERT INTO  tab_recapassurance ( RAS_DATE, RAS_POLICE,RAS_NATURE,RAS_MONTANT,RAS_FILE_NAME,RAS_CMT, MISSION_ID,UTIL_ID) VALUES ('".$date."','".$police."','".$nature."','".$montant."','".$fichier."','".$comment."',".$_SESSION['idMission'].",".$UTIL_ID.")");
			
			$reqSyn00="INSERT INTO  tab_recapassurance ( RAS_DATE, RAS_POLICE,RAS_NATURE,RAS_MONTANT,RAS_FILE_NAME,RAS_CMT, MISSION_ID,UTIL_ID) VALUES ('".$date."','".$police."','".$nature."','".$montant."','".$fichier."','".$comment."',".$_SESSION['idMission'].",".$UTIL_ID.")";
			
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
		}
		else{
			$reqSyn1=$bdd->exec('UPDATE tab_recapassurance SET UTIL_ID = "'.$UTIL_ID.'",RAS_FILE_NAME = "'.$fichier.'", RAS_POLICE="'.$police.'", RAS_NATURE="'.$nature.'", RAS_MONTANT="'.$montant.'", RAS_CMT="'.$comment.'" WHERE RAS_DATE = "'.$date.'" AND MISSION_ID='.$_SESSION['idMission']);
			
			$reqSyn11='UPDATE tab_recapassurance SET UTIL_ID = "'.$UTIL_ID.'",RAS_FILE_NAME = "'.$fichier.'", RAS_POLICE="'.$police.'", RAS_NATURE="'.$nature.'", RAS_MONTANT="'.$montant.'", RAS_CMT="'.$comment.'" WHERE RAS_DATE = "'.$date.'" AND MISSION_ID='.$_SESSION['idMission'];
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
		}
	/*}*/
?>