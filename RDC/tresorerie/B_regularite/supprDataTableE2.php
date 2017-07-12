<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$cpt=$_POST['cpt'];
$reference=$_POST['reference'];

//J'active le requette qui supprime les données dans la tab_rdc_tr_e2
$queryDel='delete from tab_rdc_tr_e2 where mission_id='.$mission_id.' and cpt='.$cpt.' and reference="'.$reference.'"';
$reponseDel=$bdd->exec($queryDel);

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryDel.";", FILE_APPEND | LOCK_EX);
?>