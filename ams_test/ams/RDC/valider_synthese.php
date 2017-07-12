<?php
@session_start();
include '../connexion.php';

$UTIL_ID             = $_SESSION['id'];
$mission_id          = $_POST['mission_id'];
$synthese            = $_POST['synthese'];
$synthese_cycle_rdc  = $_POST['synthese_cycle_rdc'];

$sql     = "select SYNTHESE_ID_RDC from tab_validation_synthese_rdc where MISSION_ID = :mission_id AND SYNTHESE_CYCLE_RDC = :synthese_cycle_rdc";
$reponse = $bdd->prepare($sql);

$reponse->execute(array(
	'mission_id'         => $mission_id,
	'synthese_cycle_rdc' => $synthese_cycle_rdc
));

if($donnees = $reponse->fetch()) {
	$sql = "update tab_validation_synthese_rdc set UTIL_ID = :util_id,	SYNTHESE_RDC = :synthese where MISSION_ID = :mission_id AND SYNTHESE_ID_RDC = :synthese_id_rdc";
	$reponse2 = $bdd->prepare($sql);

	$reponse2->execute(array(
		'util_id'         => $UTIL_ID,
		'synthese'        => $synthese,
		'mission_id'      => $mission_id,
		'synthese_id_rdc' => $donnees0['SYNTHESE_ID_RDC']
	));

} else {

	$sql = "INSERT INTO tab_validation_synthese_rdc(SYNTHESE_RDC, SYNTHESE_CYCLE_RDC, MISSION_ID, UTIL_ID) VALUES(:synthese, :synthese_cycle_rdc, :mission_id, :util_id)";
	$reponse2 = $bdd->prepare($sql);

	$reponse2->execute(array(
		'synthese'           => $synthese,
		'synthese_cycle_rdc' => $synthese_cycle_rdc,
		'mission_id'         => $mission_id,
		'util_id'            => $UTIL_ID
	));

}
/*
$reponse0=$bdd->query('select SYNTHESE_ID_RDC from tab_validation_synthese_rdc where MISSION_ID='.$mission_id.' AND SYNTHESE_CYCLE_RDC="tresorerie"');

$donnees0=$reponse0->fetch();

if($donnees0['SYNTHESE_ID_RDC']!=0){
	$reponse1=$bdd->exec('update tab_validation_synthese_rdc set UTIL_ID = "'.$UTIL_ID.'",	SYNTHESE_RDC="'.$synthese.'" where MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RDC='.$donnees0['SYNTHESE_ID_RDC']);
	if(!$reponse1) echo  'update tab_validation_synthese_rdc set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE_RDC="'.$synthese.'" where MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RDC='.$donnees0['SYNTHESE_ID_RDC'];
}
else{
	$reponse=$bdd->exec('INSERT INTO tab_validation_synthese_rdc(SYNTHESE_RDC,SYNTHESE_CYCLE_RDC,MISSION_ID,UTIL_ID) VALUE 
	("'.$synthese.'","tresorerie","'.$mission_id.'","'.$UTIL_ID.'")');
}

$req='INSERT INTO tab_validation_synthese_rdc(SYNTHESE_RDC,SYNTHESE_CYCLE_RDC,MISSION_ID,UTIL_ID) VALUE 
("'.$synthese.'","tresorerie","'.$mission_id.'","'.$UTIL_ID.'")';
$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

$req2='update tab_validation_synthese_rdc set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE_RDC="'.$synthese_charge.'" where
	MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RDC='.$donnees0['SYNTHESE_ID_RDC'];
$file = '../../fichier/save_mission/mission.sql';

file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
*/
?>