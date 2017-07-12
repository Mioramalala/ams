<?php 
include '../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
    $cycle="";

	$sql='SELECT CYCLE_ACHAT_ID FROM tab_conclusion WHERE (CYCLE_ACHAT_ID=18 OR CYCLE_ACHAT_ID=19 OR CYCLE_ACHAT_ID=20 OR CYCLE_ACHAT_ID=21  OR CYCLE_ACHAT_ID=100) AND MISSION_ID='.$mission_id;
	$verif=$bdd->query($sql);
	while (	$resultat=$verif->fetch())
    {

			$cycle.=$resultat['CYCLE_ACHAT_ID'].",";

	}
    print($cycle);
?>