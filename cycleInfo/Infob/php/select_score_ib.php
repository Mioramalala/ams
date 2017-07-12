<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$mission_id=$_SESSION['idMission'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=32');

$donnees=$reponse->fetch();
$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;

while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==435 || $donnees1['QUESTION_ID']==436 || $donnees1['QUESTION_ID']==437 || $donnees1['QUESTION_ID']==438 || $donnees1['QUESTION_ID']==439 || $donnees1['QUESTION_ID']==440 || $donnees1['QUESTION_ID']==441 || $donnees1['QUESTION_ID']==442 || $donnees1['QUESTION_ID']==443 || $donnees1['QUESTION_ID']==444 || $donnees1['QUESTION_ID']==445 || $donnees1['QUESTION_ID']==446)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==431 || $donnees1['QUESTION_ID']==432 || $donnees1['QUESTION_ID']==433 || $donnees1['QUESTION_ID']==434 || $donnees1['QUESTION_ID']==435 || $donnees1['QUESTION_ID']==436 || $donnees1['QUESTION_ID']==437 || $donnees1['QUESTION_ID']==438 || $donnees1['QUESTION_ID']==439 || $donnees1['QUESTION_ID']==440 || $donnees1['QUESTION_ID']==441 || $donnees1['QUESTION_ID']==442 || $donnees1['QUESTION_ID']==443 || $donnees1['QUESTION_ID']==444 || $donnees1['QUESTION_ID']==445 || $donnees1['QUESTION_ID']==446)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==431 || $donnees1['QUESTION_ID']==432 || $donnees1['QUESTION_ID']==433 || $donnees1['QUESTION_ID']==434)){
		$score=2;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","32","Information","B","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/21";

?>