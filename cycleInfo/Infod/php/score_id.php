<?php
@session_start();
include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=34');

$score_final=0;
$score=0;
while($donnees=$reponse->fetch()){
	if(($donnees['OBJECTIF_QCM']=="OUI") && ($donnees['QUESTION_ID']==470 || $donnees['QUESTION_ID']==471 || $donnees['QUESTION_ID']==472 || $donnees['QUESTION_ID']==473 || $donnees['QUESTION_ID']==474 || $donnees['QUESTION_ID']==475 || $donnees['QUESTION_ID']==476 || $donnees['QUESTION_ID']==477 || $donnees['QUESTION_ID']==478 || $donnees['QUESTION_ID']==479 || $donnees['QUESTION_ID']==480)){
		$score=1;
	}
	else if(($donnees['OBJECTIF_QCM']=="NON")){
		$score=0;
	}
	else if(($donnees['OBJECTIF_QCM']=="OUI" || $donnees['OBJECTIF_QCM']=="N/A") && ($donnees['QUESTION_ID']==463 || $donnees['QUESTION_ID']==464 || $donnees['QUESTION_ID']==465 || $donnees['QUESTION_ID']==466 || $donnees['QUESTION_ID']==467 || $donnees['QUESTION_ID']==468 || $donnees['QUESTION_ID']==469)){
		$score=2;
	}

	$score_final=$score_final+$score;
}


$bdd->exec('UPDATE tab_synthese SET SCORE = '.$score_final.' WHERE CYCLE_ACHAT_ID=34 AND MISSION_ID='.$_SESSION['idMission']);
echo $score_final;
?>