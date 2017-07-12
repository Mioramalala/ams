<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$conclusion_id=$_POST['conclusion_id'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE="'.$commentaire.'", CONCLUSION_RISQUE="'.$risque.'", UTIL_ID="'.$UTIL_ID.'" WHERE CONCLUSION_ID='.$conclusion_id.' AND CYCLE_ACHAT_ID=1');

?>