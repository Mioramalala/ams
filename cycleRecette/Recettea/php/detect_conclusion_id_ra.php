<?php

include '../../../connexion.php';

$cycle_id=$_POST['cycle_id'];
$mission_id=$_POST['mission_id'];

$reponse = $bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE CYCLE_ACHAT_ID=100000 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$conclusion_id=$donnees['CONCLUSION_ID'];

echo $conclusion_id;

?>