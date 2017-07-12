<?php
session_start();
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

	$query='insert into tab_g1(G1_COMPTE, G1_LIBELLE,G1_D,G1_C,G1_SD_N,G1_SC_N,G1_SD_N1,G1_SC_N1,G1_SD_VARIATION ,G1_SC_VARIATION,G1_PRCT_D,G1_PRCT_C,G1_COMMENTAIRE,MISSION_ID,UTIL_ID) value
	("'.$id_compte.'","'.$id_libelle.'","'.$id_d.'","'.$id_c.'","'.$id_sd_n.'","'.$id_sc_n.'","'.$id_sd_n1.'","'.$id_sc_n1.'","'.$id_sd_variation.'","'.$id_sc_variation.'","'.$id_prct_d.'", "'.$id_prct_c.'","'.$id_commentaire.'","'.$mission_id.'","'.$UTIL_ID.'")';
	$reponse=$bdd->exec($query);
	
	$reqInsert='insert into tab_g1(G1_COMPTE, G1_LIBELLE,G1_D,G1_C,G1_SD_N,G1_SC_N,G1_SD_N1,G1_SC_N1,G1_SD_VARIATION ,G1_SC_VARIATION,G1_PRCT_D,G1_PRCT_C,G1_COMMENTAIRE,MISSION_ID,UTIL_ID) value
	("'.$id_compte.'","'.$id_libelle.'","'.$id_d.'","'.$id_c.'","'.$id_sd_n.'","'.$id_sc_n.'","'.$id_sd_n1.'","'.$id_sc_n1.'","'.$id_sd_variation.'","'.$id_sc_variation.'","'.$id_prct_d.'", "'.$id_prct_c.'","'.$id_commentaire.'","'.$mission_id.'","'.$UTIL_ID.'")';
			
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $reqInsert.";", FILE_APPEND | LOCK_EX);
?>