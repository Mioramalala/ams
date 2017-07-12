<?php 
 session_start();
 include '../connexion.php';
 $mdp=$_POST['z'];
 $exMdp=$_POST['q'];

	 $reponse=$bdd->query('SELECT  UTIL_ID , UTIL_NOM	FROM  tab_utilisateur WHERE UTIL_MDP="'.$exMdp.'" ');
	 $donnees=$reponse->fetch();
		$id=$donnees['UTIL_ID'];
		$nom=$donnees['UTIL_NOM'];
	
	$req = $bdd->prepare('UPDATE tab_utilisateur SET UTIL_MDP = :mdpNew WHERE UTIL_ID = :id');
	$req->execute(array(
	'mdpNew' => $mdp,
	'id' => $id
	
	));
	//echo 'niova v? '.$id;
?>