<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=31');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==409 || $donnees1['QUESTION_ID']==412 || $donnees1['QUESTION_ID']==415 || $donnees1['QUESTION_ID']==416 || $donnees1['QUESTION_ID']==417 || $donnees1['QUESTION_ID']==418 || $donnees1['QUESTION_ID']==419 || $donnees1['QUESTION_ID']==421 || $donnees1['QUESTION_ID']==422 || $donnees1['QUESTION_ID']==424)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==405 || $donnees1['QUESTION_ID']==406 || $donnees1['QUESTION_ID']==407 || $donnees1['QUESTION_ID']==408 || $donnees1['QUESTION_ID']==409 || $donnees1['QUESTION_ID']==410 || $donnees1['QUESTION_ID']==411 || $donnees1['QUESTION_ID']==412 || $donnees1['QUESTION_ID']==413 || $donnees1['QUESTION_ID']==414 || $donnees1['QUESTION_ID']==415 || $donnees1['QUESTION_ID']==416 || $donnees1['QUESTION_ID']==417 || $donnees1['QUESTION_ID']==418 || $donnees1['QUESTION_ID']==418 || $donnees1['QUESTION_ID']==420 || $donnees1['QUESTION_ID']==421 || $donnees1['QUESTION_ID']==422 || $donnees1['QUESTION_ID']==423 || $donnees1['QUESTION_ID']==424 || $donnees1['QUESTION_ID']==425 || $donnees1['QUESTION_ID']==426 || $donnees1['QUESTION_ID']==427 || $donnees1['QUESTION_ID']==428 || $donnees1['QUESTION_ID']==429 || $donnees1['QUESTION_ID']==430)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==410 || $donnees1['QUESTION_ID']==420 || $donnees1['QUESTION_ID']==423 || $donnees1['QUESTION_ID']==425 || $donnees1['QUESTION_ID']==427 || $donnees1['QUESTION_ID']==429 || $donnees1['QUESTION_ID']==430)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==405 || $donnees1['QUESTION_ID']==406 || $donnees1['QUESTION_ID']==407 || $donnees1['QUESTION_ID']==408 || $donnees1['QUESTION_ID']==411 || $donnees1['QUESTION_ID']==413 || $donnees1['QUESTION_ID']==414 || $donnees1['QUESTION_ID']==426 || $donnees1['QUESTION_ID']==428)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","31","environnement","Q1","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/51";

?>
