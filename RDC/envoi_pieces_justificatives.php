<?php
	session_start();
	include '../connexion.php';

	if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0 && isset($_POST['mission_id']) && isset($_POST['pour'])){
		$infosfichier     = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		$fichier          = htmlentities($_FILES['fichier']['name']);
		
		// pour supprimer l'ancien fichier s'il existe
		/*$req = $bdd->prepare('SELECT extension FROM tab_pieces_justificatives WHERE mission_id = :mission_id AND pour = :pour');
		$req->execute(array(    
			'pour'       => $_POST['pour'],
			'mission_id' => $_POST['mission_id']
		));
		if($donnee = $req->fetch()) {
			$extension  = $donnee['extension'];
			$ancien_nom = "../pieces_justificatives/pj_".$_POST['pour']."_".$_POST['mission_id'].'.'.$extension;
			if(file_exists($ancien_nom)) unlink($ancien_nom);
		}
		
		$req = $bdd->prepare('DELETE FROM tab_pieces_justificatives WHERE mission_id = :mission_id AND pour = :pour');
		$req->execute(array(    
			'pour'       => $_POST['pour'],
			'mission_id' => $_POST['mission_id']
		));*/
		
		$req = $bdd->prepare('INSERT INTO tab_pieces_justificatives(pour, mission_id, nom, extension) VALUES(:pour, :mission_id, :nom, :extension)');
		$req->execute(array(    
			'pour'       => $_POST['pour'],
			'mission_id' => $_POST['mission_id'],
			'nom'        => $fichier,
			'extension'  => $extension_upload
		));
		
		$compteur = count(glob("../pieces_justificatives/pj_".$_POST['pour']."_".$_POST['mission_id']."*")) ;
			
		$nouveau_nom = "../pieces_justificatives/pj_".$_POST['pour']."_".$_POST['mission_id']."_".$compteur.'.'.$extension_upload;
		move_uploaded_file($_FILES['fichier']['tmp_name'], $nouveau_nom);
		echo $compteur ; 
	}
?>