<?php 
include '../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
$cycle="";
	//$cycleId=$_POST['cycleAchatId'];
	//$cycle=array();
	//$cycle=1000000;
//for($i=23; $i<26;$i++)
//{
	$sql='SELECT CYCLE_ACHAT_ID FROM tab_conclusion WHERE (CYCLE_ACHAT_ID=22 OR CYCLE_ACHAT_ID=23 OR CYCLE_ACHAT_ID=1000000 OR CYCLE_ACHAT_ID=24 OR CYCLE_ACHAT_ID=25) AND MISSION_ID='.$mission_id;
	$verif=$bdd->query($sql);
	while (	$resultat=$verif->fetch()) {

			$cycle.=$resultat['CYCLE_ACHAT_ID'].",";
			//print($cycle);
			//$nombre_resultat= $resultat['nb'];
			//if($nombre_resultat==1){
			//	$cycle=$i;
			//	print($cycle.",");
			//}
	}
//}
	print($cycle);
?>