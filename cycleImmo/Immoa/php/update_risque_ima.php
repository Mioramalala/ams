<?php
@session_start();
$mission_id=$_SESSION['idMission'];

include '../../../connexion.php';

$risque_id=$_POST['risque_id'];
$risque=$_POST['risque'];
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('UPDATE tab_niveau_risque_a SET NIVEAU_RISQUE_NOM = "'.$risque.'", UTIL_ID="'.$UTIL_ID.'" WHERE MISSION_ID= "' .$mission_id .'" AND NIVEAU_RISQUE_ID="'.$risque_id .'"');

if(!$reponse)
echo 'UPDATE tab_niveau_risque_a SET NIVEAU_RISQUE_NOM = "'.$risque.'", UTIL_ID="'.$UTIL_ID.'" WHERE NIVEAU_RISQUE_ID='.$risque_A_id;

?>