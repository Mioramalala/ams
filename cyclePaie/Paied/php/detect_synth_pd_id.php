<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_ID FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=16');

$donnees=$reponse->fetch();

$synthese_id_b=$donnees['SYNTHESE_ID'];

echo $synthese_id_b;

?>