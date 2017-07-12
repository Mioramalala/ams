<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$cycleId=$_POST['cycleId'];

$reponse=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId);

$donnees=$reponse->fetch();

$data=$donnees['CONCLUSION_RISQUE'].'*1';

$dataTest=$donnees['CONCLUSION_COMMENTAIRE'];

if($dataTest==""){
	$data='0*0';
}

echo $data;

?>