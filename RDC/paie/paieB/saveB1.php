<?php 
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];

	//data:{compte:ra_compte,cmt:ra_cmt,cycle:paie_personnel,objectif:'B'},
	if(isset($_POST['compte']) && isset($_POST['cmt']) && isset($_POST['cycle']) && isset($_POST['objectif'])){
		$compte=$_POST['compte'];
		$cmt=$_POST['cmt'];
		$cycle=$_POST['cycle'];
		$objectif=$_POST['objectif'];

		$req=$bdd->query("SELECT * FROM tab_observation_rdc WHERE OBS_CYCLE = 'paie_personnel' AND OBS_COMPTE = ".$compte." AND MISSION_ID=".$_SESSION['idMission']."");
		$rowCount = $req->rowCount();
		
		if( $rowCount == 0 ){
			$reqSyn=$bdd->exec("INSERT INTO  tab_observation_rdc (OBS_CYCLE, OBS_OBJECTIF,OBS_COMPTE,OBS_OBSERVATION, MISSION_ID,UTIL_ID) VALUES ('".$cycle."','".$objectif."',".$compte.",".$cmt.",".$_SESSION['idMission'].",".$UTIL_ID.")");
			
			$reqSyn00="INSERT INTO  tab_observation_rdc ( OBS_CYCLE, OBS_OBJECTIF,OBS_COMPTE,OBS_OBSERVATION, MISSION_ID,UTIL_ID) VALUES ('".$cycle."','".$objectif."',".$compte.",'".$cmt."',".$_SESSION['idMission'].",".$UTIL_ID.")";
			
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
		}
		else{
			$reqSyn1=$bdd->exec('UPDATE tab_observation_rdc SET UTIL_ID = '.$UTIL_ID.',OBS_OBSERVATION="'.$cmt.'" WHERE OBS_CYCLE = "'.$cycle.'" AND OBS_COMPTE = '.$compte.' AND OBS_OBJECTIF= "'.$objectif.'" AND MISSION_ID='.$_SESSION["idMission"]);
			
			$reqSyn11='UPDATE tab_observation_rdc SET UTIL_ID = '.$UTIL_ID.',OBS_OBSERVATION="'.$cmt.'" WHERE OBS_CYCLE = "'.$cycle.'" AND OBS_COMPTE = "'.$compte.'" AND OBS_OBJECTIF= "'.$objectif.'" AND MISSION_ID='.$_SESSION["idMission"];
			
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
		}
	}

	if(isset($_POST['observation']) && isset($_POST['ecart']) && isset($_POST['import_compte']) && isset($_POST['existOnDB'])){
		$observation=$_POST['observation'];
		$ecart=$_POST['ecart'];
		$import_compte=$_POST['import_compte'];

		$query_verif="SELECT * FROM tab_observation_rdc WHERE OBS_COMPTE=".$import_compte." AND UTIL_ID=".$UTIL_ID;

		if($bdd->query($query_verif)->rowCount()==0)
			$query_str="INSERT INTO tab_observation_rdc VALUES(0,".$import_compte.",'paie_personnel','".$observation."',".$_SESSION['idMission'].",'B',".$UTIL_ID.")";
		else
			$query_str="UPDATE tab_observation_rdc SET OBS_OBSERVATION='".$_POST['observation']."' WHERE OBS_COMPTE= ".$import_compte;

		$bdd->exec($query_str);

		echo $_POST['existOnDB']." : ".$query_str;
	}

?>