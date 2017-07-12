<?php
	session_start();
	include '../../../connexion.php';

	if(isset($_FILES['fichier']) && isset($_POST['mission_id']) && isset($_POST['pour'])){
		$infosfichier = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		$fichier = mysql_real_escape_string(htmlentities($_FILES['fichier']['name']));
		$bdd->exec('DELETE FROM tab_pieces_justificatives WHERE mission_id = '.$_POST['mission_id']);
		$req = $bdd->prepare('INSERT INTO tab_pieces_justificatives(pour, mission_id, nom, extension) VALUES(:pour, :mission_id, :nom, :extension)');
		$req->execute(array(    
			'pour'       => $_POST['pour'],
			'mission_id' => $_POST['mission_id'],
			'nom'        => $fichier,
			'extension'  => $extension_upload
		));
		move_uploaded_file($_FILES['fichier']['tmp_name'], "renvoi/pj_".$_POST['mission_id'].'.'.$extension_upload);
	}
?>