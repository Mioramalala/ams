<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$nature=$_POST['nature'];
$note=$_POST['note'];
$ligne=$_POST['ligne'];
$mission_id=$_POST['mission_id'];

// $rep0=$bdd->query('select ID from tab_i4 WHERE NATURE="'.$nature.'" AND ANNEXE="'.$note.'" AND MISSION_ID='.$mission_id);
$rep0=$bdd->query('select ID from tab_i4 WHERE LIGNE='.$ligne.' AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();
$dcd_id = $donnees0['ID'];

if($dcd_id==0){
	$rep=$bdd->exec('insert into tab_i4(NATURE, ANNEXE, LIGNE, MISSION_ID,UTIL_ID) values ("'.$nature.'","'.$note.'",'.$ligne.','.$mission_id.','.$UTIL_ID.')');
	
	$queryInsert='insert into tab_i4(NATURE, ANNEXE, LIGNE, MISSION_ID,UTIL_ID) values ("'.$nature.'","'.$note.'",'.$ligne.','.$mission_id.','.$UTIL_ID.')';

	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
}
else{
	$rep=$bdd->exec('update tab_i4 set UTIL_ID = "'.$UTIL_ID.'",NATURE="'.$nature.'", ANNEXE="'.$note.'" where MISSION_ID='.$mission_id.' AND ID='.$dcd_id);	
	echo 'update';
	
	$queryUpdate='update tab_i4 set UTIL_ID = "'.$UTIL_ID.'",NATURE="'.$nature.'", ANNEXE="'.$note.'" where MISSION_ID='.$mission_id.' AND ID='.$dcd_id;
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
}

?>