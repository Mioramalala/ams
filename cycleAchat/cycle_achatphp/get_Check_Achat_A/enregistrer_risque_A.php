<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$poste_id=$_POST['poste_id'];
$risque=$_POST['risque'];
$UTIL_ID=$_SESSION['id'];

//à verfier
//$reponse = $bdd->exec('INSERT INTO tab_niveau_risque_A (NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID, UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');

//tinay editer
$reponse = $bdd->exec('INSERT INTO tab_niveau_risque_a(NIVEAU_RISQUE_NOM, POSTE_CYCLE_ID, MISSION_ID, UTIL_ID) VALUES ("'.$risque.'",'.$poste_id.','.$mission_id.','.$UTIL_ID.')');

?>