<?php
@session_start();
include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=33');

$score_final=0;
$score=0;
while($donnees=$reponse->fetch()){
	if(($donnees['OBJECTIF_QCM']=="OUI") && ($donnees['QUESTION_ID']==448 || $donnees['QUESTION_ID']==455 || $donnees['QUESTION_ID']==456 || $donnees['QUESTION_ID']==458 || $donnees['QUESTION_ID']==459)){
		$score=1;
	}
	else if(($donnees['OBJECTIF_QCM']=="NON")){
		$score=0;
	}
	else if(($donnees['OBJECTIF_QCM']=="OUI" || $donnees['OBJECTIF_QCM']=="N/A") && ($donnees['QUESTION_ID']==450 || $donnees['QUESTION_ID']==451 || $donnees['QUESTION_ID']==454 || $donnees['QUESTION_ID']==460 || $donnees['QUESTION_ID']==461)){
		$score=2;
	}
	else if(($donnees['OBJECTIF_QCM']=="OUI" || $donnees['OBJECTIF_QCM']=="N/A") && ($donnees['QUESTION_ID']==449 || $donnees['QUESTION_ID']==452 || $donnees['QUESTION_ID']==453 || $donnees['QUESTION_ID']==457 || $donnees['QUESTION_ID']==462)){
		$score=3;
	}

	$score_final=$score_final+$score;
}


$bdd->exec('UPDATE tab_synthese SET SCORE = '.$score_final.' WHERE CYCLE_ACHAT_ID=33 AND MISSION_ID='.$_SESSION['idMission']);
echo $score_final;
?>