<?php
@session_start();
include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];

$mission_id=$_SESSION['idMission'];
$UTIL_ID = $_SESSION['id'];

$reponse= $bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUE ("'.$commentaire.'","'.$risque.'", "'.$mission_id.'", 29, "'.$UTIL_ID .'")');
if($reponse) echo 'conclusion enregistre';
?>