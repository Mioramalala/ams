<?php

include '../../../connexion.php';
 
$mission_id=$_POST['mission_id'];
$cycleAchatId=$_POST['cycleAchatId'];
 
$reponse=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleAchatId);
 
$donnees=$reponse->fetch();

$dataConclus=$donnees['CONCLUSION_COMMENTAIRE'].','.$donnees['CONCLUSION_RISQUE'].',1';

$dataConclusTest=$donnees['CONCLUSION_COMMENTAIRE'];

$reponse1=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleAchatId);

$donnees1=$reponse1->fetch();

$dataSynth=$donnees1['SYNTHESE_COMMENTAIRE'].','.$donnees1['SYNTHESE_RISQUE'].',0';

$dataSynthTest=$donnees1['SYNTHESE_COMMENTAIRE'];

if($dataConclusTest!=""){
	echo $dataConclus;
}
else{
	if($dataSynthTest!=""){
		echo $dataSynth;
	}
	else{
		echo '[Rédiger ici votre conclusion],2,2';
	}
}
?>