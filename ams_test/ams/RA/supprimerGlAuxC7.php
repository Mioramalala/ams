<?php
	session_start();
	include 'connexionexcel.php';
	include '../connexion.php';
	$annee=$_POST['annee'];
	$mission_id=$_POST['mission_id1'];
	
	$queryDel='delete from tab_gl_auxc7 where MISSION_ID='.$mission_id;
	$reponseDel=$bdd->exec($queryDel);
	
 ?>