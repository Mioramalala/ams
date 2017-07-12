<?php 
include '../../Connexion.php';

$authent_Login = $_POST['authent_Login'];
$reponse       = $bdd->query('SELECT COUNT(SOUVENIR_LOGIN) AS COMPTE FROM Tab_souvenir');
$donnees       = $reponse->fetch();

if($donnees['COMPTE'] == 0)
	$reponseInsert = $bdd->exec('INSERT INTO Tab_souvenir (SOUVENIR_ID, SOUVENIR_LOGIN) VALUES (1,"'.$authent_Login.'")');
$reponseInsert = $bdd->exec('UPDATE Tab_souvenir SET SOUVENIR_LOGIN = "'.$authent_Login.'"');

?>