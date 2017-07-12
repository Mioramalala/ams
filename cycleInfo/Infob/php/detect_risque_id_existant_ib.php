<?php
@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];
$mission_id= $_SESSION['idMission'];

//$reponse = $bdd->query('SELECT OBJECTIF_ID, QUESTION_ID FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND MISSION_ID=' .$mission_id);

// tinay editer
// $reponse = $bdd->query('SELECT OBJECTIF_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID= 32 AND QUESTION_ID="' .$question_id .'" AND MISSION_ID = "' .$mission_id .'"');
$reponse = $bdd->query('SELECT OBJECTIF_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID= 29 AND QUESTION_ID="' .$question_id .'" AND MISSION_ID = "' .$mission_id .'"');
$donnees=$reponse->fetch();

if($donnees) {
	echo $donnees['OBJECTIF_ID'];
}else{
	echo 0;
}

?>