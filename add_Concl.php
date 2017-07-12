<?php
	include '../../../connexion.php';

	$conclusion=$_POST['conclusion'];
	$mission_id=$_POST['mission_id'];
	
	//CONCLUSION
	$rep1=$bdd->query('select CONCLUSION_RA_ID from tab_conclusion_ra where CONCLUSION_OBJECTIF="emprunt" AND MISSION_ID='.$mission_id);
	$donnees1=$rep1->fetch();
	//get the rdc_id in the tab_rdc
	$rdc_id1=$donnees1['CONCLUSION_RA_ID'];
	//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
	if($rdc_id1==0){
		$req='insert into tab_conclusion_ra(CONCLUSION, CONCLUSION_OBJECTIF, MISSION_ID) values ("'.$conclusion.'","emprunt","'.$mission_id.'")';
		$rep=$bdd->exec($req);
		$fp= fopen('../../../fichier/save_mission/mission.sql',"a+");
			fwrite($fp, $req.";");
			fclose($fp);
	}
	else{
		$req1='update tab_conclusion_ra set CONCLUSION="'.$conclusion.'", CONCLUSION_OBJECTIF="emprunt" where CONCLUSION_RA_ID='.$rdc_id1;
		$rep=$bdd->exec($req1);
		echo 'update';
		$fp= fopen('../../../fichier/save_mission/mission.sql',"a+");
			fwrite($fp, $req1.";");
			fclose($fp);
	}

?>