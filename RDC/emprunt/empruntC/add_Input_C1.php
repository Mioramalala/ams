<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$compte=$_POST['compte'];
$soldeDev=$_POST['soldeDev'];
$devise=$_POST['devise'];
$cloture=$_POST['cloture'];
$soldeReeval=$_POST['soldeReeval'];
$soldeComp=$_POST['soldeComp'];
$difference=$_POST['difference'];
$observation=$_POST['observation'];
$mission_id=$_POST['mission_id'];

//It is the test the data in the tab_rdc if the data is exist
$rep0=$bdd->query('SELECT * FROM tab_reeval_emprunt WHERE COMPTE='.$compte.' AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();

//get the obs_id in the tab_rdc
$obs_id=$donnees0['ID'];
echo $obs_id;

//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
if($obs_id==0){
	$req='INSERT into tab_reeval_emprunt(COMPTE, SOLDE_DEV, DEVISE, CLOTURE ,SOLDE_REEVAL,SOLDE_COMP, OBSERVATION, MISSION_ID,UTIL_ID) VALUES ("'.$compte.'","'.$soldeDev.'","'.$devise.'","'.$cloture.'","'.$soldeReeval.'","'.$soldeComp.'","'.$observation.'",'.$mission_id.','.$UTIL_ID.')';
	$rep=$bdd->exec($req);

	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	echo 'insert';
}
else{
	$req1='UPDATE tab_reeval_emprunt SET UTIL_ID = '.$UTIL_ID.',COMPTE="'.$compte.'", SOLDE_DEV="'.$soldeDev.'", DEVISE="'.$devise.'",CLOTURE="'.$cloture.'",SOLDE_REEVAL="'.$soldeReeval.'", SOLDE_COMP="'.$soldeComp.'", OBSERVATION="'.$observation.'" WHERE MISSION_ID='.$mission_id;
	$rep1=$bdd->exec($req1);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);

	echo $obs_id;
}

?>