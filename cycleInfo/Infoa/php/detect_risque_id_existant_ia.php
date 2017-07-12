<?php
@session_start();
include '../../../connexion.php';

$cycle_nom=$_POST['cycle_nom'];

$reponse = $bdd->query('SELECT ID_INFO FROM tab_sys_info WHERE NOM_CYCLE="'.$cycle_nom.'" AND MISSION_ID='.$_SESSION['idMission']);

$donnees=$reponse->fetch();

echo $donnees['ID_INFO'];

?>