<?php
session_start();
include '../../../connexion.php';

$UTIL_ID     = $_SESSION['id'];

$avis        = $_POST['avis'];
$date        = $_POST['date'];
$nature      = $_POST['nature'];
$compta      = $_POST['compta'];
$observation = $_POST['observation'];
$mission_id  = $_POST['mission_id'];
$reference   = $_POST['reference'];

//J'active un requette qui vérifie si l'identifiant du tab_rdc_tr_e2 existe

$query    = 'insert into tab_rdc_tr_e2 (avis, date,nature, compta, observation, mission_id, cpt,reference,UTIL_ID) value (:avis, :date, :nature, :compta, :observation, :mission_id,0,reference,:util_id)';
$response = $bdd->prepare($query);
$response->execute(array(
	"avis"        => $avis,
	"date"        => $date,
	"nature"      => $nature,
	"compta"      => $compta,
	"observation" => $observation,
	"mission_id"  => $mission_id,
	"reference"   => $reference,
	"util_id"     => $UTIL_ID
));


/*
$queryId='select id from tab_rdc_tr_e2 where mission_id='.$mission_id.' and cpt='.$cpt.' and reference="'.$reference.'"';
$reponseId=$bdd->query($queryId);

//Je test si l'id existe si il existe je fait la mis à jour sinon je fait l'enregistrement
if($reponseId->fetch()){
	$queryUpdate='update tab_rdc_tr_e2 set UTIL_ID = "'.$UTIL_ID.'",avis="'.$avis.'",date="'.$date.'", nature="'.$nature.'", compta="'.$compta.'", observation="'.$observation.'" WHERE cpt='.$cpt.' AND mission_id='.$mission_id.' AND reference="'.$reference.'"';
	$reponseUpdate=$bdd->exec($queryUpdate);

	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
}
else{
	$queryInsert='insert into tab_rdc_tr_e2 (avis, date,nature, compta, observation, mission_id, cpt,reference,UTIL_ID) value ("'.$avis.'","'.$date.'","'.$nature.'","'.$compta.'","'.$observation.'",'.$mission_id.','.$cpt.',"'.$reference.'",'.$UTIL_ID.')';
	$reponseInsert=$bdd->exec($queryInsert);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
}
*/
?>