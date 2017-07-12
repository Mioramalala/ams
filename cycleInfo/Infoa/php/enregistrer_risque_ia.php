<?php

@session_start();
include '../../../connexion.php';

$cycle_nom=$_POST['cycle_nom'];
$complexite=$_POST['complexite'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('INSERT INTO tab_sys_info (NOM_CYCLE, MISSION_ID, COMPLEXITE,UTIL_ID) VALUES ("'.$cycle_nom.'","'.$_SESSION['idMission'].'","'.$complexite.'",'.$UTIL_ID.')');

if($reponse) echo 'enregistrer';
?>