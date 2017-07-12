<?php

include '../../../connexion.php';

$nature=$_POST['nature'];
$note=$_POST['note'];
$mission_id=$_POST['mission_id'];

$req='DELETE FROM tab_elt_annexe_dcd WHERE NATURE="'.$nature.'" AND NOTE="'.$note.'" AND MISSION_ID='.$mission_id;
$rep=$bdd->exec($req);

		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>