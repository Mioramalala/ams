
<?php
// by Tambyy

include'../connexion.php';
@session_start();

echo '{';
echo '"data" : [';

if(isset($_SESSION['entreprise'])) {
	
	$dossier = 'documents_permanents/';
				
	$reponse = $bdd->prepare("SELECT * FROM tab_document_permanent WHERE entreprise = :entreprise");
	$reponse->execute(array(
		'entreprise' => $_SESSION['entreprise']
	));
	
	$rowCount = $reponse->rowCount();
	$i = 0;

	while($donnees = $reponse->fetch()) {
		$extension = $donnees['extension'];
		$id        = $donnees['id'];
		$nom       = $donnees['nom'];
		$absNom    = $id.'_doc_permanent.'.$extension;

		echo '{';
			echo '"id"   : "'.$id.'",';
			echo '"name" : "'.addslashes($nom).'",';
			echo '"link" : "'.addslashes($dossier.$absNom).'"';
		echo '}';
		
		if($i < $rowCount - 1) echo ',';
		$i++;
	}
}

echo ']';
echo '}';

?>