<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
require_once '../connex.php';
require_once 'fonctions_ra.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/taux_sondage.docx');

//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date('d-m-Y');

$idMission=$_SESSION['idMission'];
$lienRA="http://".$_SERVER['HTTP_HOST']."/RA_liengenerer.php?lien=TAUX_SONDAGE/".$idMission;

//RECUPERATION NOM CLIENT, DATE DE GENERATION, DATE DE CLOTURE ET NOM SUPERVISEUR DE L'ENTREPRISE BY NIAINA
$document->setValue('nomClient', utf8_decode($nomEntreprise));
$document->setValue('dateCloture', $dateClotureMission);
$document->setValue('dateGeneration', $DATE_GENERATION);
$document->setValue('lien',$lienRA);

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
$file ="Collaborateurs/ra_taux_sondage_".$_SESSION['idMission'].".txt";
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

//RECUPERATION INCIDENCES DE L'ENTREPRISE BY NIAINA
$sqlSyntheseRsci = 'SELECT * FROM tab_planification_ra WHERE MISSION_ID='.$_SESSION['idMission'];
$repSynthese = $bdd->query($sqlSyntheseRsci);  


while($donnee = $repSynthese->fetch())
{
    //CYCLE A
    if ($donnee['PLANIF_CYCLE'] == "fond") {
        $document->setValue('sondageFonds', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE B
    if ($donnee['PLANIF_CYCLE'] == "immo") {
        $document->setValue('sondageImmoCorp', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE C
    if ($donnee['PLANIF_CYCLE'] == "immofi") {
        $document->setValue('sondageImmoFi', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE D
    if ($donnee['PLANIF_CYCLE'] == "stock") {
        $document->setValue('sondageStocks', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE E
    if ($donnee['PLANIF_CYCLE'] == "tresorerie") {
        $document->setValue('sondageTresorerie', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE F
    if ($donnee['PLANIF_CYCLE'] == "charge") {
        $document->setValue('sondageCharges', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE G
    if ($donnee['PLANIF_CYCLE'] == "vente") {
        $document->setValue('sondageVentes', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE H
    if ($donnee['PLANIF_CYCLE'] == "paie") {
        $document->setValue('sondagePaie', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE I
    if ($donnee['PLANIF_CYCLE'] == "impot") {
        $document->setValue('sondageImpots', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE J
    if ($donnee['PLANIF_CYCLE'] == "emprunt") {
        $document->setValue('sondageEmprunts', utf8_decode($donnee['TAUX_SONDAGE']));
    }

    //CYCLE K
    if ($donnee['PLANIF_CYCLE'] == "dcd") {
        $document->setValue('sondageDCD', utf8_decode($donnee['TAUX_SONDAGE']));        
    }
}
nettoyerSondage($document, $domaine);

$fichier = 'TAUX_SONDAGE(' . $DATE_GENERATION . ').docx';
if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/TAUX_SONDAGE(' . $DATE_GENERATION . ').docx');
    Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 

} else {
    $document->save('../Sauvegarde_sortie/Word/TAUX_SONDAGE(' . $DATE_GENERATION . ').docx');
    Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
}

echo '<a id="icone_sondage" href="includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Word/TAUX_SONDAGE(' . $DATE_GENERATION . ').docx&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
?>