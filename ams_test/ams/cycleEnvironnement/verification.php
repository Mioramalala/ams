<?php 
include '../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
	//$cycleId=$_POST['cycleAchatId'];
	//$cycle=array();
	//$cycle=1;
	$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id;
	$verif=$bdd->query($sql);
	$resultat=$verif->fetch();

	print($resultat['nb']);
			//$nombre_resultat= $resultat['nb'];

			//print("nb".$nombre_resultat);
			//if($nombre_resultat==1){
			//	$cycle=$i;
			//	print($cycle.",");
				//print("cycle conserner:".$cycle);
			//}

			//print("existe".$i);
	//}
	
?>