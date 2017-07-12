<?php 
include '../../../connexion.php';
@session_start();
$mission_id =$_SESSION['idMission'];
$reponse=$bdd->query('SELECT MAX(QUESTION_ID) AS COMPTE FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=11');

$donnees=$reponse->fetch();

$ligne=$donnees['COMPTE'];

if($ligne=="") 
echo $ligne=117;
else 
echo $ligne;
?>