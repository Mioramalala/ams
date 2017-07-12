<?php 
	include '../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
	//$cycleId=$_POST['cycleAchatId'];
	//$cycle=array();
	//$cycle=1;
//for($i=11; $i<14;$i++)
//{
	$sql="SELECT * FROM tab_conclusion WHERE (CYCLE_ACHAT_ID='111' OR CYCLE_ACHAT_ID='11' OR CYCLE_ACHAT_ID='12' OR CYCLE_ACHAT_ID='13') AND (MISSION_ID='$mission_id')";
	$verif=$bdd->query($sql);
	$i=0;
	while (	$resultat=$verif->fetch() ) {

			$cycle=$resultat['CYCLE_ACHAT_ID'].",";
			//$nombre_resultat= $resultat['nb'];
			print($cycle);
			//print("nb".$nombre_resultat);
			//for($i=0;$i<=$nombre_resultat;$i++){
			//	echo $cycle[$i];
			//}
	}
?>