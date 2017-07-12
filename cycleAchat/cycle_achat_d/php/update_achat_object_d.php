<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$question_id=$_POST['question_id'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",OBJECTIF_QCM="'.$qcm.'", UTIL_ID="'.$UTIL_ID.'" WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=4');

echo 'tonga';
?>