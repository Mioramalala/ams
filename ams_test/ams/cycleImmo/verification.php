<?php
    @session_start();
    $mission_id=$_SESSION['idMission'];
    $cycle="";
    include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';


	$sql='SELECT CYCLE_ACHAT_ID FROM tab_conclusion WHERE (CYCLE_ACHAT_ID=7 OR CYCLE_ACHAT_ID=8 OR CYCLE_ACHAT_ID=9 OR CYCLE_ACHAT_ID=1000) AND MISSION_ID='.$mission_id;
	$verif=$bdd->query($sql);
	while ($resultat=$verif->fetch())
    {


			$cycle.=$resultat['CYCLE_ACHAT_ID'].",";

	}
    print($cycle);


?>