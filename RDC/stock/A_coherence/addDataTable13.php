<?php
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 include '../../../connexion.php';
 $UTIL_ID=$_SESSION['id'];

$mission_id=$_POST['mission_id'];

$stock_initial = $_POST["stock_initial"];
$stock_final = $_POST["stock_final"];
$variation = $_POST["variation"];
$solde = $_POST["solde"];
$ecart = $_POST["ecart"];

$req = "INSERT INTO tab_st_d13 (STOCK_INITIAL, STOCK_FINAL, VARIATION, SOLDE, ECART, MISSION_ID)
		VALUES ('".$stock_initial."', '".$stock_final."', '".$variation."', '".$solde."', '".$ecart."', ".$mission_id.")
		ON DUPLICATE KEY UPDATE
		STOCK_INITIAL='".$stock_initial."',
		STOCK_FINAL='".$stock_final."',
		VARIATION='".$variation."',
		SOLDE='".$solde."',
		ECART='".$ecart."'
		";

$rep=$bdd->exec($req);

echo $req;
?>