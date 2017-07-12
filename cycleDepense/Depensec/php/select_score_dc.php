<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_SESSION['idMission'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=23');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=23 AND MISSION_ID= "'.$mission_id  .'"' );

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==295 || $donnees1['QUESTION_ID']==296 || $donnees1['QUESTION_ID']==297 || $donnees1['QUESTION_ID']==298 || $donnees1['QUESTION_ID']==299 || $donnees1['QUESTION_ID']==300 || $donnees1['QUESTION_ID']==301 || $donnees1['QUESTION_ID']==302 || $donnees1['QUESTION_ID']==303)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==297 || $donnees1['QUESTION_ID']==301 || $donnees1['QUESTION_ID']==302 || $donnees1['QUESTION_ID']==303)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==295 || $donnees1['QUESTION_ID']==296 || $donnees1['QUESTION_ID']==298 || $donnees1['QUESTION_ID']==299 || $donnees1['QUESTION_ID']==300)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

//$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","23","tresorerie depense","C","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/23";

?>