<?php 
include '../../connexion.php';

$missionQuestionIdB=$_POST['missionQuestionIdB'];

$reponse = $bdd->query('SELECT QUESTION_ACHAT_B_ID FROM tab_mission_question_b WHERE MISSION_QUESTION_B_ID='.$missionQuestionIdB);

$donnees= $reponse->fetch();

echo $donnees['QUESTION_ACHAT_B_ID']; 
?>