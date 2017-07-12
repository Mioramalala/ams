
<?php
// by Tambyy

include '../connexion.php';

if(isset($_GET['id'])) {
	$reponse = $bdd->prepare('SELECT extension FROM tab_document_permanent WHERE id = :id');
	$reponse->execute(array(
		'id' => $_GET['id']
	));
	
	if($donnees = $reponse->fetch()) {
		$dossier = 'documents_permanents/';
		$fichier = $_GET['id'].'_doc_permanent.'.$donnees['extension'];
		if(file_exists($dossier.$fichier))
			unlink($dossier.$fichier);
		
		$reponse = $bdd->prepare('DELETE FROM tab_document_permanent WHERE id = :id');
		$reponse->execute(array(
			'id' => $_GET['id']
		));
		
	}
	
}

?>