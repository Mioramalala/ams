<?php
@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];

$reponse = $bdd->query('SELECT OBJECTIF_ID FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND MISSION_ID='.$_SESSION['idMission']);

$donnees=$reponse->fetch();

echo $donnees['OBJECTIF_ID'];

?>