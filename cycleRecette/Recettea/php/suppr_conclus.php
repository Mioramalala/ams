<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->exec('DELETE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=100000');

$req='DELETE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=100000';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);



?>