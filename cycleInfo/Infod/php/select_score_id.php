<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$mission_id=$_SESSION['idMission'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=34');

$donnees=$reponse->fetch();
$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;

while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ( $donnees1['QUESTION_ID']==470 || $donnees1['QUESTION_ID']==471 || $donnees1['QUESTION_ID']==472 || $donnees1['QUESTION_ID']==473 || $donnees1['QUESTION_ID']==474 || $donnees1['QUESTION_ID']==475 || $donnees1['QUESTION_ID']==476 || $donnees1['QUESTION_ID']==477 || $donnees1['QUESTION_ID']==478 || $donnees1['QUESTION_ID']==480)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==462 || $donnees1['QUESTION_ID']==463 || $donnees1['QUESTION_ID']==464 || $donnees1['QUESTION_ID']==464 || $donnees1['QUESTION_ID']==466 || $donnees1['QUESTION_ID']==467 || $donnees1['QUESTION_ID']==468 || $donnees1['QUESTION_ID']==469 || $donnees1['QUESTION_ID']==470 || $donnees1['QUESTION_ID']==471 || $donnees1['QUESTION_ID']==472 || $donnees1['QUESTION_ID']==473 || $donnees1['QUESTION_ID']==474 || $donnees1['QUESTION_ID']==475 || $donnees1['QUESTION_ID']==476 || $donnees1['QUESTION_ID']==477 || $donnees1['QUESTION_ID']==478 || $donnees1['QUESTION_ID']==479 || $donnees1['QUESTION_ID']==480)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==462 || $donnees1['QUESTION_ID']==463 || $donnees1['QUESTION_ID']==464 || $donnees1['QUESTION_ID']==465 || $donnees1['QUESTION_ID']==466 || $donnees1['QUESTION_ID']==467 || $donnees1['QUESTION_ID']==468 || $donnees1['QUESTION_ID']==469 || $donnees1['QUESTION_ID']==479)){
		$score=2;
	}
	$score_final=$score_final+$score;
}

$sqlInsert='INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","34","Information","D","'.$mission_id.'","'.$UTIL_ID.'") ';

$reponse_score=$bdd->query($sqlInsert);

//print($sqlInsert);

echo $score_final."/26";

?>