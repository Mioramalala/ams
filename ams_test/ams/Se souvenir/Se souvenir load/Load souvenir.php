<?php

include 'Connexion.php';

function loadSouvenirLogin() {

	$reponse        = $bdd->query('SELECT SOUVENIR_LOGIN FROM Tab_souvenir');
	$souvenir_Login = "";

	while($donnees = $reponse->fetch()){
		$souvenir_Login = $donnees['SOUVENIR_LOGIN'];
	}
	
	return $souvenir_Login;
}
?>