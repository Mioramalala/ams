<?php 
	
	@session_start();
	include 'connexion.php';

	if(@$_SESSION["nom"]=="Administrateur" || @$_SESSION["nom"]=="Super-Admin"){
		print "1";
		exit();

	}else if(@$_POST["mission_id"]!="") {

		$UTIL_ID= @$_SESSION["id"];
		$mission_id= @$_POST["mission_id"];
		
		$sql= "select UTIL_ID from tab_superviseur where MISSION_ID='$mission_id' and UTIL_ID='$UTIL_ID'";

		//print $sql;
		$reponse=$bdd->query($sql);
		$donnees=$reponse->fetch();
		$status=$donnees['UTIL_ID'];
		print $status;
	}

	//print "$UTIL_ID";
	/*$nom=$_POST["nom"];


	$reponse=$bdd->query('SELECT  UTIL_STATUT FROM  tab_utilisateur WHERE UTIL_NOM="'.$nom.'" ');
	$donnees=$reponse->fetch();
	$status=$donnees['UTIL_STATUT'];
	*/
	echo $status;
?>