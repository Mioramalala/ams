<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$req='DELETE FROM tab_j3 WHERE MISSION_ID='.$mission_id;
$rep=$bdd->exec($req);

		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>