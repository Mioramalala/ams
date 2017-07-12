<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$compte=$_POST['compte'];
$soldeDev=$_POST['soldeDev'];
$devise=$_POST['devise'];
$cloture=$_POST['cloture'];
$solde=$_POST['solde'];
$soldeComp=$_POST['soldeComp'];
$difference=$_POST['difference'];
$observation=$_POST['observation'];
$mission_id=$_POST['mission_id'];

//It is the test the data in the tab_rdc if the data is exist
$rep0=$bdd->query('select ID from tab_reeval_emprunt where COMPTE='.$compte.' AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();

//get the obs_id in the tab_rdc
$obs_id=$donnees0['ID'];

//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
if($obs_id==0){
	$req='insert into tab_reeval_emprunt(COMPTE, SOLDE_DEV, DEVISE, CLOTURE ,SOLDE_COMP, OBSERVATION, MISSION_ID,UTIL_ID) values ("'.$compte.'","'.$soldeDev.'","'.$devise.'","'.$cloture.'","'.$soldeComp.'","'.$observation.'",'.$mission_id.','.$UTIL_ID.')';
	$rep=$bdd->exec($req);

		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	echo 'insert';
}
else{
	$req1='update tab_reeval_emprunt set UTIL_ID = "'.$UTIL_ID.'",COMPTE="'.$compte.'", SOLDE_DEV="'.$soldeDev.'", DEVISE="'.$devise.'",CLOTURE="'.$cloture.'", SOLDE_COMP="'.$soldeComp.'", OBSERVATION="'.$observation.'" where MISSION_ID="'.$mission_id.'" AND ID='.$obs_id;
	$rep1=$bdd->exec($req1);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
	echo 'update';
}

?>