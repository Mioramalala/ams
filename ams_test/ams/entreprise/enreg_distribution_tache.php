<?php
include '../../connexion.php';
	$labNbr=$_POST['labNbr'];
	$miakatra=$_POST['miakatra'];
	
	$reponse=$bdd->exec('INSERT INTO tab_distribution_tache(nom_tache,UTIL_ID,MISSION_ID) VALUES ("'.$labNbr.'","'.$miakatra.'")');
?>