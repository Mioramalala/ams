<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$compte = $_POST['compte'] ;
$lib = $_POST['libelle'] ;
$verif = $bdd->query("SELECT COUNT(*) AS isHere FROM tab_rdc_cf_f4_2
			WHERE compte = '$compte'
			AND libelle = $lib
			AND mission_id = $mission_id ") ;


$verif = $verif->fetch() ;
$verif = $verif['isHere'] ;
if($verif==1){
	$requete = $bdd->query("DELETE FROM tab_rdc_cf_f4_2 
		WHERE compte = '$compte'
			AND libelle = $lib
			AND mission_id = $mission_id") ;
}else{
	$requete = $bdd->query("INSERT INTO tab_rdc_cf_f4_2 (compte, libelle, mission_id)
		VALUES ( '$compte' ,
			 $lib ,
			 $mission_id ) ") ;
}


echo $compte ;


?>