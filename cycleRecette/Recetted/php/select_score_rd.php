<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=20');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=20 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==269)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==264 || $donnees1['QUESTION_ID']==265 || $donnees1['QUESTION_ID']==266 || $donnees1['QUESTION_ID']==267 || $donnees1['QUESTION_ID']==268 || $donnees1['QUESTION_ID']==269 || $donnees1['QUESTION_ID']==270 || $donnees1['QUESTION_ID']==271 || $donnees1['QUESTION_ID']==272)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==264 || $donnees1['QUESTION_ID']==266)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==265 || $donnees1['QUESTION_ID']==267 || $donnees1['QUESTION_ID']==268 || $donnees1['QUESTION_ID']==270 || $donnees1['QUESTION_ID']==271 || $donnees1['QUESTION_ID']==272)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","20","tresorerie recette","D","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/23";

?>