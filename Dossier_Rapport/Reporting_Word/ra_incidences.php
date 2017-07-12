<?php
@session_start();
require_once 'class_word/PHPWord.php';
//require_once 'class_word/PhpWord-new/Autoloader.php';
require_once 'recuperation_informations.php';
include "../connex.php";
require_once 'fonctions_ra.php';

$user=$_SESSION["user"];
$id_mission=$_SESSION['idMission'];
$entreprise=get_Entreprise($id_mission);
$utilisateur=get_ID_utilisateur($user);

$PHPWord = new PHPWord();
// Preparation du template(clonage des lignes de tableau si besoin est)
/*use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
Autoloader::register();
Settings::loadConfig();*/


//$document = new \PhpOffice\PhpWord\TemplateProcessor('Template_word/incidences.docx');
$document = $PHPWord->loadTemplate('Template_word/incidences.docx');

//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date('d-m-Y');


$idMission=$_SESSION['idMission'];
$lienRA="http://".$_SERVER['HTTP_HOST']."/RA_liengenerer.php?lien=incidence/".$idMission;


//RECUPERATION NOM CLIENT, DATE DE GENERATION, DATE DE CLOTURE ET NOM SUPERVISEUR DE L'ENTREPRISE BY NIAINA
$document->setValue('nomClient', utf8_decode($nomEntreprise));
$document->setValue('dateCloture', $dateClotureMission);
$document->setValue('dateGeneration', $DATE_GENERATION);
$document->setValue('lien', $lienRA);

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
$file ="Collaborateurs/ra_incidences_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_incidence_ra,tab_utilisateur WHERE tab_incidence_ra.UTIL_ID=tab_utilisateur.UTIL_ID and tab_incidence_ra.MISSION_ID=".$_SESSION['idMission'];
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

$incidences = array( 
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
$sqlSyntheseRsci = 'SELECT * FROM tab_incidence_ra WHERE MISSION_ID='.$_SESSION['idMission'];
$repSynthese = $bdd->query($sqlSyntheseRsci);  

while($donnee = $repSynthese->fetch())
{
    //CYCLE A
    if ($donnee['CYCLE'] == "A") {
        $document->setValue('fonctionnementFonds', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteFonds', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE B
    if ($donnee['CYCLE'] == "B") {
        $document->setValue('fonctionnementImmoCorp', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteImmoCorp', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE C
    if ($donnee['CYCLE'] == "C") {
        $document->setValue('fonctionnementImmoFi', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteImmoFi', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE D
    if ($donnee['CYCLE'] == "D") {
        $document->setValue('fonctionnementStocks', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteStocks', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE E
    if ($donnee['CYCLE'] == "E") {
        $document->setValue('fonctionnementTresorerie', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteTresorerie', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE F
    if ($donnee['CYCLE'] == "F") {
        $document->setValue('fonctionnementCharges', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteCharges', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE G
    if ($donnee['CYCLE'] == "G") {
        $document->setValue('fonctionnementVentes', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteVentes', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE H
    if ($donnee['CYCLE'] == "H") {
        $document->setValue('fonctionnementPaie', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('comptePaie', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE I
    if ($donnee['CYCLE'] == "I") {
        $document->setValue('fonctionnementImpots', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteImpots', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE J
    if ($donnee['CYCLE'] == "J") {
        $document->setValue('fonctionnementEmprunts', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteEmprunts', utf8_decode($donnee['COMPTE']));
    }

    //CYCLE K
    if ($donnee['CYCLE'] == "K") {
        $document->setValue('fonctionnementDCD', utf8_decode($donnee['FONCTIONNEMENT']));
        $document->setValue('compteDCD', utf8_decode($donnee['COMPTE']));
    }
}

nettoyerIncidence($document, $incidences);

$fichier = 'INCIDENCES(' . $DATE_GENERATION . ').docx';

if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/INCIDENCES(' . $DATE_GENERATION . ').docx');
    Ajout_base($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 

} else {
    $document->save('../Sauvegarde_sortie/Word/INCIDENCES(' . $DATE_GENERATION . ').docx');
    // Ajout_base($fichier,$user,$id_Mission,$entreprise,$utilisateur); 
    Ajout_base($fichier,$_SESSION['user'],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION['user'])); 
}


echo '<a id="icone_incidences" href="includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Word/INCIDENCES(' . $DATE_GENERATION . ').docx&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
?>