<?php 
$mission_id=$_POST['mission_id'];
$poste_id=$_POST['poste_id'];
$ligne=$_POST['ligne'];
$result=$_POST['result'];
$cycleName=$_POST['cycleName'];
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$reponse=$bdd->exec('INSERT INTO tab_fonct_a (FONCT_A_LIGNE, FONCT_A_RESULT, MISSION_ID, POSTE_CYCLE_ID, FONCT_A_NOM, UTIL_ID) VALUES ('.$ligne.','.$result.','.$mission_id.','.$poste_id.',"'.$cycleName.'",'.$UTIL_ID.')');

echo 'INSERT INTO tab_fonct_a (FONCT_A_LIGNE, FONCT_A_RESULT, MISSION_ID, POSTE_CYCLE_ID, FONCT_A_NOM, UTIL_ID) VALUES ('.$ligne.','.$result.','.$mission_id.','.$poste_id.',"'.$cycleName.'",'.$UTIL_ID.')';
?>