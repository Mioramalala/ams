<?php

include '../../../connexion.php';

$question_id=$_POST['question_id'];
$reponse=$_POST['reponse'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_QCM = "'.$reponse.'", UTIL_ID="'.$UTIL_ID.'" WHERE QUESTION_ID='.$question_id);

if($reponse) echo 'update';

?>