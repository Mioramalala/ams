<?php
session_start();
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

$query='insert into tab_g3(G3_COMPTE,G3_JL,G3_REF,G3_LIBELLE,G3_D,G3_C,G3_SOLDE,G3_POINTAGE,G3_REG,G3_BC,G3_BL,G3_OBSERVATION,G3_RENVOIE,MISSION_ID,UTIL_ID) value
("'.$id_compte.'","'.$id_jl.'","'.$id_ref.'","'.$id_libelle.'","'.$id_d.'","'.$id_c.'","'.$id_solde.'","'.$id_pointage.'","'.$id_reg.'","'.$id_bc.'","'.$id_bl.'", "'.$id_observation.'","'.$id_renvoie.'","'.$mission_id.'",'.$UTIL_ID.')';

$reponse=$bdd->exec($query);

$req1='insert into tab_g3(G3_COMPTE,G3_JL,G3_REF,G3_LIBELLE,G3_D,G3_C,G3_SOLDE,G3_POINTAGE,G3_REG,G3_BC,G3_BL,G3_OBSERVATION,G3_RENVOIE,MISSION_ID,UTIL_ID) value
("'.$id_compte.'","'.$id_jl.'","'.$id_ref.'","'.$id_libelle.'","'.$id_d.'","'.$id_c.'","'.$id_solde.'","'.$id_pointage.'","'.$id_reg.'","'.$id_bc.'","'.$id_bl.'", "'.$id_observation.'","'.$id_renvoie.'","'.$mission_id.'",'.$UTIL_ID.')';
		
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
?>