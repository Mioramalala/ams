<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=26');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==320 || $donnees1['QUESTION_ID']==321 || $donnees1['QUESTION_ID']==322 || $donnees1['QUESTION_ID']==323)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==318 || $donnees1['QUESTION_ID']==319 || $donnees1['QUESTION_ID']==320 || $donnees1['QUESTION_ID']==321 || $donnees1['QUESTION_ID']==322 || $donnees1['QUESTION_ID']==323 || $donnees1['QUESTION_ID']==324 || $donnees1['QUESTION_ID']==325 || $donnees1['QUESTION_ID']==326 || $donnees1['QUESTION_ID']==327 || $donnees1['QUESTION_ID']==328 || $donnees1['QUESTION_ID']==329 || $donnees1['QUESTION_ID']==330 || $donnees1['QUESTION_ID']==331 || $donnees1['QUESTION_ID']==332 || $donnees1['QUESTION_ID']==333 || $donnees1['QUESTION_ID']==334)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==324 || $donnees1['QUESTION_ID']==325 || $donnees1['QUESTION_ID']==326 || $donnees1['QUESTION_ID']==327 || $donnees1['QUESTION_ID']==328 || $donnees1['QUESTION_ID']==334)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==318 || $donnees1['QUESTION_ID']==319 || $donnees1['QUESTION_ID']==329 || $donnees1['QUESTION_ID']==330 || $donnees1['QUESTION_ID']==331 || $donnees1['QUESTION_ID']==332 || $donnees1['QUESTION_ID']==333)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
$reponse_score=$bdd->query('INSERT INTO tab_score(TOTAL_SCORE,CYCLE_ACHAT_ID,CYCLE_SCORE,OBJECTIF_SCORE,MISSION_ID,UTIL_ID) value("'.$score_final.'","26","vente","B","'.$mission_id.'","'.$UTIL_ID.'") ');

echo $score_final."/37";

?>
