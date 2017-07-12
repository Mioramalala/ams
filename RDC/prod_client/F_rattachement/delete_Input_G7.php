<?php

include '../../../connexion.php';

$date=$_POST['date'];
$facture=$_POST['facture'];
$client=$_POST['client'];
$montant=$_POST['montant'];
$tva=$_POST['tva'];
$observation=$_POST['observation'];
$mission_id=$_POST['mission_id'];

$rep=$bdd->exec('DELETE FROM tab_g7 WHERE G7_DATE="'.$date.'" AND G7_FACTURE="'.$facture.'" AND G7_CLIENT="'.$client.'" AND G7_MONTANT="'.$montant.'" AND G7_TVA="'.$tva.'" AND G7_OBSERVATION="'.$observation.'" AND MISSION_ID='.$mission_id);

$req1='DELETE FROM tab_g7 WHERE G7_DATE="'.$date.'" AND G7_FACTURE="'.$facture.'" AND G7_CLIENT="'.$client.'" AND G7_MONTANT="'.$montant.'" AND G7_TVA="'.$tva.'" AND G7_OBSERVATION="'.$observation.'" AND MISSION_ID='.$mission_id;
		
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
?>