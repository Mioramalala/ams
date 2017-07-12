<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$reponse     = $_POST['reponse'];
$commentaire = $_POST['commentaire'];
$cycle       = $_POST['cycle'];
$objectif    = $_POST['objectif'];
$rang        = $_POST['rang'];
$mission_id  = $_POST['mission_id'];

//It is the test the data in the tab_rdc if the data is exist
$rep0=$bdd->prepare('select RDC_ID from tab_rdc where RDC_CYCLE=:cycle and RDC_OBJECTIF=:objectif and RDC_RANG=:rang and MISSION_ID=:mission_id');
$rep0->execute(array(
	"cycle"      => $cycle,
	"objectif"   => $objectif,
	"rang"       => $rang,
	"mission_id" => $mission_id
));


//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
if($donnees0 = $rep0->fetch()){
	
	//get the rdc_id in the tab_rdc
	$rdc_id = $donnees0['RDC_ID'];
	$sql = 'update tab_rdc set UTIL_ID = :util_id,RDC_COMMENTAIRE=:commentaire, RDC_REPONSE=:reponse where MISSION_ID=:mission_id AND RDC_ID=:rdc_id';

	$rep1=$bdd->prepare($sql);
	$rep1->execute(array(
		"util_id"     => $UTIL_ID,
		"commentaire" => $commentaire,
		"reponse"     => $reponse,
		"mission_id"  => $mission_id,
		"rdc_id"      => $rdc_id
	));
	/*
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);
	*/
} else {
	$req = 'insert into tab_rdc(RDC_CYCLE, RDC_COMMENTAIRE, RDC_REPONSE, RDC_OBJECTIF, RDC_RANG, MISSION_ID,UTIL_ID) value (:cycle,:commentaire,:reponse,:objectif,:rang,:mission_id,:util_id)';
	$rep = $bdd->prepare($req);
	
	$rep->execute(array(
		"cycle"       => $cycle,
		"util_id"     => $UTIL_ID,
		"commentaire" => $commentaire,
		"reponse"     => $reponse,
		"objectif"    => $objectif,
		"mission_id"  => $mission_id,
		"rang"        => $rang
	));
	/*
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);*/
}

?>