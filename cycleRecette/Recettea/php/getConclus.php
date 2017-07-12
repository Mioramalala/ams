<?php

include '../../../connexion.php';
@session_start();
$mission_id= $_SESSION['idMission'];
$cycle_id=$_POST['cycle_id'];
 
$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE ');
 
$donnees=$reponse->fetch();

?>