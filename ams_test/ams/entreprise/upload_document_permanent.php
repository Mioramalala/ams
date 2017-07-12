
<?php
// by Tambyy

include'../connexion.php';
@session_start();

echo '{';
echo '"data" : [';

if(isset($_FILES['nameDoc']) && isset($_SESSION['entreprise'])) {
	$entreprise = $_SESSION['entreprise'];
	$filesCount = count($_FILES['nameDoc']['name']);
	
	for($i = 0; $i < $filesCount; $i++) {
		if($_FILES['nameDoc']['error'][$i] == 0) {
			$tmpName = $_FILES['nameDoc']['tmp_name'][$i];
			
			if(is_uploaded_file($tmpName)) {
				
				$ancienNom    = $_FILES['nameDoc']['name'][$i];
				$infosfichier = pathinfo($ancienNom);
				$extension    = $infosfichier['extension'];
				$dossier      = 'documents_permanents/';
				
				$reponse = $bdd->prepare("INSERT INTO tab_document_permanent(nom, entreprise, extension) VALUES(:nom, :entreprise, :extension)");
				$reponse->execute(array(
					'nom'        => $ancienNom,
					'entreprise' => $entreprise,
					'extension'  => $extension
				));
	
				$id         = $bdd->lastInsertId();
				$nouveauNom = $id.'_doc_permanent.'.$extension;
				
				if(move_uploaded_file($tmpName, utf8_decode($dossier.$nouveauNom))) {
				
					echo '{';
						echo '"id"   : "'.$id.'",';
						echo '"name" : "'.addslashes($ancienNom).'",';
						echo '"link" : "'.addslashes($dossier.$nouveauNom).'"';
					echo '}';
					
					if($i < $filesCount - 1) echo ',';
					
				}
			}	
		}		
	}
}

echo ']';
echo '}';

?>