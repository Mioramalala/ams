<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse = $bdd->query('SELECT SYNTHESE_COMMENTAIRE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1000000');

$donnees=$reponse['SYNTHESE_COMMENTAIRE'];

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
echo $commentaire;
?>