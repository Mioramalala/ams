<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/lettre_mission.docx');

//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date('d-m-Y');

$document->setValue('Value0', $DATE_GENERATION); //DATE DE GENERATION
$document->setValue('Value1', $nomEntreprise); //NOM SOCIETE
$document->setValue('Value2', utf8_decode($adresseEntreprise)); //ADRESSE SOCIETE
$document->setValue('Value3', utf8_decode('N°: 106/13 - NJ/GC')); //NIF STAT
$document->setValue('Value4', "Au Conseil d'Administration"); //Au Conseil d'Administration OU A la Direction
$document->setValue('Value5', $dateClotureMission); //Date clôture mission

$fichier = 'LETTRE_MISSION(' . $DATE_GENERATION . ').docx';
if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/LETTRE_MISSION(' . $DATE_GENERATION . ').docx');
} else {
    $document->save('../Sauvegarde_sortie/Word/LETTRE_MISSION(' . $DATE_GENERATION . ').docx');
}

echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/LETTRE_MISSION(' . $DATE_GENERATION . ').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
?>