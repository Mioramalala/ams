<?php

include '../../../connexion.php';
 
$mission_id=$_POST['mission_id'];
$cycle_id=$_POST['cycle_id'];
 
$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE ');
 
$donnees=$reponse->fetch();

?>