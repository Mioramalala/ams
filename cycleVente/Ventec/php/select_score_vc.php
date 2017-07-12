<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=27');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=27 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==347)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==335 || $donnees1['QUESTION_ID']==336 || $donnees1['QUESTION_ID']==337 || $donnees1['QUESTION_ID']==338 || $donnees1['QUESTION_ID']==339 || $donnees1['QUESTION_ID']==340 || $donnees1['QUESTION_ID']==341 || $donnees1['QUESTION_ID']==342 || $donnees1['QUESTION_ID']==343 || $donnees1['QUESTION_ID']==344 || $donnees1['QUESTION_ID']==345 || $donnees1['QUESTION_ID']==346 || $donnees1['QUESTION_ID']==347 || $donnees1['QUESTION_ID']==348 || $donnees1['QUESTION_ID']==349 || $donnees1['QUESTION_ID']==350)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==335 || $donnees1['QUESTION_ID']==338 || $donnees1['QUESTION_ID']==339 || $donnees1['QUESTION_ID']==340 || $donnees1['QUESTION_ID']==349 || $donnees1['QUESTION_ID']==350)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==336 || $donnees1['QUESTION_ID']==337 || $donnees1['QUESTION_ID']==341 || $donnees1['QUESTION_ID']==342 || $donnees1['QUESTION_ID']==343 || $donnees1['QUESTION_ID']==344 || $donnees1['QUESTION_ID']==345 || $donnees1['QUESTION_ID']==346 || $donnees1['QUESTION_ID']==348)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","27","vente","C","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/41";

?>