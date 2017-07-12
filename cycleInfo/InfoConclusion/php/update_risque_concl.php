<?php
@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];
$risque=$_POST['risque'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_RISQUE = "'.$risque.'", UTIL_ID="'.$UTIL_ID.'" WHERE QUESTION_ID='.$question_id.' AND MISSION_ID='.$_SESSION['idMission']);

if($reponse) echo 'update';

?>