<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==142 || $donnees1['QUESTION_ID']==143 || $donnees1['QUESTION_ID']==144 || $donnees1['QUESTION_ID']==148 || $donnees1['QUESTION_ID']==149)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==135 || $donnees1['QUESTION_ID']==136 || $donnees1['QUESTION_ID']==137 || $donnees1['QUESTION_ID']==138 || $donnees1['QUESTION_ID']==139 || $donnees1['QUESTION_ID']==140 || $donnees1['QUESTION_ID']==141 || $donnees1['QUESTION_ID']==142 || $donnees1['QUESTION_ID']==143 || $donnees1['QUESTION_ID']==144 || $donnees1['QUESTION_ID']==145 || $donnees1['QUESTION_ID']==146 || $donnees1['QUESTION_ID']==147 || $donnees1['QUESTION_ID']==148 || $donnees1['QUESTION_ID']==149 || $donnees1['QUESTION_ID']==150 || $donnees1['QUESTION_ID']==151)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==150 || $donnees1['QUESTION_ID']==151)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==135 || $donnees1['QUESTION_ID']==136 || $donnees1['QUESTION_ID']==137 || $donnees1['QUESTION_ID']==138 || $donnees1['QUESTION_ID']==139 || $donnees1['QUESTION_ID']==140 || $donnees1['QUESTION_ID']==141 || $donnees1['QUESTION_ID']==145 || $donnees1['QUESTION_ID']==146 || $donnees1['QUESTION_ID']==147)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","12","stock","C","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/39";


?>