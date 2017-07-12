<?php
@session_start();
include("../../../connexion.php");
$idMission = $_SESSION["idMission"];
$idEntreprise = $_SESSION["id_Entre"];

	if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0 && isset($_POST['pour'])){
		$infosfichier     = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		$fichier          = htmlentities($_FILES['fichier']['name']);
		if($extension_upload == "xls" || $extension_upload == "xlsx"){
			// pour supprimer l'ancien fichier s'il existe
			$req = $bdd->prepare('SELECT `extension` 
									FROM `tab_notes_de_synthese_fichier` 
									WHERE `MISSION_ID` = :mission_id
									AND `numero_question` = :pour');
			$req->execute(array(    
				'pour'       => $_POST['pour'],
				'mission_id' => $idMission
			));
			if($donnee = $req->fetch()) {
				$extension  = $donnee['extension'];
				$ancien_nom = "../fichier_a_inserer/".$_POST['pour']."_".$idMission.'.'.$extension;
				if(file_exists($ancien_nom)) unlink($ancien_nom);
			}
			
			// pour supprimer le nom de l'ancien fichier de la base
			$req = $bdd->prepare('DELETE FROM `tab_notes_de_synthese_fichier` 
									WHERE `MISSION_ID` = :mission_id
									AND `numero_question` = :pour');
			$req->execute(array(    
				'pour'       => $_POST['pour'],
				'mission_id' => $idMission
			));
			
			// Pour inserer le nouveau fichier dans la base de donnees 'tab_notes_de_synthese_fichier'
			$req = $bdd->prepare("INSERT INTO `tmsconsuams`.`tab_notes_de_synthese_fichier` 
					(`MISSION_ID`, `ENTREPRISE_ID`, `numero_question`, `nom_fichier`, `extension`) 
					VALUES (:mission_id, :idEntreprise, :num_question, :nom, :extension)");
			$req->execute(array(    
				'num_question' => $_POST['pour'],
				'mission_id' => $idMission,
				'nom'        => $fichier,
				'extension'  => $extension_upload,
				'idEntreprise' => $idEntreprise
			));	
			
			// Pour enregistrer le nouveau fichier dans le serveur
			$nouveau_nom = "../fichier_a_inserer/".$_POST['pour']."_".$idMission.'.'.$extension_upload;
			move_uploaded_file($_FILES['fichier']['tmp_name'], $nouveau_nom);		

		}
		else{
			// pour supprimer l'ancien fichier s'il existe
			$req = $bdd->prepare('SELECT `extension` 
									FROM `tab_notes_de_synthese_fichier` 
									WHERE `MISSION_ID` = :mission_id
									AND `numero_question` = :pour');
			$req->execute(array(    
				'pour'       => $_POST['pour'],
				'mission_id' => $idMission
			));
			if($donnee = $req->fetch()) {
				$extension  = $donnee['extension'];
				$ancien_nom = "../fichier_a_inserer/".$_POST['pour']."_".$idMission.'.'.$extension;
				if(file_exists($ancien_nom)) unlink($ancien_nom);
			}			
			// pour supprimer le nom de l'ancien fichier de la base
			$req = $bdd->prepare('DELETE FROM `tab_notes_de_synthese_fichier` 
									WHERE `MISSION_ID` = :mission_id
									AND `numero_question` = :pour');
			$req->execute(array(    
				'pour'       => $_POST['pour'],
				'mission_id' => $idMission
			));
			// Pour inserer dans la table que le fichier uploade n'est pas un fichier Excel
			$req = $bdd->prepare("INSERT INTO `tmsconsuams`.`tab_notes_de_synthese_fichier` 
					(`MISSION_ID`, `ENTREPRISE_ID`, `numero_question`, `nom_fichier`, `extension`) 
					VALUES (:mission_id, :idEntreprise, :num_question, :nom, :extension)");
			$req->execute(array(    
				'num_question' => $_POST['pour'],
				'mission_id' => $idMission,
				'nom'        => "Erreur lors du precedent upload du fichier, veuillez uploader un fichier Excel",
				'extension'  => "",
				'idEntreprise' => $idEntreprise
			));			
		}
	}
?>