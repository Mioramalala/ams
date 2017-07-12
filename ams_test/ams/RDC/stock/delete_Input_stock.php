<?php

include '../../connexion.php';

$obs=$_POST['obs'];
$risque=$_POST['risque'];
$recom=$_POST['recom'];
$mission_id=$_POST['mission_id'];

$req='DELETE FROM tab_synthese_feuille_rdc WHERE SYNTHESE_OBS="'.$obs.'" AND SYNTHESE_RISQUE="'.$risque.'"  AND SYNTHESE_RECOM="'.$recom.'" AND MISSION_ID='.$mission_id;
$rep=$bdd->exec($req);

$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>