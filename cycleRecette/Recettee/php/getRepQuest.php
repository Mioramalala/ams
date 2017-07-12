<?php

include '../../../connexion.php';

@session_start();
$mission_id= $_SESSION['idMission'];

$cycleId=$_POST['cycleId'];
$questId=$POST['questId'];

$reponse=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM  tab_objectif WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID= "'.$cycleId.'" AND QUESTION_ID= "'.$questId .'"' );
$donnees=$reponse->fetch();

$data=$donnees['OBJECTIF_COMMENTAIRE'].','.$donnees['OBJECTIF_QCM'].',1';
$dataTest=$donnees['OBJECTIF_COMMENTAIRE'];

// tinay editer
// if($dataSynthTest!=""){
if($donnees){
	echo $data; 
}
else{
	echo '0,0';
}
?>