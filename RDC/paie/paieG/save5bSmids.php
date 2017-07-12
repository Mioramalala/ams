<?php
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
	
//data:{periode:periode,snp:snp,pe1:pe1,pe5:pe5,total:total}
	$periode = $_POST['periode'];
	$snp = $_POST['snp'];
	$pe1 = $_POST['pe1'];
	$pe5 = $_POST['pe5'];
	$total = $_POST['total'];

	$req=$bdd->query("SELECT * FROM tab_cad_salaire_smids WHERE PERIODE = '".$periode."' AND MISSION_ID=".$_SESSION['idMission']);
	$rowCount = $req->rowCount();

	if($rowCount == 0){
		$reqSyn=$bdd->exec("INSERT INTO  tab_cad_salaire_smids ( PERIODE, SNP, PE1, PE5, TOTAL, MISSION_ID,UTIL_ID) VALUES ('".$periode."',".$snp.",".$pe1.",".$pe5.",".$total.",".$_SESSION['idMission'].",".$UTIL_ID.")");
		
		$reqSyn00="INSERT INTO  tab_cad_salaire_smids ( PERIODE, SNP, PE1, PE5, TOTAL, MISSION_ID,UTIL_ID) VALUES ('".$periode."',".$snp.",".$pe1.",".$pe5.",".$total.",".$_SESSION['idMission'].",".$UTIL_ID.")";
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
	}
	else{
		$reqSyn1=$bdd->exec(' UPDATE tab_cad_salaire_smids SET UTIL_ID = '.$UTIL_ID.',SNP ='.$snp.', PE1='.$pe1.', PE5='.$pe5.', TOTAL='.$total.' WHERE PERIODE = "'.$periode.'" AND MISSION_ID='.$_SESSION["idMission"]);
		
		$reqSyn11=' UPDATE tab_cad_salaire_smids SET UTIL_ID = '.$UTIL_ID.',SNP ='.$snp.', PE1='.$pe1.', PE5='.$pe5.', TOTAL='.$total.' WHERE PERIODE = "'.$periode.'" AND MISSION_ID='.$_SESSION['idMission'];
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
	}
?>