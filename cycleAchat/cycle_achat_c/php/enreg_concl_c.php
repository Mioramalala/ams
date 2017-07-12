<?php

include '../../../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
	$UTIL_ID=$_SESSION['id'];
	
	$commentaire=utf8_decode($_POST['commentaire']);
	$risque=utf8_decode($_POST['risque']);
	$cycleId=$_POST['cycleAchatId'];

$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID="'.$cycleId.'" AND MISSION_ID='.$mission_id;
$verif=$bdd->query($sql);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];

	if ($nombre_resultat == 1) {
		$req='UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE="'.$commentaire.'", CONCLUSION_RISQUE="'.$risque.'",UTIL_ID="'.$UTIL_ID.'" WHERE CYCLE_ACHAT_ID="'.$cycleId.'" AND MISSION_ID='.$mission_id;
		$reponse2 = $bdd->exec($req);
	}
	else{
		$sql='INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'","'.$mission_id.'","'.$cycleId.'","'.$UTIL_ID.'")';
		$req=$bdd->exec($sql);
	}

?>