<?php

@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];
$val1=$_POST['val1']; // effectif
$val2=$_POST['val2']; // degres
$val3=$_POST['val3']; // cout
$UTIL_ID=$_SESSION['id'];

$reponse = $bdd->exec('INSERT INTO tab_sys_info1 (MISSION_ID, VAL, UTIL_ID) VALUES ("'.$_SESSION['idMission'].'","'.$val1.'",'.$UTIL_ID.')');
$reponse = $bdd->exec('INSERT INTO tab_sys_info1 (MISSION_ID, VAL, UTIL_ID) VALUES ("'.$_SESSION['idMission'].'","'.$val2.'",'.$UTIL_ID.')');
$reponse = $bdd->exec('INSERT INTO tab_sys_info1 (MISSION_ID, VAL, UTIL_ID) VALUES ("'.$_SESSION['idMission'].'","'.$val3.'",'.$UTIL_ID.')');

if($reponse) echo 'enregistrer';
?>