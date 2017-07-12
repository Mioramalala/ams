<?php 

// header('Content-Type: text/html; charset=utf-8');

		//start connexion
		require("../../../connexion.php");
	extract($_POST);
		$data = array();
		$data['error']="Vide!";
	if (isset($libelle) || $action !="") {

		if ($action == 1)//++++++++++++++AJOUTER++++++++++++++
		 {
			$libelle = mysql_real_escape_string($libelle);
			$symbole = mysql_real_escape_string($symbole);


			$sql = "INSERT INTO tab_rubrique_devise(monnaie,symbole) 
					VALUES (
						'".$libelle."',
						'".$symbole."')";
			
			
			$val = $bdd->exec($sql);
			if($val){
				$num = $bdd->lastInsertId();
				$data['num']=$num;
				$data['libelle']=stripslashes($libelle);
				$data['symbole']=stripslashes($symbole);
				$data['error']="ok";
			}else echo 
				$data['error']="Oups..! Une erreur est survenue lors de l'enregistrement.";

		}elseif ($action == 2) //++++++++++++++SUPPRIMER++++++++++++++
		{ 
			$sql = "DELETE FROM `tab_rubrique_devise` WHERE id=".$id;
			$val = $bdd->exec($sql);
			// $val = "ok";
			if($val){
				$data['error']="ok";
			}else echo 
				$data['error']="Oups..! Une erreur est survenue lors de la suppression.";
			
		}


	}
		echo json_encode($data);
 ?>