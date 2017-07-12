<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$UTIL_ID=$_SESSION['id'];
$echo_score_imd= $_POST['echo_score_imd'];

$reponse=$bdd->exec('UPDATE tab_synthese SET SCORE = "' .$echo_score_imd .'" ,SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'", UTIL_ID="'.$UTIL_ID.'" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=9');

?>