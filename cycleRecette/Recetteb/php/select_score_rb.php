<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=18');
$donnees=$reponse->fetch();
$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=18 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;

while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==235 || $donnees1['QUESTION_ID']==236 || $donnees1['QUESTION_ID']==242 || $donnees1['QUESTION_ID']==252)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==235 || $donnees1['QUESTION_ID']==236 || $donnees1['QUESTION_ID']==237 || $donnees1['QUESTION_ID']==238 || $donnees1['QUESTION_ID']==239 || $donnees1['QUESTION_ID']==240 || $donnees1['QUESTION_ID']==241 || $donnees1['QUESTION_ID']==242 || $donnees1['QUESTION_ID']==243 || $donnees1['QUESTION_ID']==244 || $donnees1['QUESTION_ID']==245 || $donnees1['QUESTION_ID']==246 || $donnees1['QUESTION_ID']==247 || $donnees1['QUESTION_ID']==248 || $donnees1['QUESTION_ID']==249 || $donnees1['QUESTION_ID']==250 || $donnees1['QUESTION_ID']==251 || $donnees1['QUESTION_ID']==252 || $donnees1['QUESTION_ID']==253 || $donnees1['QUESTION_ID']==254)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==238 || $donnees1['QUESTION_ID']==239 || $donnees1['QUESTION_ID']==241 || $donnees1['QUESTION_ID']==243)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==237 || $donnees1['QUESTION_ID']==240 || $donnees1['QUESTION_ID']==244 || $donnees1['QUESTION_ID']==245 || $donnees1['QUESTION_ID']==246 || $donnees1['QUESTION_ID']==247 || $donnees1['QUESTION_ID']==248 || $donnees1['QUESTION_ID']==249 || $donnees1['QUESTION_ID']==250 || $donnees1['QUESTION_ID']==251 || $donnees1['QUESTION_ID']==253 || $donnees1['QUESTION_ID']==254)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","18","tresorerie recette","B","'.$mission_id.'","'.$UTIL_ID.'") '); 
echo $score_final."/48";
?>