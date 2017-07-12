<?php 
include '../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
    $cycle="";

	$sql="SELECT CYCLE_ACHAT_ID FROM tab_conclusion WHERE (CYCLE_ACHAT_ID='1' OR CYCLE_ACHAT_ID='2' OR CYCLE_ACHAT_ID='3' OR CYCLE_ACHAT_ID='4' OR CYCLE_ACHAT_ID='5' OR CYCLE_ACHAT_ID='6')  AND MISSION_ID='$mission_id'";
	$verif=$bdd->query($sql);
	while (	$resultat=$verif->fetch())
    {
            $cycle.=$resultat['CYCLE_ACHAT_ID'].",";

	}
    print($cycle);
?>