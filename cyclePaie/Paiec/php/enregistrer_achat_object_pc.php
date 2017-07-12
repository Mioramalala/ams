<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$mission_id=$_POST['mission_id'];
$question_id=$_POST['question_id'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_COMMENTAIRE, OBJECTIF_QCM, CYCLE_ACHAT_ID, MISSION_ID, QUESTION_ID, UTIL_ID) VALUES ("'.$commentaire.'","'.$qcm.'",15,'.$mission_id.','.$question_id.','.$UTIL_ID.')');

?>