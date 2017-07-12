<?php
@session_start();
$mission_id =$_SESSION['idMission'];
include '../../../connexion.php';

$cycleId=$_POST['cycleId'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId);

$donnees=$reponse->fetch();

$data=$donnees['SYNTHESE_COMMENTAIRE'].'*'.$donnees['SYNTHESE_RISQUE'].'*1';

$dataTest=$donnees['SYNTHESE_COMMENTAIRE'];

/*if($dataTest==""){
	$data='["Rédiger ici votre synthèse"]*0*0';
}*/

echo $data;

?>