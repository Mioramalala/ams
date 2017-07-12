<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=13');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=13 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch())
{
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==159 || $donnees1['QUESTION_ID']==161 || $donnees1['QUESTION_ID']==167 || $donnees1['QUESTION_ID']==180)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==152 || $donnees1['QUESTION_ID']==153 || $donnees1['QUESTION_ID']==154 || $donnees1['QUESTION_ID']==155 || $donnees1['QUESTION_ID']==156 || $donnees1['QUESTION_ID']==157 || $donnees1['QUESTION_ID']==158 || $donnees1['QUESTION_ID']==159 || $donnees1['QUESTION_ID']==160 || $donnees1['QUESTION_ID']==161 || $donnees1['QUESTION_ID']==162 || $donnees1['QUESTION_ID']==163 || $donnees1['QUESTION_ID']==164 || $donnees1['QUESTION_ID']==165 || $donnees1['QUESTION_ID']==166 || $donnees1['QUESTION_ID']==167 || $donnees1['QUESTION_ID']==168 || $donnees1['QUESTION_ID']==169 || $donnees1['QUESTION_ID']==170 || $donnees1['QUESTION_ID']==171 || $donnees1['QUESTION_ID']==172 || $donnees1['QUESTION_ID']==173 || $donnees1['QUESTION_ID']==174 || $donnees1['QUESTION_ID']==175 || $donnees1['QUESTION_ID']==176 || $donnees1['QUESTION_ID']==177 || $donnees1['QUESTION_ID']==178 || $donnees1['QUESTION_ID']==179 || $donnees1['QUESTION_ID']==180)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==154 || $donnees1['QUESTION_ID']==155 || $donnees1['QUESTION_ID']==156 || $donnees1['QUESTION_ID']==160 || $donnees1['QUESTION_ID']==164 || $donnees1['QUESTION_ID']==165 || $donnees1['QUESTION_ID']==168 || $donnees1['QUESTION_ID']==169 || $donnees1['QUESTION_ID']==172 || $donnees1['QUESTION_ID']==173 || $donnees1['QUESTION_ID']==174 || $donnees1['QUESTION_ID']==175 || $donnees1['QUESTION_ID']==176)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==152 || $donnees1['QUESTION_ID']==153 || $donnees1['QUESTION_ID']==157 || $donnees1['QUESTION_ID']==158 || $donnees1['QUESTION_ID']==162 || $donnees1['QUESTION_ID']==163 || $donnees1['QUESTION_ID']==166 || $donnees1['QUESTION_ID']==170 || $donnees1['QUESTION_ID']==171 || $donnees1['QUESTION_ID']==177 || $donnees1['QUESTION_ID']==178 || $donnees1['QUESTION_ID']==179)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","13","stock","D","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/66";

?>
