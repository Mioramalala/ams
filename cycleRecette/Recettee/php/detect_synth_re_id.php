<?php
@session_start();
include '../../../connexion.php';
$mission_id= $_SESSION['idMission'];

$reponse=$bdd->query('SELECT SYNTHESE_ID FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=21');

$donnees=$reponse->fetch();
if($donnees){
	$synthese_id_b=$donnees['SYNTHESE_ID'];

	echo $synthese_id_b;
}else{
	echo 0;
}

	

?>