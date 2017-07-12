<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTE FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=13');

$cpt=0;

$donnees=$reponse->fetch();
$cpt=$donnees['COMPTE'];

echo $cpt;

?>      