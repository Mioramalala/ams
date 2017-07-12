<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$cycleId=$_POST['cycleId'];
$questId=$_POST['questId'];

$reponse=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM  tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId.' AND QUESTION_ID='.$questId);

$donnees=$reponse->fetch();

$data=$donnees['OBJECTIF_COMMENTAIRE'].','.$donnees['OBJECTIF_QCM'].',1';

$dataTest=$donnees['OBJECTIF_COMMENTAIRE'];

if($dataTest!=""){
	echo $data; 
}
else{
	echo '';
}
?>