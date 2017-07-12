<?php 
	session_start();
	include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];
if(isset($_POST['compte']) && isset($_POST['libelle']) && isset($_POST['montant']) && isset($_POST['budget']) &&isset($_POST['ecart']) && isset($_POST['cmt']) ){
	

	$compte = $_POST['compte'];
	$libelle =  $_POST['libelle'];
	$montant = $_POST['montant'];
	$budget = $_POST['budget'];
	$ecart = $_POST['ecart'];
	$cmt = $_POST['cmt'];

	$req=$bdd->query("SELECT * FROM tab_rap_person_budget WHERE RAP_COMPTE = '".$compte."' AND MISSION_ID=".$_SESSION['idMission']."");
	$rowCount = $req->rowCount();
	
	if( $rowCount == 0 ){
		$reqSyn=$bdd->exec("INSERT INTO tab_rap_person_budget (RAP_COMPTE, RAP_LIBELLE, RAP_MONTANT, RAP_BUDGET, RAP_ECART, RAP_COMMENTAIRE, MISSION_ID,UTIL_ID) VALUES (".$compte.",.'".$libelle."',".$montant.",".$budget.",".$ecart.",'".$cmt."',".$_SESSION['idMission'].",".$UTIL_ID.")");
		
		$reqSyn00="INSERT INTO tab_rap_person_budget (RAP_COMPTE, RAP_LIBELLE, RAP_MONTANT, RAP_BUDGET, RAP_ECART, RAP_COMMENTAIRE, MISSION_ID,UTIL_ID) VALUES (".$compte.",.'".$libelle."',".$montant.",".$budget.",".$ecart.",'".$cmt."',".$_SESSION['idMission'].",".$UTIL_ID.")";
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
	}
	else{
		$reqSyn1=$bdd->exec('UPDATE tab_rap_person_budget SET UTIL_ID = '.$UTIL_ID.',RAP_LIBELLE="'.$libelle.'", RAP_MONTANT='.$montant.', RAP_BUDGET='.$budget.', RAP_ECART='.$ecart.', RAP_COMMENTAIRE="'.$cmt.'" WHERE RAP_COMPTE = '.$compte.' AND MISSION_ID='.$_SESSION['idMission']);
		
		$reqSyn11='UPDATE tab_rap_person_budget SET UTIL_ID = '.$UTIL_ID.',RAP_LIBELLE="'.$libelle.'", RAP_MONTANT='.$montant.', RAP_BUDGET='.$budget.', RAP_ECART='.$ecart.', RAP_COMMENTAIRE="'.$cmt.'" WHERE RAP_COMPTE ='.$compte.' AND MISSION_ID='.$_SESSION['idMission'];
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
	}
}


if(isset($_POST['id']) && isset($_POST['budget']) && isset($_POST['ecart']) && isset($_POST['commentaire'])){
	  $id=$_POST['id'];
	  $budget=$_POST['budget'];
	  $ecart=$_POST['ecart'];
	  $commentaire=$_POST['commentaire'];

	  //$req1=$bdd->query("SELECT * FROM tab_importer WHERE IMPORT_ID=".$id);
	  
	  $req2=$bdd->query("UPDATE tab_importer SET IMPORT_BUDGET=".$budget.", IMPORT_ECART=".$ecart.", IMPORT_COMMENTAIRE='".$commentaire."' WHERE IMPORT_ID=".$id);
	  echo "donnee : ".$id." - ".$budget." - ".$ecart." - ".$commentaire;
} 
?>