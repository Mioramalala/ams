<?php
include '../../Connexion.php';

$mail=$_POST['mail'];

$reponse=$bdd->exec('INSERT INTO Tab_Mail (MAIL, MAIL_VERIFE) VALUES ("'.$mail.'",1)');

// if(!$reponse) echo $reponse;

?>