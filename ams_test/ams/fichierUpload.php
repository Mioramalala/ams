<?php

set_time_limit(0);

//On vérifie si un fichier à bien été choisi et qu'il n'y a pas d'erreur
if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0) {

		$info = pathinfo($_FILES['fichier']['name']);

		move_uploaded_file($_FILES['fichier']['tmp_name'],$_SERVER["DOCUMENT_ROOT"].'/fichier/backup1/'.$_FILES['fichier']['name']);
		
		$chemin   = 'fichier/backup1/'.$_FILES['fichier']['name'];
	
		$message  = "le fichier ".$_FILES['fichier']['name']." a été bien importée sur votre serveur local";

		$host     = 'localhost';
		$username = 'root';
		$password = '';
		$db       = 'tmsconsuams';

		// version du programme mysql éxécutant la commande (à vérifier en local pour chaque machine)
		$programme_mysql = "C:\wamp\bin\mysql\mysql5.6.12\bin\mysql ";

		system($programme_mysql."--host=".$host." --user=".$username." --password=".$password." ".$db." < ".$chemin);

		echo "<br>".$message."<br>";

		header('Location: index.php');

} else /* si il y a eu une erreur */ {
	$message = "Le formulaire n'est pas rempli ou une erreur est survenu.";

	echo "<br>".$message."<br>";
}

?>