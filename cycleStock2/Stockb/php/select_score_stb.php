<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=11');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=11 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	 if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==117 || $donnees1['QUESTION_ID']==118 || $donnees1['QUESTION_ID']==119 || $donnees1['QUESTION_ID']==120 || $donnees1['QUESTION_ID']==121 || $donnees1['QUESTION_ID']==122 || $donnees1['QUESTION_ID']==123 || $donnees1['QUESTION_ID']==124 || $donnees1['QUESTION_ID']==125 || $donnees1['QUESTION_ID']==126 || $donnees1['QUESTION_ID']==127 || $donnees1['QUESTION_ID']==128 || $donnees1['QUESTION_ID']==129 || $donnees1['QUESTION_ID']==130 || $donnees1['QUESTION_ID']==131 || $donnees1['QUESTION_ID']==132 || $donnees1['QUESTION_ID']==133 || $donnees1['QUESTION_ID']==134)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==117 || $donnees1['QUESTION_ID']==118 || $donnees1['QUESTION_ID']==119 || $donnees1['QUESTION_ID']==120 || $donnees1['QUESTION_ID']==121 || $donnees1['QUESTION_ID']==122 || $donnees1['QUESTION_ID']==123 || $donnees1['QUESTION_ID']==126 || $donnees1['QUESTION_ID']==127 || $donnees1['QUESTION_ID']==128 || $donnees1['QUESTION_ID']==129 || $donnees1['QUESTION_ID']==130 || $donnees1['QUESTION_ID']==131 || $donnees1['QUESTION_ID']==132 || $donnees1['QUESTION_ID']==133 || $donnees1['QUESTION_ID']==134)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==124 || $donnees1['QUESTION_ID']==125)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","11","stock","B","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/38";

?>