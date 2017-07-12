<?php

include '../../../connexion.php';
$cycle_id=$_POST['cycle_id'];
@session_start();
$mission_id=$_SESSION['idMission'];

$reponse = $bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE CYCLE_ACHAT_ID=1000 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$conclusion_id=$donnees['CONCLUSION_ID'];

echo $conclusion_id;

?>