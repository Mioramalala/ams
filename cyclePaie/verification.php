<?php 
include '../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
    $cycle="";
	//$cycleId=$_POST['cycleAchatId'];
	//$cycle=array();
	//$cycle=1;
//for($i=14; $i<18;$i++)
//{
	$sql='SELECT CYCLE_ACHAT_ID FROM tab_conclusion WHERE (CYCLE_ACHAT_ID=14 OR CYCLE_ACHAT_ID=10000 OR CYCLE_ACHAT_ID=15 OR CYCLE_ACHAT_ID=16 OR CYCLE_ACHAT_ID=17) AND MISSION_ID='.$mission_id;
	$verif=$bdd->query($sql);
	while (	$resultat=$verif->fetch()) {

			$cycle.=$resultat['CYCLE_ACHAT_ID'].",";
			//$nombre_resultat= $resultat['nb'];

			//print("nb".$nombre_resultat);
			//if($nombre_resultat==1){
			//	$cycle=$i;
			//	print($cycle.",");

			//}

			//print("existe".$i);
	}

    print($cycle);
	//print($cycle[$i]);
	//print($cycle[$i]);
//	$nombre_resultat= $resultat['nb'];
//}
	/*if($nombre_resultat==1)
	{echo "existe";}*/
				//print($cycle);

?>