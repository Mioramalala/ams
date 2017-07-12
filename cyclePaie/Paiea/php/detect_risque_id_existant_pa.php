<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$poste_id=$_POST['poste_id'];

$reponse = $bdd->query('SELECT NIVEAU_RISQUE_ID FROM tab_niveau_risque_a WHERE POSTE_CYCLE_ID='.$poste_id.' AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

echo $donnees['NIVEAU_RISQUE_ID'];
?>