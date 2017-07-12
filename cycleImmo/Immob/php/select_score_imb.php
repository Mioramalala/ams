<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

//$mission_id=$_POST['mission_id']; 
$mission_id=@$_SESSION['idMission'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=7');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=7 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==72 || $donnees1['QUESTION_ID']==75 || $donnees1['QUESTION_ID']==78 || $donnees1['QUESTION_ID']==79 || $donnees1['QUESTION_ID']==82)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==70 || $donnees1['QUESTION_ID']==71 || $donnees1['QUESTION_ID']==72 || $donnees1['QUESTION_ID']==73 || $donnees1['QUESTION_ID']==74 || $donnees1['QUESTION_ID']==75 || $donnees1['QUESTION_ID']==76 || $donnees1['QUESTION_ID']==77 || $donnees1['QUESTION_ID']==78 || $donnees1['QUESTION_ID']==79 || $donnees1['QUESTION_ID']==80 || $donnees1['QUESTION_ID']==81 || $donnees1['QUESTION_ID']==82 || $donnees1['QUESTION_ID']==83 || $donnees1['QUESTION_ID']==84 || $donnees1['QUESTION_ID']==85 || $donnees1['QUESTION_ID']==86 || $donnees1['QUESTION_ID']==87 || $donnees1['QUESTION_ID']==88 || $donnees1['QUESTION_ID']==89 || $donnees1['QUESTION_ID']==90 || $donnees1['QUESTION_ID']==91 || $donnees1['QUESTION_ID']==92)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==71 || $donnees1['QUESTION_ID']==74 || $donnees1['QUESTION_ID']==89 || $donnees1['QUESTION_ID']==90 || $donnees1['QUESTION_ID']==91)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==70 || $donnees1['QUESTION_ID']==73 || $donnees1['QUESTION_ID']==76 || $donnees1['QUESTION_ID']==77 || $donnees1['QUESTION_ID']==80 || $donnees1['QUESTION_ID']==81 || $donnees1['QUESTION_ID']==83 || $donnees1['QUESTION_ID']==84 || $donnees1['QUESTION_ID']==85 || $donnees1['QUESTION_ID']==86 || $donnees1['QUESTION_ID']==87 || $donnees1['QUESTION_ID']==88 || $donnees1['QUESTION_ID']==92)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","7","immoCorpIncorp","B","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/54";

?>