<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$id_compte=$_POST['id_compte'];
$id_libelle=$_POST['id_libelle'];
$id_d=$_POST['id_d'];
$id_c=$_POST['id_c'];
$id_sd_n=$_POST['id_sd_n'];
$id_sc_n=$_POST['id_sc_n'];
$id_sd_n1=$_POST['id_sd_n1'];
$id_sc_n1=$_POST['id_sc_n1'];
$id_sd_variation=$_POST['id_sd_variation'];
$id_sc_variation=$_POST['id_sc_variation'];
$id_prct_d=$_POST['id_prct_d'];
$id_prct_c=$_POST['id_prct_c'];
$id_commentaire=$_POST['id_commentaire'];
$mission_id=$_POST['mission_id'];

$query='insert into tab_f1(F1_COMPTE, F1_LIBELLE,F1_D,F1_C,F1_SD_N,F1_SC_N,F1_SD_N1,F1_SC_N1,F1_SD_VARIATION ,F1_SC_VARIATION,F1_PRCT_D,F1_PRCT_C,F1_COMMENTAIRE,MISSION_ID,UTIL_ID) value
	("'.$id_compte.'","'.$id_libelle.'","'.$id_d.'","'.$id_c.'","'.$id_sd_n.'","'.$id_sc_n.'","'.$id_sd_n1.'","'.$id_sc_n1.'","'.$id_sd_variation.'","'.$id_sc_variation.'","'.$id_prct_d.'", "'.$id_prct_c.'","'.$id_commentaire.'","'.$mission_id.'","'.$UTIL_ID.'")';
	$reponse=$bdd->exec($query);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $query.";", FILE_APPEND | LOCK_EX);
?>