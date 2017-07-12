<?php

include '../../../connexion.php';
@session_start();
$mission_id= $_SESSION['idMission'];

$reponse=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTE FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=31');

$cpt=0;

$donnees=$reponse->fetch();
$cpt=$donnees['COMPTE'];

echo $cpt;

?>      