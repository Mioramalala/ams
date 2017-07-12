<?php 
	if (isset($_POST["libelle"])) {
		$libelle = mysql_real_escape_string($_POST["libelle"]);
		$rubrique_id = $_POST["rubrique"];
		$data = array();
		// $cycle = $_POST["cycle"];
		// $entreprise = $_POST["entreprise"];

		//start connexion
		require("../../../connexion.php");

		$sql = "INSERT INTO `tab_rubrique_sous`(
					`rubrique_libelle`,
					`rubrique_id`) 
				VALUES (
					'".$libelle."',
					'".$rubrique_id."')";
		
		
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