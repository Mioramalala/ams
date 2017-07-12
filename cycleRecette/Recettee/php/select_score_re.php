<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

@session_start();
$mission_id= $_SESSION['idMission'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=21');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=21 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==273 || $donnees1['QUESTION_ID']==274 || $donnees1['QUESTION_ID']==275 || $donnees1['QUESTION_ID']==276 || $donnees1['QUESTION_ID']==277 || $donnees1['QUESTION_ID']==278 || $donnees1['QUESTION_ID']==279)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==276 || $donnees1['QUESTION_ID']==277 || $donnees1['QUESTION_ID']==279)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==273 || $donnees1['QUESTION_ID']==274 || $donnees1['QUESTION_ID']==275 || $donnees1['QUESTION_ID']==278)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","21","tresorerie recette","E","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/18";
?>