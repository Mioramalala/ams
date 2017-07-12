<?php
@session_start();
$mission_id=$_SESSION['idMission'];
$cycleId=$_POST['cycleId'];

include '../../../connexion.php';




$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId);

$donnees=$reponse->fetch();

$data=$donnees['SYNTHESE_COMMENTAIRE'].'*'.$donnees['SYNTHESE_RISQUE'].'*1';

$dataTest=$donnees['SYNTHESE_COMMENTAIRE'];



echo $data;

?>