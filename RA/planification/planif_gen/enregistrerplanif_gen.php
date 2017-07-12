<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';
	$fonct1=$_POST['fonct1'];
	$fonct2=$_POST['fonct2'];
	$fonct3=$_POST['fonct3'];
	$fonct4=$_POST['fonct4'];
	$fonct5=$_POST['fonct5'];
	$fonct6=$_POST['fonct6'];
	$fonct7=$_POST['fonct7'];
	$fonct8=$_POST['fonct8'];
	$fonct9=$_POST['fonct9'];
	$fonct10=$_POST['fonct10'];
	$fonct11=$_POST['fonct11'];
	$mission_id=$_POST['mission_id'];
	
	$reponse=$bdd->exec('INSERT INTO tab_planif_gen_ra(PLANIF_GEN_FOND,PLANIF_GEN_IMMO,PLANIF_GEN_IMMOFI,PLANIF_GEN_STOCK,PLANIF_GEN_TRESORERIE,PLANIF_GEN_CHARGE,PLANIF_GEN_VENTE,PLANIF_GEN_PAIE,PLANIF_GEN_IMPOT,PLANIF_GEN_EMPRUNT,PLANIF_GEN_DCD,MISSION_ID,UTIL_ID) VALUES ("'.$fonct1.'","'.$fonct2.'","'.$fonct3.'","'.$fonct4.'","'.$fonct5.'","'.$fonct6.'","'.$fonct7.'","'.$fonct8.'","'.$fonct9.'","'.$fonct10.'","'.$fonct11.'","'.$mission_id.'","'.$UTIL_ID.'")');
	
	/*$req='INSERT INTO tab_planif_gen_ra(PLANIF_GEN_FOND,PLANIF_GEN_IMMO,PLANIF_GEN_IMMOFI,PLANIF_GEN_STOCK,PLANIF_GEN_TRESORERIE,PLANIF_GEN_CHARGE,PLANIF_GEN_VENTE,PLANIF_GEN_PAIE,PLANIF_GEN_IMPOT,PLANIF_GEN_EMPRUNT,PLANIF_GEN_DCD,MISSION_ID,UTIL_ID) VALUES ("'.$fonct1.'","'.$fonct2.'","'.$fonct3.'","'.$fonct4.'","'.$fonct5.'","'.$fonct6.'","'.$fonct7.'","'.$fonct8.'","'.$fonct9.'","'.$fonct10.'","'.$fonct11.'","'.$mission_id.'","'.$UTIL_ID.'")';
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);*/
?>