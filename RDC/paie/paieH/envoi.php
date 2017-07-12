
<?php
	session_start();
	include '../../../connexion.php';

	if(isset($_FILES['fichier'])){
		
		$fichier = mysql_real_escape_string(htmlentities($_FILES['fichier']['name']));
		move_uploaded_file($_FILES['fichier']['tmp_name'], "renvoi/".$fichier);
	}
?>