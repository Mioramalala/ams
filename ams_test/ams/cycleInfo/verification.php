<?php 
    include '../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];

    $sql='SELECT count(CONCLUSION_ID) AS nb FROM tab_conclusion WHERE (CYCLE_ACHAT_ID=100000000 OR CYCLE_ACHAT_ID=32 OR CYCLE_ACHAT_ID=33 OR CYCLE_ACHAT_ID=34) AND MISSION_ID='.$mission_id;
    $verif=$bdd->query($sql);
    $resultat=$verif->fetch();
    $nombre_resultat= $resultat['nb'];
				if($nombre_resultat>0)
				{
					echo "existe";
				}
?>