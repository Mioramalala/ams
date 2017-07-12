<?php

include '../../../connexion.php';
@session_start();

$question_id=$_POST['question_id'];
$risque=$_POST['risque'];

//tinay editer
$mission_id= $_SESSION['idMission'];

$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_RISQUE = "'.$risque.'" WHERE CYCLE_ACHAT_ID= 32 AND QUESTION_ID= "'.$question_id .'" AND MISSION_ID= "' .$mission_id .'"');

if($reponse) echo 'update';

?>