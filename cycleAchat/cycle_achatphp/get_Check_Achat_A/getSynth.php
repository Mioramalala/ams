<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1');

$donnees=$reponse->fetch();

$dataSynth=$donnees['SYNTHESE_COMMENTAIRE'].','.$donnees['SYNTHESE_RISQUE'].',1';

$dataSynthTest=$donnees['SYNTHESE_COMMENTAIRE'];

if($dataSynthTest==""){
	echo '[Rédiger ici votre Synthèse],0,0';
}
else{
	echo $dataSynth;
}


?>
