<?php
include '../../../connexion.php';

$nature=$_POST['nature'];
$note=$_POST['note'];
$mission_id=$_POST['mission_id'];

$rep=$bdd->exec('DELETE FROM tab_i4 WHERE NATURE="'.$nature.'" AND ANNEXE="'.$note.'" AND MISSION_ID='.$mission_id);

$queryDelete='DELETE FROM tab_i4 WHERE NATURE="'.$nature.'" AND ANNEXE="'.$note.'" AND MISSION_ID='.$mission_id;

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);

?>