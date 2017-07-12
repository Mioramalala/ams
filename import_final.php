<?php

include './connexion.php';

//On vérifie si un fichier à bien été choisis et qu'il n'y a pas d'erreur
if (isset($_FILES['fichier_final']) AND $_FILES['fichier_final']['error'] == 0)
{
		set_time_limit(0);
	
		$info = pathinfo($_FILES['fichier_final']['name']);
		move_uploaded_file($_FILES['fichier_final']['tmp_name'],$_SERVER["DOCUMENT_ROOT"].'/fichier/save_missionFin/'.$_FILES['fichier_final']['name']);
		$chemin='fichier/save_missionFin/'.$_FILES['fichier_final']['name'];
		//$message = "le fichier ".$_FILES['fichier_final']['name']." a été bien importée sur le serveur";
		
		// serveur  local=====================================================================
		/*$host = 'localhost';
		$username = 'root';
		$password = '';
		$db = 'data_ams';*/
		$host = 'localhost';
		$username = 'root';
		$password = 'tahina123';
		$db = 'tmsconsuams';
		
		//$conn = mysql_connect($host,$username,$password);
	//mysql_select_db($db,$conn);
	
		//serveur à distance
		/*$host = 'mysql51-60.pro';
		$username = 'tmsconsuams';
		$password = 'qm2cy8UnQtcm';
		$db = 'tmsconsuams';*/
		
		/*$conn = mysql_connect($host,$username,$password);

		// on sélectionne la base
		mysql_select_db($db,$conn); */
		
		//$rep = 'save_missionFin/'; 		
		//$chemin=$rep.'sauvegarde.sql';
		//system("C:\wamp\bin\mysql\mysql5.6.12\bin\mysql --host=".$host." --user=".$username." --password=".$password." ".$db." < ".$chemin);
		//***********************************************************************************************
		//execution du fichier sql pour remplir la base de données
		
				$sql = file_get_contents($chemin);
				$bdd->exec($sql);
				
		$message = "Requêtes exécutées!";
		//echo "mise a jour de votre base local";
		
		//$rep = 'fichier/backup/'; //Répertoire où sauvegarder le dump de la base de données

		//avadika fichier sql le base de données de sauvena ao am $chemin
		/*$chemin=$rep.'synchro.sql';
		
		if(file_exists($chemin)){
			unlink($chemin);
		}*/
		//si le sereur est en ligne
		//system("mysqldump --host=".$host." --user=".$username." --password=".$password." ".$db."  > ".$rep."sauvegarde.sql");
		
		//sile serveur est dans le local
		//system("mysqldump --host=".$host." --user=".$username." --password=".$password." ".$db."  > ".$rep."synchro.sql");
		
		/*$host1 = 'localhost';
		$username1 = 'root';
		$password1 = '';
		$db1 = 'data_ams';
		//$table = 'table1 table2'; //Nom des tables à sauvegarder - Optionnel
		//$rep = 'backup1/'; //Répertoire où sauvegarder le dump de la base de données
		//$date=date("d_m_Y_H\hi");
		
		//$chemin=$rep.'sauvegarde.sql';
		
		//mysql -u username -ppassword -h monServeur -D nameDataBase < fichier.sql
		
		system("C:\wamp\bin\mysql\mysql5.6.12\bin\mysql --host=".$host1." --user=".$username1." --password=".$password1." ".$db1." < ".$chemin);
		//***********************************************************************************************
		echo "mise a jour effectuee";*/
}
else // si il y a eu une erreur
{
$message = "Le formulaire n'est pas rempli ou une erreur est survenu.";
}

echo "<br>".$message."<br>";
//unlink($chemin);


?>