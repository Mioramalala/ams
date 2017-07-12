<?php
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	//data:{periode:periode,nbr:nbr,avt:avt,salaires:salaires,salairesT:salairesT,totalD:totalD,irsa:irsa,persT:persT},
	$periode = $_POST['periode'];
	$nbr = $_POST['nbr'];
	$avt = $_POST['avt'];
	$salaire = $_POST['salaire'];
	$salaireT= $_POST['salaireT'];
	$totalD = $_POST['totalD'];
	$irsa = $_POST['irsa'];
	$persT = $_POST['persT'];

	if( !empty($periode) ){

		$req=$bdd->query("SELECT * FROM tab_cad_salaire_irsa WHERE PERIODE = '".$periode."' AND MISSION_ID=".$_SESSION['idMission']);
		$rowCount = $req->rowCount();

		if( $rowCount == 0 ){
			$reqSyn=$bdd->exec("INSERT INTO  tab_cad_salaire_irsa 
				(PERIODE, 
				NBR_PRS, 
				AVANTAGE_NATURE, 
				SALAIRE_BRUT, 
				SALAIRE_TEMP, 
				TOTAL_DECLARE, 
				IRSA, 
				PRS_TEMP, 
				MISSION_ID,
				UTIL_ID) VALUES 
				('".$periode."',
				".$nbr.",
				".$avt.",
				".$salaire.",
				".$salaireT.",
				".$totalD.",
				".$irsa.",
				".$persT.",
				".$_SESSION['idMission'].",
				".$UTIL_ID.")");
			
			$reqSyn00="INSERT INTO  tab_cad_salaire_irsa (PERIODE, NBR_PRS, AVANTAGE_NATURE, SALAIRE_BRUT, SALAIRE_TEMP, TOTAL_DECLARE, IRSA, PRS_TEMP, MISSION_ID,UTIL_ID) VALUES ('".$periode."',".$nbr.",".$avt.",".$salaire.",".$salaireT.",".$totalD.",".$irsa.",".$persT.",".$_SESSION['idMission'].",".$UTIL_ID.")";
		
         

			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
		}
		else
		{
			$reqSyn1=$bdd->exec("UPDATE tab_cad_salaire_irsa SET UTIL_ID =".$UTIL_ID.",NBR_PRS=".$nbr.", AVANTAGE_NATURE=".$avt.", SALAIRE_BRUT=".$salaire.", SALAIRE_TEMP=".$salaireT.", TOTAL_DECLARE=".$totalD.", IRSA=".$irsa.", PRS_TEMP=".$persT."  WHERE PERIODE = '".$periode."' AND MISSION_ID=".$_SESSION['idMission']);
			
			$reqSyn11=' UPDATE tab_cad_salaire_irsa SET UTIL_ID = '.$UTIL_ID.',NBR_PRS='.$nbr.', AVANTAGE_NATURE='.$avt.', SALAIRE_BRUT='.$salaire.', SALAIRE_TEMP='.$salaireT.', TOTAL_DECLARE='.$totalD.', IRSA='.$irsa.', PRS_TEMP='.$persT.'  WHERE PERIODE = "'.$periode.'" AND MISSION_ID='.$_SESSION['idMission'];
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
		}
	}


?>