<?php
@session_start();
include '../../../connexion.php';

$mission_id= $_SESSION['idMission'];

$question_id=$_POST['question_id'];
$cycle_achat_id=$_POST['cycle_achat_id'];

$reponse = $bdd->query('SELECT OBJECTIF_ID FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID='.$cycle_achat_id);

$donnees=$reponse->fetch();
if($donnees){
	$objectif_id=$donnees['OBJECTIF_ID'];
	echo $objectif_id;
}else{
	echo 0;
}

?>