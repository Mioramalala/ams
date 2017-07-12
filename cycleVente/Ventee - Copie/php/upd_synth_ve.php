<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];

$reponse=$bdd->exec('UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=29');

?>