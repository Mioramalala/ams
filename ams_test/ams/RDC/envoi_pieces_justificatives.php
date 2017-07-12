<?php
@session_start();
 
		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 
 
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
	include "$project_path/connexion.php";
	
	$_POST['mission_id']=$mission_id;

	if(isset($_FILES['fichier']) && isset($_POST['mission_id']) && isset($_POST['pour'])){
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