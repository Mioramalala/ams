<?php
	session_start();
	include 'connexionexcel.php';
	include '../connexion.php';
	$annee=$_POST['annee'];
	$mission_id=$_POST['mission_id1'];
	
	$queryDel='delete from tab_gl_genc4 where MISSION_ID='.$mission_id;
	$reponseDel=$bdd->exec($queryDel);


	$queryDel='delete from tab_somme_gl_gen where MISSION_ID='.$mission_id;
	$reponseDel=$bdd->exec($queryDel);
	
  ?>
