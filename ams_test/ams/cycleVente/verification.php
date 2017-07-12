<?php 
	include '../connexion.php';
	@session_start();

	$mission_id=$_SESSION['idMission'];
    
    $cycle="";

	$sql= 'SELECT CYCLE_ACHAT_ID FROM tab_conclusion WHERE (CYCLE_ACHAT_ID=10  OR CYCLE_ACHAT_ID=26 OR CYCLE_ACHAT_ID=27 OR CYCLE_ACHAT_ID=28 OR CYCLE_ACHAT_ID=29 OR CYCLE_ACHAT_ID=30) AND MISSION_ID= "'.$mission_id .'"';
	$verif=$bdd->query($sql);
	while (	$resultat=$verif->fetch()) {
			$cycle .= $resultat['CYCLE_ACHAT_ID'] .",";
	}
	print($cycle);


?>