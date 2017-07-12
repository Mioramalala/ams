<?php

include '../../../connexion.php';

$ligne=$_POST['ligne'];
$poste_id=$_POST['poste_id'];
$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT FONCT_ACHAT_A_LIGNE FROM tab_fonction_achat_a WHERE FONCT_ACHAT_A_LIGNE='.$ligne.' AND POSTE_CYCLE_ID='.$poste_id.' AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$data_fin=$donnees['FONCT_ACHAT_A_LIGNE'];

echo $data_fin;
?>