<?php 
	 include '../connexion.php';
	 $numeko=$_POST['num'];
	 $idko=$_POST['id'];
	 $cycleko=$_POST['cycle'];
	 $numeko2=$_POST['num2'];
	 $reponse=$bdd->exec('UPDATE tab_balance_general SET BALANCE_GENERAL_COMPTE_CONCERNE="'.$numeko.'",BALANCE_GENERAL_COMPTE_CONCERNE2="'.$numeko2.'",BALANCE_GENERAL_CYCLE="'.$cycleko.'" WHERE BALANCE_GENERAL_ID='.$idko);
 ?>
