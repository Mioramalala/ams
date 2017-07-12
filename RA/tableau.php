<?php 
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../connexion.php';
    $choix = $_POST['choix_immo'];
	$choix1 = $_POST['choix_exhaust'];
	$choix2 = $_POST['choix_realit'];
	$choix3 = $_POST['choix_propriet'];
	$choix4 = $_POST['choix_evaluat'];
	$choix5 = $_POST['choix_enregist'];
	$choix6 = $_POST['choix_imput'];
	$mission_id=$_POST['mission_id'];
	
	$reponse=$bdd->exec('INSERT INTO  tab_structure_pcg_ra (STRUCTURE_CARACTERE_SIGNIFICATION_FONCTION_RA,STRUCTURE_EXHAUSTIVITE_RA,STRUCTURE_REALITE_RA,STRUCTURE_PROPRIETE_RA,
	STRUCTURE_EVALUATION_CORRECTE_RA,STRUCTURE_ENREGISTREMENT_BONNE_PERIODE_RA,STRUCTURE_IMPUTATION_CORRECTE_RA,MISSION_ID,UTIL_ID) VALUE 
	("'.$choix.'","'.$choix1.'","'.$choix2.'","'.$choix3.'","'.$choix4.'","'.$choix5.'","'.$choix6.'","'.$mission_id.'","'.$UTIL_ID.'")');
	
	$req='INSERT INTO  tab_structure_pcg_ra (STRUCTURE_CARACTERE_SIGNIFICATION_FONCTION_RA,STRUCTURE_EXHAUSTIVITE_RA,STRUCTURE_REALITE_RA,STRUCTURE_PROPRIETE_RA,
	STRUCTURE_EVALUATION_CORRECTE_RA,STRUCTURE_ENREGISTREMENT_BONNE_PERIODE_RA,STRUCTURE_IMPUTATION_CORRECTE_RA,MISSION_ID,UTIL_ID) VALUE 
	("'.$choix.'","'.$choix1.'","'.$choix2.'","'.$choix3.'","'.$choix4.'","'.$choix5.'","'.$choix6.'","'.$mission_id.'","'.$UTIL_ID.'")');
	
	$file = '../fichier/save_mission/mission.sql';
	file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

?>