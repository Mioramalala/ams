<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$nature=$_POST['nature'];
$note=$_POST['note'];
$ligne=$_POST['ligne'];
$mission_id=$_POST['mission_id'];

$rep0=$bdd->query('select ID from tab_elt_annexe_dcd WHERE LIGNE='.$ligne.' AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();
$dcd_id = $donnees0['ID'];

if($dcd_id==0){
	$req='insert into tab_elt_annexe_dcd(NATURE, NOTE, LIGNE, MISSION_ID,UTIL_ID) values ("'.$nature.'","'.$note.'",'.$ligne.','.$mission_id.','.$UTIL_ID.')';
	$rep=$bdd->exec($req);
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
else{
	$req1='update tab_elt_annexe_dcd set UTIL_ID = "'.$UTIL_ID.'",NATURE="'.$nature.'", NOTE="'.$note.'" where MISSION_ID="'.$mission_id.'" AND ID='.$dcd_id;
	$rep1=$bdd->exec($req1);	
	
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
	echo 'update';
}

?>