<?php 
 session_start();
 include '../connexion.php';
 $mdp=$_POST['a'];
 $v="";

 // echo $user;
 
 $reponse=$bdd->query('SELECT  UTIL_ID	,UTIL_MDP FROM  tab_utilisateur WHERE UTIL_MDP="'.$mdp.'" ');
 
 $donnees=$reponse->fetch();
if(isset($donnees['UTIL_MDP'])){
		
	
		$v=1;
	
	}
	else{
		$v=0;
		}
		echo $v;

?>

