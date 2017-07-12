<?php

include '../../../connexion.php';

$poste_id=$_POST['poste_id'];
$mission_id=$_POST['mission_id'];
$UTIL_ID = $_SESSION['id'];

$reponse=$bdd->exec('INSERT INTO tab_poste_cycle (POSTE_CYCLE_NOM, POSTE_CLE_ID, MISSION_ID, UTIL_ID) VALUE ("achat",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');

?>