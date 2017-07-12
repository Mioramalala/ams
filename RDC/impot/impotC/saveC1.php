<?php
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
	$redaction = $_POST['redaction'];
	$name = $_POST['nomFichier'];

	$req=$bdd->query("SELECT * FROM tab_reslt_fiscal WHERE MISSION_ID='".$_SESSION['idMission']."'");
	$rowCount = $req->rowCount();
		
		$sqlreq="";
	if( $rowCount == 0 )
	{
		$sqlreq="INSERT INTO tab_reslt_fiscal (REDACTION, NOM_FICHIER, MISSION_ID,UTIL_ID) VALUES ('$redaction','$name','".$_SESSION['idMission']."','$UTIL_ID')";
		$reqSyn=$bdd->exec($sqlreq);
		
		//$reqSyn00="INSERT INTO tab_reslt_fiscal ( REDACTION, NOM_FICHIER, MISSION_ID,UTIL_ID) VALUES ('".$redaction."',".$_SESSION['idMission'].",'".$name."',".$UTIL_ID.")";
		
		//$file = '../../../fichier/save_mission/mission.sql';
		//file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
	}
	else{
			$sqlreq="UPDATE tab_reslt_fiscal SET UTIL_ID = '$UTIL_ID',REDACTION='$redaction',NOM_FICHIER='$name' WHERE MISSION_ID='".$_SESSION['idMission']."'";
			$update=$bdd->exec($sqlreq);
		
		//$update1='UPDATE tab_reslt_fiscal SET UTIL_ID = "'.$UTIL_ID.'",REDACTION="'.$redaction.'", NOM_FICHIER="'.$name.'" WHERE MISSION_ID='.$_SESSION['idMission'];
		
		
	}

	$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, 	$sqlreq.";", FILE_APPEND | LOCK_EX);
?>