<?php 
	require_once '../../../Dossier_Rapport/Reporting_Word/class_word/PHPWord.php';

	include './../../../connexion.php';
    @session_start();
    $mission_id=@$_SESSION['idMission'];

	$PHPWord = new PHPWord();
	$document = $PHPWord->loadTemplate('template_lettre.docx');

	$nom=$_POST['nomClient'];
	$adresse=$_POST['CoordClient'];
	$dateCloture=$_POST['dateCloture'];

	$document->setValue('date',date('d/m/Y'));
	$document->setValue('nom',$nom);
	$document->setValue('coordonnees1',$adresse);
	$document->setValue('dateLimite',$dateCloture);	

	$nomfichier='client_'.str_replace(' ', '_', $nom).'.docx';

	$document->save($nomfichier);

	echo $nomfichier;

	$sql = "INSERT INTO `tmsconsuams`.`tab_circularisation_fichier` 
			(`idFile`, `fileName`, `fileIdMission`, `fileDestName`, `fileDestCoord`, `fileCategory`, `fileTimeCreation`) 
			VALUES ('', '".$nomfichier."', '".$mission_id."', '".$nom."', '".$adresse."', 'client', NOW());";
	$bdd->query($sql);
    // header("Content-Type: application/vnd.ms-word");
    // header("Expires: 0");
    // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    // header("content-disposition: attachment;filename=lettre_client.doc");
?>
