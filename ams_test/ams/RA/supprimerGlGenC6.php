<?php
	session_start();
	include 'connexionexcel.php';
	include '../connexion.php';
	$annee=$_POST['annee'];
	$mission_id=$_POST['mission_id1'];

	$comptesConcernes=explode("-", $_POST['comptesConcernes']);
	
	$queryDel='delete from tab_gl_genc6 where 
	GL_GENC6_COMPTES>='.$comptesConcernes[0].'
	AND GL_GENC6_COMPTES<='.$comptesConcernes[1].'	
	AND MISSION_ID='.$mission_id;
	$reponseDel=$bdd->exec($queryDel);
	
  ?>
