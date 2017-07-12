<?php 
	include '../connexion.php';
	$iduser=$_POST["id"];
	$nom=$_POST["a"];
	$login=$_POST["z"];
	$mdp=$_POST["e"];
	$stat=$_POST["r"];
	$actif=$_POST["t"];
	
	//echo $iduser.$nom.$login.$mdp.$stat.$actif;
	$req = $bdd->prepare('UPDATE  tab_utilisateur SET UTIL_NOM = :nom,
		UTIL_LOGIN = :login,UTIL_MDP=:mdp,UTIL_STATUT=:stat,UTIL_ACTIF=:actif
		WHERE UTIL_ID = :iduser');
		$req->execute(array(
		'nom' => $nom,
		'login' => $login,
		'mdp' => $mdp,
		'stat' => $stat,
		'actif' => $actif,
		'iduser' => $iduser
		));
	
?>
