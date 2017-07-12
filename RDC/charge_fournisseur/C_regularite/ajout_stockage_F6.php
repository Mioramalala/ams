<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$id_compte=$_POST['id_compte'];
$id_jl=$_POST['id_jl'];
$id_ref=$_POST['id_ref'];
$id_libelle=$_POST['id_libelle'];
$id_d=$_POST['id_d'];
$id_c=$_POST['id_c'];
$id_solde=$_POST['id_solde'];
$id_pointage=$_POST['id_pointage'];
$id_reg=$_POST['id_reg'];
$id_bc=$_POST['id_bc'];
$id_bl=$_POST['id_bl'];
$id_observation=$_POST['id_observation'];
$id_renvoie=$_POST['id_renvoie'];
$mission_id=$_POST['mission_id'];

$query='insert into tab_f6(F6_COMPTE,F6_JL,F6_REF,F6_LIBELLE,F6_D,F6_C,F6_SOLDE,F6_POINTAGE,F6_REG,F6_BC,F6_BL,F6_OBSERVATION,F6_RENVOIE,MISSION_ID,UTIL_ID) value
("'.$id_compte.'","'.$id_jl.'","'.$id_ref.'","'.$id_libelle.'","'.$id_d.'","'.$id_c.'","'.$id_solde.'","'.$id_pointage.'","'.$id_reg.'","'.$id_bc.'","'.$id_bl.'", "'.$id_observation.'","'.$id_renvoie.'","'.$mission_id.'",'.$UTIL_ID.')';

$reponse=$bdd->exec($query);

 $file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $query.";", FILE_APPEND | LOCK_EX);
	//echo $query;
?>