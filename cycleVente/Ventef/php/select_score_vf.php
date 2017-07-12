<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=30');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=30 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==403)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==393 || $donnees1['QUESTION_ID']==394 || $donnees1['QUESTION_ID']==395 || $donnees1['QUESTION_ID']==396 || $donnees1['QUESTION_ID']==397 || $donnees1['QUESTION_ID']==398 || $donnees1['QUESTION_ID']==399 || $donnees1['QUESTION_ID']==400 || $donnees1['QUESTION_ID']==401 || $donnees1['QUESTION_ID']==402 || $donnees1['QUESTION_ID']==403 || $donnees1['QUESTION_ID']==404)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==393 || $donnees1['QUESTION_ID']==394 || $donnees1['QUESTION_ID']==397 || $donnees1['QUESTION_ID']==401 || $donnees1['QUESTION_ID']==402 || $donnees1['QUESTION_ID']==404)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==395 || $donnees1['QUESTION_ID']==396 || $donnees1['QUESTION_ID']==398 || $donnees1['QUESTION_ID']==399 || $donnees1['QUESTION_ID']==400)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","30","vente","F","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/28";

?>