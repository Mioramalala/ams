<?php

session_start();
include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
var_dump($commentaire);
$qcm=$_POST['qcm'];
$question_id=$_POST['question_id'];
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];

$reponse0=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=7');

$donnees=$reponse0->fetch();

if($donnees['OBJECTIF_COMMENTAIRE']==$commentaire && $donnees['OBJECTIF_QCM']==$qcm){
	echo '0';
}
else{
	$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",OBJECTIF_QCM="'.$qcm.'", UTIL_ID="'.$UTIL_ID.'" 
	WHERE MISSION_ID="'.$mission_id.'" AND QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=7');
	echo '1';
}

?>