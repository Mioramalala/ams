<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$cycleId=$_POST['cycleId'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId);

$donnees=$reponse->fetch();

$dataSynth=$donnees['SYNTHESE_COMMENTAIRE'].','.$donnees['SYNTHESE_RISQUE'].',1';

$dataSynthTest=$donnees['SYNTHESE_COMMENTAIRE'];

if($dataSynthTest!=""){
	echo $dataSynth; 
}
else{
	echo '[Rédiger ici votre Synthèse],0,0';
}
?>