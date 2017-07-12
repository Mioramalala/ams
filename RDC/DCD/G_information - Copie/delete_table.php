<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$req='DELETE FROM tab_elt_annexe_dcd WHERE MISSION_ID='.$mission_id;
$rep=$bdd->exec($req);
/*$fp= fopen('../../../fichier/save_mission/mission.sql',"a+");
			fwrite($fp, $req.";");
			fclose($fp);*/
			$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>