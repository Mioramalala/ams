<?php

include'../connexion.php';
session_start();

 /*************************données POST mission*********************************/
$typeM=$_POST["a"];
$AnnM=$_POST["z"];
$DebM=$_POST["r"];
$ClozM=$_POST["t"];
$entreId=$_POST["y"];
$Deadline=$_POST["u"];	
$idMission=$_POST["i"];

// Tester s'il y a déjà un mission qui a de même mission année, mission type et entreprise by Niaina
$sql = 'SELECT COUNT(*) AS NB FROM tab_mission WHERE 
	MISSION_ANNEE='.$AnnM.' AND MISSION_TYPE="'.$typeM.'" AND ENTREPRISE_ID='.$entreId.' AND MISSION_ID<>'.$idMission;
$result = $bdd->query($sql);
$columns = $result->fetch();
$nb = $columns['NB'];

// Si la mission n'existe pas, on enregistre
if ($nb == 0) {
	$reqInsertMiss=$bdd->prepare("UPDATE tab_mission 
		SET MISSION_TYPE=:mt, MISSION_ANNEE=:ma, MISSION_DATE_DEBUT=:mdd, MISSION_DATE_CLOTURE=:mdc, MISSION_DEADLINE=:md  
		WHERE MISSION_ID=:mi AND ENTREPRISE_ID=:ei");
	$reqInsertMiss->execute(array(
		'mt'=>$typeM,
		'ma'=>$AnnM,
		'mdd'=>$DebM,
		'mdc'=>$ClozM,
		'md'=>$Deadline,
		'mi'=>$idMission,
		'ei'=>$entreId
	));
	echo 1;
// Si la mission existe déjà, on envoie un avertissement
} else {
	echo 0;
}
// Fin Tester s'il y a déjà un mission qui a de même mission année, mission type et entreprise by Niaina

?>