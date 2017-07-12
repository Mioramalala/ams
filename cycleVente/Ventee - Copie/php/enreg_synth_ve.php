<?php
include '../../../connexion.php';

$mission_id=$_POST['mission_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];

$reponse=$bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, CYCLE_ACHAT_ID, MISSION_ID) VALUE ("'.$commentaire.'","'.$risque.'",29,'.$mission_id.')');

?>