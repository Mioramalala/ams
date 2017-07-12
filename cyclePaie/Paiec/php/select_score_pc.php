<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id']; 

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=15');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==209 || $donnees1['QUESTION_ID']==216 || $donnees1['QUESTION_ID']==217 || $donnees1['QUESTION_ID']==220)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==1 || $donnees1['QUESTION_ID']==196 || $donnees1['QUESTION_ID']==197 || $donnees1['QUESTION_ID']==198 || $donnees1['QUESTION_ID']==199 || $donnees1['QUESTION_ID']==200 || $donnees1['QUESTION_ID']==201 || $donnees1['QUESTION_ID']==202 || $donnees1['QUESTION_ID']==203 || $donnees1['QUESTION_ID']==204 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==206 || $donnees1['QUESTION_ID']==207 || $donnees1['QUESTION_ID']==208 || $donnees1['QUESTION_ID']==209 || $donnees1['QUESTION_ID']==210 || $donnees1['QUESTION_ID']==211 || $donnees1['QUESTION_ID']==212 || $donnees1['QUESTION_ID']==213 || $donnees1['QUESTION_ID']==214 || $donnees1['QUESTION_ID']==215 || $donnees1['QUESTION_ID']==216 || $donnees1['QUESTION_ID']==217 || $donnees1['QUESTION_ID']==218 || $donnees1['QUESTION_ID']==219 || $donnees1['QUESTION_ID']==220 || $donnees1['QUESTION_ID']==221)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==196 || $donnees1['QUESTION_ID']==197 || $donnees1['QUESTION_ID']==198 || $donnees1['QUESTION_ID']==199 || $donnees1['QUESTION_ID']==200 || $donnees1['QUESTION_ID']==201 || $donnees1['QUESTION_ID']==202 || $donnees1['QUESTION_ID']==207 || $donnees1['QUESTION_ID']==221)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==203 || $donnees1['QUESTION_ID']==204 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==206 || $donnees1['QUESTION_ID']==208 || $donnees1['QUESTION_ID']==210 || $donnees1['QUESTION_ID']==211 || $donnees1['QUESTION_ID']==212 || $donnees1['QUESTION_ID']==213 || $donnees1['QUESTION_ID']==214 || $donnees1['QUESTION_ID']==215 || $donnees1['QUESTION_ID']==218 || $donnees1['QUESTION_ID']==219)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","15","paie","C","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/61";

?>