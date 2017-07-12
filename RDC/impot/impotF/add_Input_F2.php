<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$periode=$_POST['periode'];
$perte=$_POST['perte'];
$ir=$_POST['ir'];
$ida1=$_POST['ida1'];
$ida2=$_POST['ida2'];
$investissement=$_POST['investissement'];
$total=$_POST['total'];
$ligne=$_POST['ligne'];
$mission_id=$_POST['mission_id'];

$rep0=$bdd->query('select ID from tab_i3 WHERE LIGNE='.$ligne.' AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();
$dcd_id = $donnees0['ID'];

if($dcd_id==0){
	$rep=$bdd->exec('insert into tab_i3(LIGNE, INVESTISSEMENT, PERIODE, PERTE_FISCALE, IDA1, IR, IDA2,  TOTAL, MISSION_ID,UTIL_ID) values ('.$ligne.', "'.$investissement.'","'.$periode.'","'.$perte.'",
	"'.$ida1.'","'.$ir.'","'.$ida2.'","'.$total.'",'.$mission_id.','.$UTIL_ID.')');
	
	$queryInsert='insert into tab_i3(LIGNE, INVESTISSEMENT, PERIODE, PERTE_FISCALE, IDA1, IR, IDA2,  TOTAL, MISSION_ID,UTIL_ID) values ('.$ligne.', "'.$investissement.'","'.$periode.'","'.$perte.'",
	"'.$ida1.'","'.$ir.'","'.$ida2.'","'.$total.'",'.$mission_id.','.$UTIL_ID.')';
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
}
else{
	$rep=$bdd->exec('update tab_i3 set UTIL_ID = "'.$UTIL_ID.'",PERIODE="'.$periode.'", PERTE_FISCALE="'.$perte.'", IDA1="'.$ida1.'", IR="'.$ir.'",IDA2="'.$ida2.'", TOTAL="'.$total.'" where MISSION_ID='.$mission_id.' AND ID='.$dcd_id);	
	echo 'update';	
	
	$queryUpdate='update tab_i3 set UTIL_ID = "'.$UTIL_ID.'",PERIODE="'.$periode.'", PERTE_FISCALE="'.$perte.'", IDA1="'.$ida1.'", IR="'.$ir.'",IDA2="'.$ida2.'", TOTAL="'.$total.'" where MISSION_ID='.$mission_id.' AND ID='.$dcd_id;
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
}

?>