<?php
	@session_start();
	include 'connexion.php';

	$id=$_POST['id'];
	$sql='SELECT * FROM tab_entreprise WHERE ENTREPRISE_ID='.$id.'';
	$req=$bdd->query($sql);
	$tab=$req->fetch();
	echo $tab['ENTREPRISE_DENOMINATION_SOCIAL'];
?>
