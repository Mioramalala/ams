<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse0=$bdd->query('SELECT COUNT(FONCT_ACHAT_A_ID) AS COMPTE FROM tab_fonction_achat_a WHERE MISSION_ID='.$mission_id);

$donnees0=$reponse0->fetch();

$compte0=$donnees0['COMPTE'];

if($compte0!=0){

$reponse=$bdd->exec('DELETE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10000');

$reponse1=$bdd->exec('DELETE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10000');
}

echo $compte0;
?>