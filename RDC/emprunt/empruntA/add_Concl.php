<?php
	@session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];

	$conclusion=$_POST['conclusion'];
	$mission_id=$_POST['mission_id'];
	//CONCLUSION
	$rep1=$bdd->query('select CONCLUSION_RA_ID from tab_conclusion_ra where CONCLUSION_OBJECTIF="emprunt" AND MISSION_ID='.$mission_id);
	$donnees1=$rep1->fetch();
	//get the rdc_id in the tab_rdc
	$rdc_id1=$donnees1['CONCLUSION_RA_ID'];
	//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
	if($rdc_id1==0){
		$req='insert into tab_conclusion_ra(CONCLUSION, CONCLUSION_OBJECTIF, MISSION_ID,UTIL_ID) values ("'.$conclusion.'","emprunt","'.$mission_id.'",'.$UTIL_ID.')';
		$rep=$bdd->exec($req);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	}
	else{
		$req1='update tab_conclusion_ra set UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion.'", CONCLUSION_OBJECTIF="emprunt" where MISSION_ID="'.$mission_id.'" AND CONCLUSION_RA_ID='.$rdc_id1;
		$rep1=$bdd->exec($req1);
		echo 'update';
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
	}

?>