<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$reponse=$_POST['reponse'];
$commentaire=$_POST['commentaire'];
$cycle=$_POST['cycle'];
$objectif=$_POST['objectif'];
$rang=$_POST['rang'];
$mission_id=$_POST['mission_id'];

//It is the test the data in the tab_rdc if the data is exist
$req='select RDC_ID from tab_rdc where RDC_CYCLE="'.$cycle.'" and RDC_OBJECTIF="'.$objectif.'" and RDC_RANG='.$rang.' and MISSION_ID='.$mission_id;
$rep0=$bdd->query($req);
/*$fp= fopen('../../../fichier/save_mission/mission.sql',"a+");
			fwrite($fp, $req.";");
			fclose($fp);
*/
$donnees0=$rep0->fetch();

//get the rdc_id in the tab_rdc
$rdc_id=$donnees0['RDC_ID'];

//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
if($rdc_id==0){
	$req1='insert into tab_rdc(RDC_CYCLE, RDC_COMMENTAIRE, RDC_REPONSE, RDC_OBJECTIF, RDC_RANG, MISSION_ID,UTIL_ID) value ("'.$cycle.'","'.$commentaire.'","'.$reponse.'","'.$objectif.'",'.$rang.','.$mission_id.','.$UTIL_ID.')';
	$rep=$bdd->exec($req1);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
}
else{
	$req2='update tab_rdc set UTIL_ID = "'.$UTIL_ID.'",RDC_COMMENTAIRE="'.$commentaire.'", RDC_REPONSE="'.$reponse.'" where MISSION_ID="'.$mission_id.'" AND RDC_ID='.$rdc_id;
	$rep=$bdd->exec($req2);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
}



?>