<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$compte=$_POST['compte'];
$apurement=$_POST['apurement'];
$justification=$_POST['justification'];
$circularisation=$_POST['circularisation'];
$observation=$_POST['observation'];
$objectif=$_POST['objectif'];
$rang=$_POST['rang'];
$mission_id=$_POST['mission_id'];

//It is the test the data in the tab_rdc if the data is exist
$rep0=$bdd->query('select DCD_ID from tab_just_apur_dcd where DCD_OBJECTIF="'.$objectif.'" and DCD_RANG='.$rang.' and DCD_MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();

//get the dcd_id in the tab_rdc
$dcd_id=$donnees0['DCD_ID'];

//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
if($dcd_id==0){
	$req='insert into tab_just_apur_dcd(DCD_COMPTE, DCD_JUSTIFICATION, DCD_CIRCULARISATION, DCD_APUREMENT_N1, DCD_OBSERVATION, DCD_OBJECTIF, DCD_RANG, DCD_MISSION_ID,UTIL_ID) values ('.$compte.',"'.$justification.'","'.$circularisation.'","'.$apurement.'","'.$observation.'","'.$objectif.'",'.$rang.','.$mission_id.','.$UTIL_ID.')';
	$rep=$bdd->exec($req);

		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
else{
	$req1='update tab_just_apur_dcd set UTIL_ID = "'.$UTIL_ID.'",DCD_JUSTIFICATION="'.$justification.'", DCD_CIRCULARISATION="'.$circularisation.'", DCD_APUREMENT_N1="'.$apurement.'", DCD_OBSERVATION="'.$observation.'" where DCD_MISSION_ID="'.$mission_id.'" AND DCD_ID='.$dcd_id;
	$rep1=$bdd->exec($req1);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
}

?>