<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$tab_fraisacces=array();

$tab_fraisacces=$_POST['tab_fraisAcces'];

$compte=$_POST['compte'];
$mission_id=$_POST['mission_id'];
$libelle=$_POST['libelle'];

////////////////////////Insertion des données de la tab_rdc_cf_f4_2 /////////////
$queryFraisAcces='insert into tab_rdc_cf_f4_2 (mission_id, compte, libelle, N0, N1, N2, N3, N4,UTIL_ID) value ('.$mission_id.',"'.$compte.'","'.$libelle.'",'.$tab_fraisacces[0].','.$tab_fraisacces[1].','.$tab_fraisacces[2].','.$tab_fraisacces[3].','.$tab_fraisacces[4].','.$UTIL_ID.')';
$reponseVente=$bdd->exec($queryFraisAcces);

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryFraisAcces.";", FILE_APPEND | LOCK_EX);
?>