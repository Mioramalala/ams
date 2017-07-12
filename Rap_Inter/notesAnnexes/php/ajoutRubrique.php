<?php 

// header('Content-Type: text/html; charset=utf-8');

	if (isset($_POST["libelle"])) {

		$libelle = mysql_real_escape_string($_POST["libelle"]);
		// $libelle = $_POST["libelle"]
		$cycle = $_POST["cycle"];
		$entreprise = $_POST["entreprise"];
		$data = array();

		//start connexion
		require("../../../connexion.php");

		$sql = "INSERT INTO tab_rubrique_notes_annexes(rubrique_libelle,rubrique_cycle,ENTREPRISE_ID) 
				VALUES (
					'".$libelle."',
					'".$cycle."',
					'".$entreprise."')";
		
		
		$val = $bdd->exec($sql);
		if($val){
			$num = $bdd->lastInsertId();
			$data['num']=$num;
			$data['libelle']=stripslashes($libelle);
			$data['error']="ok";
		}else echo 
			$data['error']="Oups..! Il y a une erreur lors de l'enregistrement.";

		echo json_encode($data);
		// $bdd = null;

	}
 ?>