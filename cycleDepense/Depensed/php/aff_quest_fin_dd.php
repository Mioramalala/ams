<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT MAX(QUESTION_ID) AS COMPTE FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=24');

$donnees=$reponse->fetch();

$ligne=$donnees['COMPTE'];

if($ligne=="") echo $ligne=304;
else echo $ligne;

?>