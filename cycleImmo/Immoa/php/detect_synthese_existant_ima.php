<?php

include '../../../connexion.php';
@session_start();
$mission_id=$_SESSION['idMission'];

$reponse = $bdd->query("SELECT SYNTHESE_ID FROM tab_synthese WHERE MISSION_ID='$mission_id' AND CYCLE_ACHAT_ID='1000'");

$donnees=$reponse->fetch();

$synthese_id=$donnees['SYNTHESE_ID'];

echo $synthese_id;

?>