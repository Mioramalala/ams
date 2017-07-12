<?php
@session_start();
include '../../../connexion.php';

$reponse = $bdd->query('SELECT COUNT(id) AS COMPTE FROM tab_sys_info1 WHERE MISSION_ID='.$_SESSION['idMission']);

$donnees=$reponse->fetch();

echo $donnees['COMPTE'];

?>