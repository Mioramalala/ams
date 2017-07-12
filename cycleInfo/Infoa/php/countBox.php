<?php
@session_start();
include '../../../connexion.php';

$reponse = $bdd->query('SELECT COUNT(ID_INFO) AS COMPTE FROM tab_sys_info WHERE MISSION_ID='.$_SESSION['idMission']);

$donnees=$reponse->fetch();

echo $donnees['COMPTE'];

?>