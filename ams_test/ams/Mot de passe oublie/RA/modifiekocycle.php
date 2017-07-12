<?php 
 include '../connexion.php';
 $numeko=$_POST['num'];
 $idko=$_POST['id'];
 $reponse=$bdd->exec('UPDATE tab_balance_general SET BALANCE_GENERAL_CYCLE="'.$numeko.'" WHERE BALANCE_GENERAL_ID='.$idko);
 ?>