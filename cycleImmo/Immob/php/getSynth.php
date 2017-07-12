<?php

include '../../../connexion.php';

@session_start();
$mission_id=@$_SESSION['idMission'];
$cycleId=$_POST['cycleId'];



$reponse=$bdd->query("SELECT COUNT(OBJECTIF_ID) AS COMPTE FROM tab_objectif WHERE MISSION_ID='$mission_id' AND CYCLE_ACHAT_ID='7'");
$cpt=0;
$donnees=$reponse->fetch();
$cpt=$donnees['COMPTE'];
if($cpt==23)
{
			$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId);
			$donnees=$reponse->fetch();
			$dataSynth=$donnees['SYNTHESE_COMMENTAIRE'].'*'.$donnees['SYNTHESE_RISQUE'].'*1';
			$dataSynthTest=$donnees['SYNTHESE_COMMENTAIRE'];

			echo $dataSynth;
}







/*if($dataSynthTest!=""){
	echo $dataSynth; 
}
else{
	echo '[Rédiger ici votre Synthèse],0,0';
}*/
?>