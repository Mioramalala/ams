<?php
require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
include "../connex.php";
require_once 'fonctions_ra.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template_word/synthese_risques.docx');

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
$file ="Collaborateurs/ra_synthese_risques_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_synthese_rsci_ra,tab_utilisateur WHERE tab_synthese_rsci_ra.UTIL_ID=tab_utilisateur.UTIL_ID and tab_synthese_rsci_ra.MISSION_ID=".$_SESSION['idMission'];
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
"Immobilisations",
"Stock",
"Ventes",
"Tresorerie",
"Achats",
"Paie",
"Sous");

@session_start();
$idMission=$_SESSION['idMission'];
$lienRA="http://".$_SERVER['HTTP_HOST']."/RA_liengenerer.php?lien=SYNTHESE_RISQUE/".$idMission;
$document->setValue('lien', $lienRA);

//RECUPERATION SYNTHESE RISQUES ET CONCEPTION SYSTEMES DE L'ENTREPRISE BY NIAINA
$sqlSyntheseRsci = 'SELECT * FROM tab_synthese_rsci_ra WHERE MISSION_ID='.$_SESSION['idMission'];
$repSynthese = $bdd->query($sqlSyntheseRsci);  

while($donnee = $repSynthese->fetch())
{
    //Immobilisations
    if ($donnee['DOMAINE'] == utf8_decode("IMMOBILISATIONS Corporelles, incorporelles, financières")) {
        $document->setValue('caractereImmobilisations', utf8_decode($donnee['CARACTERE']));
        $document->setValue('exhaustiviteImmobilisations', utf8_decode($donnee['EXHAUSTIVITE']));
        $document->setValue('realiteImmobilisations', utf8_decode($donnee['REALITE']));
        $document->setValue('proprieteImmobilisations', utf8_decode($donnee['PROPRIETE']));
        $document->setValue('evaluationImmobilisations', utf8_decode($donnee['EVALUATION_CORRECTE']));
        $document->setValue('enregistrementImmobilisations', utf8_decode($donnee['ENREGISTREMENT_BP']));
        $document->setValue('imputationImmobilisations', utf8_decode($donnee['IMPUTATION_CORRECTE']));
        $document->setValue('totalisationImmobilisations', utf8_decode($donnee['TOTALISATION']));
        $document->setValue('bonneImmobilisations', utf8_decode($donnee['BONNE_INFORMATION']));
        $document->setValue('risqueImmobilisations', utf8_decode($donnee['RISQUE_GF']));
    }

    //Stock
    if ($donnee['DOMAINE'] == "STOCK") {
        $document->setValue('caractereStock', utf8_decode($donnee['CARACTERE']));
        $document->setValue('exhaustiviteStock', utf8_decode($donnee['EXHAUSTIVITE']));
        $document->setValue('realiteStock', utf8_decode($donnee['REALITE']));
        $document->setValue('proprieteStock', utf8_decode($donnee['PROPRIETE']));
        $document->setValue('evaluationStock', utf8_decode($donnee['EVALUATION_CORRECTE']));
        $document->setValue('enregistrementStock', utf8_decode($donnee['ENREGISTREMENT_BP']));
        $document->setValue('imputationStock', utf8_decode($donnee['IMPUTATION_CORRECTE']));
        $document->setValue('totalisationStock', utf8_decode($donnee['TOTALISATION']));
        $document->setValue('bonneStock', utf8_decode($donnee['BONNE_INFORMATION']));
        $document->setValue('risqueStock', utf8_decode($donnee['RISQUE_GF']));
    }

    //Ventes
    if ($donnee['DOMAINE'] == "VENTES - CLIENTS") {
        $document->setValue('caractereVentes', utf8_decode($donnee['CARACTERE']));
        $document->setValue('exhaustiviteVentes', utf8_decode($donnee['EXHAUSTIVITE']));
        $document->setValue('realiteVentes', utf8_decode($donnee['REALITE']));
        $document->setValue('proprieteVentes', utf8_decode($donnee['PROPRIETE']));
        $document->setValue('evaluationVentes', utf8_decode($donnee['EVALUATION_CORRECTE']));
        $document->setValue('enregistrementVentes', utf8_decode($donnee['ENREGISTREMENT_BP']));
        $document->setValue('imputationVentes', utf8_decode($donnee['IMPUTATION_CORRECTE']));
        $document->setValue('totalisationVentes', utf8_decode($donnee['TOTALISATION']));
        $document->setValue('bonneVentes', utf8_decode($donnee['BONNE_INFORMATION']));
        $document->setValue('risqueVentes', utf8_decode($donnee['RISQUE_GF']));
    }

    //Trésorerie
    if ($donnee['DOMAINE'] == "VENTES - CLIENTS") {
        $document->setValue('caractereTresorerie', utf8_decode($donnee['CARACTERE']));
        $document->setValue('exhaustiviteTresorerie', utf8_decode($donnee['EXHAUSTIVITE']));
        $document->setValue('realiteTresorerie', utf8_decode($donnee['REALITE']));
        $document->setValue('proprieteTresorerie', utf8_decode($donnee['PROPRIETE']));
        $document->setValue('evaluationTresorerie', utf8_decode($donnee['EVALUATION_CORRECTE']));
        $document->setValue('enregistrementTresorerie', utf8_decode($donnee['ENREGISTREMENT_BP']));
        $document->setValue('imputationTresorerie', utf8_decode($donnee['IMPUTATION_CORRECTE']));
        $document->setValue('totalisationTresorerie', utf8_decode($donnee['TOTALISATION']));
        $document->setValue('bonneTresorerie', utf8_decode($donnee['BONNE_INFORMATION']));
        $document->setValue('risqueTresorerie', utf8_decode($donnee['RISQUE_GF']));
    }

    //Achats
    if ($donnee['DOMAINE'] == "ACHATS - FOURNISSEURS") {
        $document->setValue('caractereAchats', utf8_decode($donnee['CARACTERE']));
        $document->setValue('exhaustiviteAchats', utf8_decode($donnee['EXHAUSTIVITE']));
        $document->setValue('realiteAchats', utf8_decode($donnee['REALITE']));
        $document->setValue('proprieteAchats', utf8_decode($donnee['PROPRIETE']));
        $document->setValue('evaluationAchats', utf8_decode($donnee['EVALUATION_CORRECTE']));
        $document->setValue('enregistrementAchats', utf8_decode($donnee['ENREGISTREMENT_BP']));
        $document->setValue('imputationAchats', utf8_decode($donnee['IMPUTATION_CORRECTE']));
        $document->setValue('totalisationAchats', utf8_decode($donnee['TOTALISATION']));
        $document->setValue('bonneAchats', utf8_decode($donnee['BONNE_INFORMATION']));
        $document->setValue('risqueAchats', utf8_decode($donnee['RISQUE_GF']));
    }

    //Paie
    if ($donnee['DOMAINE'] == "PAIE - PERSONNEL") {
        $document->setValue('caracterePaie', utf8_decode($donnee['CARACTERE']));
        $document->setValue('exhaustivitePaie', utf8_decode($donnee['EXHAUSTIVITE']));
        $document->setValue('realitePaie', utf8_decode($donnee['REALITE']));
        $document->setValue('proprietePaie', utf8_decode($donnee['PROPRIETE']));
        $document->setValue('evaluationPaie', utf8_decode($donnee['EVALUATION_CORRECTE']));
        $document->setValue('enregistrementPaie', utf8_decode($donnee['ENREGISTREMENT_BP']));
        $document->setValue('imputationPaie', utf8_decode($donnee['IMPUTATION_CORRECTE']));
        $document->setValue('totalisationPaie', utf8_decode($donnee['TOTALISATION']));
        $document->setValue('bonnePaie', utf8_decode($donnee['BONNE_INFORMATION']));
        $document->setValue('risquePaie', utf8_decode($donnee['RISQUE_GF']));
    }

    //Sous traitance
    if ($donnee['DOMAINE'] == "SOUS TRAITANCE") {
        $document->setValue('caractereSous', utf8_decode($donnee['CARACTERE']));
        $document->setValue('exhaustiviteSous', utf8_decode($donnee['EXHAUSTIVITE']));
        $document->setValue('realiteSous', utf8_decode($donnee['REALITE']));
        $document->setValue('proprieteSous', utf8_decode($donnee['PROPRIETE']));
        $document->setValue('evaluationSous', utf8_decode($donnee['EVALUATION_CORRECTE']));
        $document->setValue('enregistrementSous', utf8_decode($donnee['ENREGISTREMENT_BP']));
        $document->setValue('imputationSous', utf8_decode($donnee['IMPUTATION_CORRECTE']));
        $document->setValue('totalisationSous', utf8_decode($donnee['TOTALISATION']));
        $document->setValue('bonneSous', utf8_decode($donnee['BONNE_INFORMATION']));
        $document->setValue('risqueSous', utf8_decode($donnee['RISQUE_GF']));
    }


}
    $sqlRisque = 'SELECT RISQUE FROM tab_risque_lie_systeme WHERE MISSION_ID='.$_SESSION['idMission'];
    $repRisque = $bdd->query($sqlRisque);  
    $donnee = $repRisque->fetch();
    $document->setValue('risque', utf8_decode($donnee['RISQUE']));
    $document->setValue('risque', "");

    nettoyerRisqueSys($document, $domaine);

$fichier = 'SYNTHESE_RISQUES_CONCEPTION_SYSTEMES(' . $DATE_GENERATION . ').docx';
if (file_exists($fichier)) {
    unlink($fichier);
    $document->save('../Sauvegarde_sortie/Word/SYNTHESE_RISQUES_CONCEPTION_SYSTEMES(' . $DATE_GENERATION . ').docx');
    Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 

} else {
    $document->save('../Sauvegarde_sortie/Word/SYNTHESE_RISQUES_CONCEPTION_SYSTEMES(' . $DATE_GENERATION . ').docx');
    Ajout_base ($fichier,$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
}

echo '<a id="icone_risque" href="includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Word/SYNTHESE_RISQUES_CONCEPTION_SYSTEMES(' . $DATE_GENERATION . ').docx&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
?>