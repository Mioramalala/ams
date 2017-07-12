<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=7');

$donnees=$reponse->fetch();

$conclusion_id=$donnees['CONCLUSION_ID'];

echo $conclusion_id;

?>