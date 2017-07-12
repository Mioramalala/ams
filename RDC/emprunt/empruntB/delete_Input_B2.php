<?php

include '../../../connexion.php';

$date=$_POST['date'];
$libelle=$_POST['libelle'];
$commentaire=$_POST['commentaire'];
$compte=$_POST['compte'];
$montant=$_POST['montant'];
$mission_id=$_POST['mission_id'];

$req='DELETE FROM tab_i3 WHERE COMPTE="'.$compte.'" AND DATE="'.$date.'"  AND LIBELLE="'.$libelle.'" 
 AND COMMENTAIRE="'.$commentaire.'" AND MONTANT="'.$montant.'" AND MISSION_ID='.$mission_id;
$rep=$bdd->exec($req);

		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
?>