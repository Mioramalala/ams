<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$question_id=$_POST['question_id'];
$cycleId=$_POST['cycleId'];
$mission_id=$_POST['mission_id'];
$UTIL_ID=$_SESSION['id'];

$test=0;

$reponse0=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID='.$cycleId);

$donnees=$reponse0->fetch();

if($donnees['OBJECTIF_COMMENTAIRE']!=$commentaire || $donnees['OBJECTIF_QCM']!=$qcm){
	$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",OBJECTIF_QCM="'.$qcm.'", UTIL_ID="'.$UTIL_ID.'" WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID='.$cycleId);
}

$questSuiv=$question_id+1;

$reponse1=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM  tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId.' AND QUESTION_ID='.$questSuiv);

$donnees1=$reponse1->fetch();

$data=$donnees1['OBJECTIF_COMMENTAIRE'].'*'.$donnees1['OBJECTIF_QCM'].'*1';

$dataTest=$donnees1['OBJECTIF_COMMENTAIRE'];

if($dataTest!=""){
	echo $data; 
}
else{
	echo '0*0';
}

?>