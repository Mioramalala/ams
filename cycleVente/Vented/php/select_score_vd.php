<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=28');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=28 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==352 || $donnees1['QUESTION_ID']==356 || $donnees1['QUESTION_ID']==362 || $donnees1['QUESTION_ID']==373 || $donnees1['QUESTION_ID']==385)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==351 || $donnees1['QUESTION_ID']==352 || $donnees1['QUESTION_ID']==353 || $donnees1['QUESTION_ID']==354 || $donnees1['QUESTION_ID']==355 || $donnees1['QUESTION_ID']==356 || $donnees1['QUESTION_ID']==357 || $donnees1['QUESTION_ID']==358 || $donnees1['QUESTION_ID']==359 || $donnees1['QUESTION_ID']==360 || $donnees1['QUESTION_ID']==361 || $donnees1['QUESTION_ID']==362 || $donnees1['QUESTION_ID']==363 || $donnees1['QUESTION_ID']==364 || $donnees1['QUESTION_ID']==365 || $donnees1['QUESTION_ID']==366 || $donnees1['QUESTION_ID']==367 || $donnees1['QUESTION_ID']==368 || $donnees1['QUESTION_ID']==369 || $donnees1['QUESTION_ID']==370 || $donnees1['QUESTION_ID']==371 || $donnees1['QUESTION_ID']==372 || $donnees1['QUESTION_ID']==373 || $donnees1['QUESTION_ID']==374 || $donnees1['QUESTION_ID']==375 || $donnees1['QUESTION_ID']==376 || $donnees1['QUESTION_ID']==377 || $donnees1['QUESTION_ID']==378 || $donnees1['QUESTION_ID']==379 || $donnees1['QUESTION_ID']==380 || $donnees1['QUESTION_ID']==381 || $donnees1['QUESTION_ID']==382 || $donnees1['QUESTION_ID']==383 || $donnees1['QUESTION_ID']==384 || $donnees1['QUESTION_ID']==385)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==369 || $donnees1['QUESTION_ID']==370 || $donnees1['QUESTION_ID']==371 || $donnees1['QUESTION_ID']==372 || $donnees1['QUESTION_ID']==377 || $donnees1['QUESTION_ID']==378 || $donnees1['QUESTION_ID']==379 || $donnees1['QUESTION_ID']==380 || $donnees1['QUESTION_ID']==384)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==351 || $donnees1['QUESTION_ID']==353 || $donnees1['QUESTION_ID']==354 || $donnees1['QUESTION_ID']==355 || $donnees1['QUESTION_ID']==357 || $donnees1['QUESTION_ID']==358 || $donnees1['QUESTION_ID']==359 || $donnees1['QUESTION_ID']==360 || $donnees1['QUESTION_ID']==361 || $donnees1['QUESTION_ID']==363 || $donnees1['QUESTION_ID']==364 || $donnees1['QUESTION_ID']==365 || $donnees1['QUESTION_ID']==366 || $donnees1['QUESTION_ID']==367 || $donnees1['QUESTION_ID']==368 || $donnees1['QUESTION_ID']==374 || $donnees1['QUESTION_ID']==375 || $donnees1['QUESTION_ID']==376 || $donnees1['QUESTION_ID']==381 || $donnees1['QUESTION_ID']==382 || $donnees1['QUESTION_ID']==383)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","28","vente","D","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/86";

?>