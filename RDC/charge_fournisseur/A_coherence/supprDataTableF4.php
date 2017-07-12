<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$compte=$_POST['compte'];
$mission_id=$_POST['mission_id'];

/////////////////Suppression des données dans la table  tab_rdc_cf_f4_2 après le decochage du checkbox//////////////
$queryDel='delete from tab_rdc_cf_f4_2 where mission_id='.$mission_id.' and compte ="'.$compte.'"';
$reponseDel=$bdd->exec($queryDel);

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryDel.";", FILE_APPEND | LOCK_EX);
?>