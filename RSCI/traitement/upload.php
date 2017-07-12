<?php 
	include '../../connexion.php';

	if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0 && isset($_POST['mission_id']) && isset($_POST['cycle'])){
		$infosfichier     = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		// $fichier          = mysql_real_escape_string(htmlentities($_FILES['fichier']['name']));
		$dossier = $_SERVER['DOCUMENT_ROOT']."/RSCI/assets/uploads/flowchart/";
		if(!is_dir($dossier)){
           mkdir($dossier,0777,true);
        }
		$nouveau_nom = "flowchart_".$_POST['cycle']."_".$_POST['mission_id'].'.'.$extension_upload;

		// pour supprimer l'ancien fichier s'il existe
		$req = $bdd->prepare('SELECT flowchart_filename FROM tab_flowchart_cycle_achat WHERE mission_id = :mission_id AND flowchart_cycle = :cycle');
		$req->execute(array(    
			'cycle'       => $_POST['cycle'],
			'mission_id' => $_POST['mission_id']
		));

		if($donnee = $req->fetch()) {
			$flowchart_filename  = $donnee['flowchart_filename'];
			$ancien_nom = $dossier.$flowchart_filename;
			if(file_exists($ancien_nom)) unlink($ancien_nom);
		}

		$req = $bdd->prepare('DELETE FROM tab_flowchart_cycle_achat WHERE mission_id = :mission_id AND flowchart_cycle = :cycle');
		$req->execute(array(    
			'cycle'       => $_POST['cycle'],
			'mission_id' => $_POST['mission_id']
		));

		move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier.$nouveau_nom);
		
		$req = $bdd->prepare('INSERT INTO tab_flowchart_cycle_achat(flowchart_cycle, mission_id, flowchart_filename) VALUES(:cycle, :mission_id, :nom)');
		$req->execute(array(    
			'cycle'      => $_POST['cycle'],
			'mission_id' => $_POST['mission_id'],
			'nom'        => $nouveau_nom
		));
		
		/*// pour supprimer l'ancien fichier s'il existe
		$req = $bdd->prepare('SELECT extension FROM tab_pieces_justificatives WHERE mission_id = :mission_id AND pour = :pour');
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
		));
		
		$req = $bdd->prepare('INSERT INTO tab_pieces_justificatives(pour, mission_id, nom, extension) VALUES(:pour, :mission_id, :nom, :extension)');
		$req->execute(array(    
			'pour'       => $_POST['pour'],
			'mission_id' => $_POST['mission_id'],
			'nom'        => $fichier,
			'extension'  => $extension_upload
		));
		
		$nouveau_nom = "../pieces_justificatives/pj_".$_POST['pour']."_".$_POST['mission_id'].'.'.$extension_upload;
		move_uploaded_file($_FILES['fichier']['tmp_name'], $nouveau_nom);
		*/
	}