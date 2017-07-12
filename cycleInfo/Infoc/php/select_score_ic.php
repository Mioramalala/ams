<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$mission_id=$_SESSION['idMission'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=33');
$donnees=$reponse->fetch();
$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND MISSION_ID='.$mission_id);
$score_final=0;
$score=0;

while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==454 || $donnees1['QUESTION_ID']==455 || $donnees1['QUESTION_ID']==457 || $donnees1['QUESTION_ID']==458)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==454 || $donnees1['QUESTION_ID']==455 || $donnees1['QUESTION_ID']==456 || $donnees1['QUESTION_ID']==457 || $donnees1['QUESTION_ID']==458 || $donnees1['QUESTION_ID']==459 || $donnees1['QUESTION_ID']==460 || $donnees1['QUESTION_ID']==461)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==449 || $donnees1['QUESTION_ID']==450 || $donnees1['QUESTION_ID']==453 || $donnees1['QUESTION_ID']==459 || $donnees1['QUESTION_ID']==460)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==448 || $donnees1['QUESTION_ID']==451 || $donnees1['QUESTION_ID']==452 || $donnees1['QUESTION_ID']==456 || $donnees1['QUESTION_ID']==461)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","33","Information","C","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/32";

?>