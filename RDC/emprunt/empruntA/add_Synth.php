<?php

@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$synthese=$_POST['synthese'];
$conclusion=$_POST['conclusion'];
$mission_id=$_POST['mission_id'];

//It is the test the data in the tab_rdc if the data is exist
$rep0=$bdd->query('select SYNTHESE_ID_RA from tab_synthese_ra where SYNTHESE_OBJECTIF="emprunt" AND MISSION_ID='.$mission_id);
$donnees0=$rep0->fetch();
//get the rdc_id in the tab_rdc
$rdc_id=$donnees0['SYNTHESE_ID_RA'];
//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
if($rdc_id==0){
	$req='insert into tab_synthese_ra(SYNTHESE, SYNTHESE_OBJECTIF, MISSION_ID,UTIL_ID) values ("'.$synthese.'","emprunt","'.$mission_id.'",'.$UTIL_ID.')';
	$rep=$bdd->exec($req);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
else{
	$req1='update tab_synthese_ra set UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'", SYNTHESE_OBJECTIF="emprunt" where MISSION_ID="'.$mission_id.'" AND SYNTHESE_ID_RA='.$rdc_id;
	$rep1=$bdd->exec($req1);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
}

?>