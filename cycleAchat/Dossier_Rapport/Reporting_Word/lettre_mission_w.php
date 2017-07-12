<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
require_once 'fonctions_ra.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/lettre_mission.docx');

//INITIALISATION DATE DE GENERATION EXPORT
$Date_gen = explode("-",date("d-m-Y"));
if($Date_gen[1] == "01") $Date_gen[1]="Janvier";
elseif($Date_gen[1] == "02") $Date_gen[1]="Fevrier";
elseif($Date_gen[1] == "03") $Date_gen[1]="Mars";
elseif($Date_gen[1] == "04") $Date_gen[1]="Avril";
elseif($Date_gen[1] == "05") $Date_gen[1]="Mai";
elseif($Date_gen[1] == "06") $Date_gen[1]="Juin";
elseif($Date_gen[1] == "07") $Date_gen[1]="Juillet";
elseif($Date_gen[1] == "08") $Date_gen[1]="Aout";
elseif($Date_gen[1] == "09") $Date_gen[1]="Septembre";
elseif($Date_gen[1] == "10") $Date_gen[1]="Octobre";
elseif($Date_gen[1] == "11") $Date_gen[1]="Novembre";
elseif($Date_gen[1] == "12") $Date_gen[1]="Decembre";

$DATE_GENERATION= $Date_gen[0]." ".$Date_gen[1]." ".$Date_gen[2];

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