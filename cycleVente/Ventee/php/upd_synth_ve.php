<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];

$echo_score_ve= $_POST['echo_score_ve'];

$reponse=$bdd->exec('UPDATE tab_synthese SET SCORE = "' .$echo_score_ve .'", SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'" WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=29');

?>