<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=6');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=6 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==58 || $donnees1['QUESTION_ID']==59 || $donnees1['QUESTION_ID']==67)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==55 || $donnees1['QUESTION_ID']==56 || $donnees1['QUESTION_ID']==57 || $donnees1['QUESTION_ID']==58 || $donnees1['QUESTION_ID']==59 || $donnees1['QUESTION_ID']==60 || $donnees1['QUESTION_ID']==61 || $donnees1['QUESTION_ID']==62 || $donnees1['QUESTION_ID']==63 || $donnees1['QUESTION_ID']==64 || $donnees1['QUESTION_ID']==65 || $donnees1['QUESTION_ID']==66 || $donnees1['QUESTION_ID']==67 || $donnees1['QUESTION_ID']==68 || $donnees1['QUESTION_ID']==69)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==55 || $donnees1['QUESTION_ID']==56 || $donnees1['QUESTION_ID']==57)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==60 || $donnees1['QUESTION_ID']==61 || $donnees1['QUESTION_ID']==62 || $donnees1['QUESTION_ID']==63 || $donnees1['QUESTION_ID']==64 || $donnees1['QUESTION_ID']==65 || $donnees1['QUESTION_ID']==66 || $donnees1['QUESTION_ID']==68 || $donnees1['QUESTION_ID']==69)){
		$score=3;
	}
	$score_final=$score_final+$score;
}

$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","6","achat","F","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/36";

?>