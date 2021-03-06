<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
include "../connex.php";
require_once 'fonctions_ra.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/seuil_signification.docx');

//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date('d-m-Y');

//RECUPERATION NOM CLIENT, DATE DE GENERATION, DATE DE CLOTURE ET NOM SUPERVISEUR DE L'ENTREPRISE BY NIAINA
$document->setValue('nomClient', utf8_decode($nomEntreprise));
$document->setValue('dateCloture', $dateClotureMission);
$document->setValue('dateGeneration', $DATE_GENERATION);

//NOM SUPERVISEUR
$sqlSuperviseur = 'SELECT * FROM tab_superviseur WHERE MISSION_ID = '.$_SESSION['idMission'];
$reqSuperviseur = $bdd->query($sqlSuperviseur);
$tabSuperviseur = $reqSuperviseur->fetch();
$nom = $tabSuperviseur['SUPERVISEUR_NOM'];
$document->setValue('nomSuperviseur', $nom);

//RECUPERATION COLLABORATEUR BY NIAINA
//Supprimer touts les fichiers texte avant de créer le fichier texte
$path='Collaborateurs/';
$rep=opendir($path);
while($file = readdir($rep)){
    if($file != '..' && $file !='.' && $file !='' && $file!='.txt'){
        unlink($path.$file);        
    }
}
$file ="Collaborateurs/ra_seuil_signification_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_planification_ra,tab_utilisateur WHERE tab_planification_ra.UTIL_ID=tab_utilisateur.UTIL_ID and tab_planification_ra.MISSION_ID=".$_SESSION['idMission'];
$rep = $bdd->query($sql); 
while ($donnee = $rep->fetch()) {
    $utilID = $donnee['UTIL_NOM'];
	fwrite($fileopen,$utilID.' ');
}
fclose($fileopen);
$read=file($file);
$octet=filesize($file);
if ($octet==0) {
	$document->setValue('nomCollaborateur', 'Pas de collabarateur');
} 
else {
	$document->setValue('nomCollaborateur', $read[0]);
}

//RECUPERATION INCIDENCES DE L'ENTREPRISE BY NIAINA
$sqlSyntheseRsci = 'SELECT * FROM tab_planification_ra WHERE MISSION_ID='.$_SESSION['idMission'];
$repSynthese = $bdd->query($sqlSyntheseRsci);  

$domaine = array( 
"Fonds",
"ImmoCorp",
"ImmoFi",
"Stocks",
"Tresorerie",
"Charges",
"Ventes",
"Paie",
"Impots",
"Emprunts",
"DCD"
);

while($donnee = $repSynthese->fetch())
{
    //CYCLE A
    if ($donnee['PLANIF_CYCLE'] == "fond") {
        $document->setValue('seuilFonds', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE B
    if ($donnee['PLANIF_CYCLE'] == "immo") {
        $document->setValue('seuilImmoCorp', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE C
    if ($donnee['PLANIF_CYCLE'] == "immofi") {
        $document->setValue('seuilImmoFi', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE D
    if ($donnee['PLANIF_CYCLE'] == "stock") {
        $document->setValue('seuilStocks', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE E
    if ($donnee['PLANIF_CYCLE'] == "tresorerie") {
        $document->setValue('seuilTresorerie', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE F
    if ($donnee['PLANIF_CYCLE'] == "charge") {
        $document->setValue('seuilCharges', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE G
    if ($donnee['PLANIF_CYCLE'] == "vente") {
        $document->setValue('seuilVentes', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE H
    if ($donnee['PLANIF_CYCLE'] == "paie") {
        $document->setValue('seuilPaie', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE I
    if ($donnee['PLANIF_CYCLE'] == "impot") {
        $document->setValue('seuilImpots', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE J
    if ($donnee['PLANIF_CYCLE'] == "emprunt") {
        $document->setValue('seuilEmprunts', utf8_decode($donnee['SEUIL_SIGN']));
    }

    //CYCLE K
    if ($donnee['PLANIF_CYCLE'] == "dcd") {
        $document->setValue('seuilDCD', utf8_decode($donnee['SEUIL_SIGN']));        
    }
}

nettoyerSeuil($document, $domaine);

$fichier = 'SEUIL_SIGNIFICATION(' . $DATE_GENERATION . ').docx';
if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/SEUIL_SIGNIFICATION(' . $DATE_GENERATION . ').docx');
    Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
} else {
    $document->save('../Sauvegarde_sortie/Word/SEUIL_SIGNIFICATION(' . $DATE_GENERATION . ').docx');
    Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
}

echo '<a id="icone_seuil" href="Dossier_Rapport/Sauvegarde_sortie/Word/SEUIL_SIGNIFICATION(' . $DATE_GENERATION . ').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
?>