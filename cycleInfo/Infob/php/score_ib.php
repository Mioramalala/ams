<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';
$mission_id=$_SESSION['idMission'];

$reponse = $bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=32');

$score_final=0;
$score=0;
while($donnees=$reponse->fetch()){
	if(($donnees['OBJECTIF_QCM']=="OUI") && ($donnees['QUESTION_ID']==431 || $donnees['QUESTION_ID']==432 || $donnees['QUESTION_ID']==433 || $donnees['QUESTION_ID']==434)){
		$score=1;
	}
	else if(($donnees['OBJECTIF_QCM']=="NON")){
		$score=0;
	}
	else if(($donnees['OBJECTIF_QCM']=="OUI" || $donnees['OBJECTIF_QCM']=="N/A") && ($donnees['QUESTION_ID']==435 || $donnees['QUESTION_ID']==436 || $donnees['QUESTION_ID']==437 || $donnees['QUESTION_ID']==438 || $donnees['QUESTION_ID']==439|| $donnees['QUESTION_ID']==440 || $donnees['QUESTION_ID']==441 || $donnees['QUESTION_ID']==442 || $donnees['QUESTION_ID']==443|| $donnees['QUESTION_ID']==444 || $donnees['QUESTION_ID']==445 || $donnees['QUESTION_ID']==446 || $donnees['QUESTION_ID']==447)){
		$score=2;
	}

	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","32","Information","B","'.$mission_id.'","'.$UTIL_ID.'") ');

$bdd->exec('UPDATE tab_synthese SET SCORE = '.$score_final.' WHERE CYCLE_ACHAT_ID=32 AND MISSION_ID='.$_SESSION['idMission']);
echo $score_final."/21";
?>