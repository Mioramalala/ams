<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
require_once 'fonctions_ra.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/rapport_general.docx');

//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date("d-m-Y");
$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 
$dateFrancais = date("d")." ".$mois[date("n")]." ".date("Y");

//RECUPERATION NOM/ADRESSE CLIENT, DATE DE GENERATION, DATE DE DEBUT ET CLOTURE DE L'ENTREPRISE BY NIAINA
$document->setValue('nomClient', utf8_decode($nomEntreprise)); //NOM SOCIETE
$document->setValue('adresseClient', utf8_decode($adresseEntreprise)); //ADRESSE SOCIETE
$document->setValue('dateGeneration', $dateFrancais); //Antananarivo le	
$document->setValue('dateDebut', $dateDebutMission); //Date début mission
$document->setValue('dateCloture', $dateClotureMission); //Date clôture mission

$fichier = 'RAPPORT_GENERAL (' . $DATE_GENERATION . ').docx';
if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/RAPPORT_GENERAL (' . $DATE_GENERATION . ').docx');
} else {
	foreach (glob("../Sauvegarde_sortie/Word/RAPPORT_GENERAL*.docx") as $filename) {
	    unlink($filename);
	}
    $document->save('../Sauvegarde_sortie/Word/RAPPORT_GENERAL (' . $DATE_GENERATION . ').docx');
}

//ENREGISTREMENT D'UN RAPPORT GENERE BY NIAINA
$sql1 = $bdd->prepare('DELETE FROM tab_rapport WHERE ID_MISSION=:id AND TYPE_GENERATION LIKE :type');
$sql1->execute(array(
    'id' => $_SESSION['idMission'],
    'type' => 'rapport_general'
));
$sql2 = $bdd->prepare('INSERT INTO tab_rapport(ID_MISSION, DATE_GENERATION, TYPE_GENERATION) VALUES(:id,DATE_FORMAT(now(), \'%d-%m-%Y\'),:type)');
$sql2->execute(array(
    'id' => $_SESSION['idMission'],
    'type' => 'rapport_general'
));

echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/RAPPORT_GENERAL (' . $DATE_GENERATION . ').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

?>