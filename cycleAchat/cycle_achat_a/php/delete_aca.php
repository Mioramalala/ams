<?php

include '../../../connexion.php';

$ligne=$_POST['ligne'];
$poste_id=$_POST['poste_id'];
$mission_id=$_POST['mission_id'];
$cycleName=$_POST['cycleName'];

$reponse=$bdd->exec('DELETE FROM tab_fonct_a WHERE FONCT_A_LIGNE='.$ligne.' AND MISSION_ID='.$mission_id.' AND POSTE_CYCLE_ID='.$poste_id.' AND FONCT_A_NOM="'.$cycleName.'"');

if(!$reponse) echo 'DELETE FROM tab_fonct_a WHERE FONCT_A_LIGNE='.$ligne.' AND MISSION_ID='.$mission_id.' AND POSTE_CYCLE_ID='.$poste_id.' AND FONCT_A_NOM='.$cycleName; 
?>