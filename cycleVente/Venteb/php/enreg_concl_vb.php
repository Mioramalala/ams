<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$mission_id=$_POST['mission_id'];
$UTIL_ID = $_SESSION['id'];

$reponse=$bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUE ("'.$commentaire.'","'.$risque.'",'.$mission_id.',26,'.$UTIL_ID.')');

?>