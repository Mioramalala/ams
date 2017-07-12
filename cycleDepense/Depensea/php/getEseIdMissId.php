<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$ese=$donnees['ENTREPRISE_ID'];

echo $ese;
