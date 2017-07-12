<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$cpt=$_POST['cpt'];
$reference=$_POST['reference'];

$queryDel='delete from tab_rdc_st_d5 where mission_id='.$mission_id.' and cpt='.$cpt.' and reference="'.$reference.'"';
$reponseDel=$bdd->exec($queryDel);
echo $queryDel;

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryDel.";", FILE_APPEND | LOCK_EX);
?>