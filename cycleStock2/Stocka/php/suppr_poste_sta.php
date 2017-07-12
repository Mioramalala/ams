<?php

include '../../../connexion.php';

$poste_id=$_POST['poste_id'];

$reponse=$bdd->exec('DELETE FROM tab_poste_cycle WHERE POSTE_CLE_ID='.$poste_id.' AND POSTE_CYCLE_NOM="stock"');

$req1='DELETE FROM tab_poste_cycle WHERE POSTE_CLE_ID='.$poste_id.' AND POSTE_CYCLE_NOM="stock")';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
?>