<?php

include '../../../connexion.php';

$cpt=$_POST['cpt'];
$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id.' AND QUESTION_ID='.$cpt);

$donnees=$reponse->fetch();

if(!$reponse) echo 'SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id.' AND QUESTION_ID='.$cpt;

$dataComment=$donnees['OBJECTIF_COMMENTAIRE'].','.$donnees['OBJECTIF_QCM'];

echo $dataComment; 

?>