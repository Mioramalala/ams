<?php

include '../../../connexion.php';

$synthese_id=$_POST['synthese_id'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'", UTIL_ID="'.$UTIL_ID.'" WHERE SYNTHESE_ID='.$synthese_id.' AND CYCLE_ACHAT_ID=1');

?>