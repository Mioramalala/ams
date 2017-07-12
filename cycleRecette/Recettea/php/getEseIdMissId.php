<?php

include '../../../connexion.php';
@session_start(); 
$mission_id=$_SESSION['idMission'];


$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$ese=$donnees['ENTREPRISE_ID'];

echo $ese;
?>