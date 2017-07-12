<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$question_id=$_POST['question_id'];
$cycle_achat_id=$_POST['cycle_achat_id'];

$reponse = $bdd->query('SELECT OBJECTIF_ID FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID='.$cycle_achat_id);

$donnees=$reponse->fetch();

$objectif_id=$donnees['OBJECTIF_ID'];

echo $objectif_id;

?>