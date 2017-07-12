<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$cpt=$_POST['cpt'];

$queryDel='delete from  tab_rdc_st_d4 where mission_id='.$mission_id.' and cpt='.$cpt;
$reponseDel=$bdd->exec($queryDel);
echo $queryDel;

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryDel.";", FILE_APPEND | LOCK_EX);
?>