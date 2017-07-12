<?php

include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$nature=$_POST['nature'];
$note=$_POST['note'];
$mission_id=$_POST['mission_id'];

$rep0=$bdd->query('select ID from tab_elt_annexe_dcd WHERE NATURE="'.$nature.'" AND NOTE="'.$note.'" AND MISSION_ID='.$mission_id);

if(!$rep0->fetch()){
	$req='insert into tab_elt_annexe_dcd(NATURE, NOTE, MISSION_ID, UTIL_ID) values ("'.$nature.'","'.$note.'",'.$mission_id.','.$UTIL_ID.')';
	$rep=$bdd->exec($req);
	/*$fp= fopen('../../../fichier/save_mission/mission.sql',"a+");
			fwrite($fp, $req.";");
			fclose($fp);*/
			$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}

?>