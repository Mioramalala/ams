<?php
@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];
$reponse=$_POST['reponse'];

$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_QCM = "'.$reponse.'" WHERE QUESTION_ID='.$question_id.' AND MISSION_ID='.$_SESSION['idMission']);

if($reponse) echo 'update';

?>