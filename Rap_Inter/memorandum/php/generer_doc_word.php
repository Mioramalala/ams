<?php
session_start();
include_once"../../../connexion.php";
require_once 'PhpWord/Autoloader.php';

function decoder($texte){
	$texte = utf8_encode($texte);
	$texteFinal = html_entity_decode(iconv('UTF-8', 'ISO-8859-1',$texte));
	return htmlspecialchars(utf8_decode($texteFinal));
}

//INITIALISATION =================================
$DATE_memorandum = date("d-m-Y");
//$heure_ajout = date("H:i");
	if(isset($_SESSION["user"])){
		$session_utiliser= $_SESSION["user"];
		$ID_mission = $_SESSION['idMission'];
		$ID_Utilisateur = $_SESSION["id"];
		$ID_Entreprise = $_SESSION["id_Entre"];			
	}
	else{
		$session_utiliser= $_SESSION['idMission'];
		$ID_mission =$_SESSION['idMission'];
		$ID_Utilisateur = $_SESSION["id"];
		$ID_Entreprise = $_SESSION["id_Entre"];	
	}

// Preparation du template(clonage des lignes de tableau si besoin est)
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
Autoloader::register();
Settings::loadConfig();

// Prendre le nombre des auditeurs
$reponse = $bdd->query("SELECT COUNT(DISTINCT `COLLAB_UTIL_ID`) AS nbr
							FROM `tab_collaborateur`
							WHERE `COLLAB_MISSION_ID` = ".$ID_mission."
							AND `COLLAB_STATUT` = 'actif'");
$donnees = $reponse->fetch();
$nb_auditeur = $donnees["nbr"];

// Prendre le nombre des postes cles dans l'entreprise
$reponse = $bdd->query("SELECT COUNT(DISTINCT `POSTE_CLE_ID`) AS nbr
						FROM `tab_poste_cle`
						WHERE `ENTREPRISE_ID` = ".$ID_Entreprise);
$donnees = $reponse->fetch();
$nb_poste_cle = $donnees["nbr"];

// Prendre le nombre des actionnaires dans l'entreprise
$reponse = $bdd->query("SELECT COUNT(DISTINCT `ACTIONNAIRE_ID`) AS nbr
							FROM `tab_actionnaire`
							WHERE `ENTREPRISE_ID` = ".$ID_Entreprise);
$donnees = $reponse->fetch();
$nb_actionnaire = $donnees["nbr"];

// Prendre le nombre des cases cochees
$reponse = $bdd->query("SELECT COUNT(DISTINCT `numero_question`) AS nbr
						FROM `tab_notes_de_synthese`
						WHERE `numero_question` LIKE '7-1-%'
						AND `value` = 'true'
						AND `MISSION_ID` = ".$ID_mission);
$donnees = $reponse->fetch();
$nb_cases_cochees = $donnees["nbr"];
						
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../Template/MODELE_NOTE DE_SYNTHESE.docx');
// Simple table
if($nb_auditeur == 0){
	$templateProcessor->cloneRow('auditeur', 0);
	$templateProcessor->cloneRow('auditeur#0', 0);
}
else	$templateProcessor->cloneRow('auditeur', $nb_auditeur-1);
$templateProcessor->cloneRow('nom_interlocuteur', $nb_poste_cle);
$templateProcessor->cloneRow('nom_actionnaire', $nb_actionnaire);
$templateProcessor->cloneRow('7-1', $nb_cases_cochees);
$templateProcessor->saveAs('../Template/template_note_de_synthese.docx');

/* REMPLISSAGE DU DOCUMENT
	1-Remplissage des tableaux a partir des fichiers
	2-Remplissage de la partie 7-1(input type checkbox)
	3-Remplissage de la partie 1-6 (input type checkbox) sauf le textarea
	4-Remplissage des donnees(textarea, date, risques) prises lors de la preparation autre que 7-1 et les 1-6 checkbox
	5-Remplissage des donnees venant de la base
*/

$document = new \PhpOffice\PhpWord\TemplateProcessor('../Template/template_note_de_synthese.docx');

//=========================================================================
// 1-Remplissage des tableaux a partir des fichiers
// Pour obtenir les extensions des fichiers a ouvrir avec PhpExcel
include_once("include/get_extension.php");

// Pour remplir le tableau 2-1
require_once("../../../Dossier_Rapport/Reporting_Excel/Classes/PHPExcel/IOFactory.php");
// Chargement du fichier Excel
$objPHPExcel = PHPExcel_IOFactory::load("../fichier_a_inserer/2-1_".$idMission.".".$extension21);
/*** récupération de la première feuille du fichier Excel * @var PHPExcel_Worksheet $sheet */
$sheet = $objPHPExcel->getSheet(0);
$index = "";
$str = "";
// On boucle sur les lignes
foreach($sheet->getRowIterator() as $row) { 
   // On boucle sur les cellule de la ligne
   foreach ($row->getCellIterator() as $cell) {
      $value = $cell->getCalculatedValue();
	  $index .= $cell->getColumn();
	  $index .= $cell->getRow();
	  $str .= $index." -> ".$value." // ";
	  $document->setValue("2-1-".$index, decoder($value));
	  $index = "";
   }
}
//_______________________________________________________________________________________________________

// Pour remplir le tableau 5-1
require_once("../../../Dossier_Rapport/Reporting_Excel/Classes/PHPExcel/IOFactory.php");
// Chargement du fichier Excel
$objPHPExcel = PHPExcel_IOFactory::load("../fichier_a_inserer/5-1_".$idMission.".".$extension51);

/*** récupération de la première feuille du fichier Excel * @var PHPExcel_Worksheet $sheet */
$sheet = $objPHPExcel->getSheet(0);
$index = "";
$str = "";
// On boucle sur les lignes
foreach($sheet->getRowIterator() as $row) { 
   // On boucle sur les cellule de la ligne
   foreach ($row->getCellIterator() as $cell) {
      $value = $cell->getCalculatedValue();
	  $index .= $cell->getColumn();
	  $index .= $cell->getRow();
	  $str .= $index." -> ".$value." // ";
	  $document->setValue("51".$index, decoder($value));
	  $index = "";
   }
}

// Pour remplir le tableau 5-2
require_once("../../../Dossier_Rapport/Reporting_Excel/Classes/PHPExcel/IOFactory.php");
// Chargement du fichier Excel
$objPHPExcel = PHPExcel_IOFactory::load("../fichier_a_inserer/5-2_".$idMission.".".$extension52);

/*** récupération de la première feuille du fichier Excel * @var PHPExcel_Worksheet $sheet */
$sheet = $objPHPExcel->getSheet(0);
$index = "";
$str = "";
// On boucle sur les lignes
foreach($sheet->getRowIterator() as $row) { 
   // On boucle sur les cellule de la ligne
   foreach ($row->getCellIterator() as $cell) {
      $value = $cell->getCalculatedValue();
	  $index .= $cell->getColumn();
	  $index .= $cell->getRow();
	  $str .= $index." -> ".$value." // ";
	  $document->setValue("52".$index, decoder($value));
	  $index = "";
   }
}

// Pour remplir le tableau 5-3
require_once("../../../Dossier_Rapport/Reporting_Excel/Classes/PHPExcel/IOFactory.php");
// Chargement du fichier Excel
$objPHPExcel = PHPExcel_IOFactory::load("../fichier_a_inserer/5-3_".$idMission.".".$extension53);

/*** récupération de la première feuille du fichier Excel* @var PHPExcel_Worksheet $sheet */
$sheet = $objPHPExcel->getSheet(0);
$index = "";
$str = "";
// On boucle sur les lignes
foreach($sheet->getRowIterator() as $row) { 
   // On boucle sur les cellule de la ligne
   foreach ($row->getCellIterator() as $cell) {
      $value = $cell->getCalculatedValue();
	  $index .= $cell->getColumn();
	  $index .= $cell->getRow();
	  $str .= $index." -> ".$value." // ";
	  $document->setValue("53".$index, decoder($value));
	  $index = "";
   }
}

// Pour remplir le tableau 5-4
require_once("../../../Dossier_Rapport/Reporting_Excel/Classes/PHPExcel/IOFactory.php");
// Chargement du fichier Excel
$objPHPExcel = PHPExcel_IOFactory::load("../fichier_a_inserer/5-4_".$idMission.".".$extension54);

/*** récupération de la première feuille du fichier Excel* @var PHPExcel_Worksheet $sheet */
$sheet = $objPHPExcel->getSheet(0);
$index = "";
$str = "";
// On boucle sur les lignes
foreach($sheet->getRowIterator() as $row) { 
   // On boucle sur les cellule de la ligne
   foreach ($row->getCellIterator() as $cell) {
      $value = $cell->getCalculatedValue();
	  $index .= $cell->getColumn();
	  $index .= $cell->getRow();
	  $str .= $index." -> ".$value." // ";
	  $document->setValue("54".$index, decoder($value));
	  $index = "";
   }
}
//_______________________________________________________________________________________________________

// 2-Remplissage de la question 7-1 (input type checkbox)
$reponse = $bdd->query("SELECT `numero_question` 
							FROM `tab_notes_de_synthese`
							WHERE `numero_question` LIKE '7-1-%'
							AND `MISSION_ID` = ".$ID_mission." 
							AND `value` LIKE 'true'
							ORDER BY `numero_question` ASC");
$i = 1;
while($donnees = $reponse->fetch()){
	if($donnees["numero_question"] == "7-1-1") $document->setValue("7-1#".$i,"-Clients");
	else if($donnees["numero_question"] == "7-1-2") $document->setValue("7-1#".$i,"-Fournisseurs");
	else if($donnees["numero_question"] == "7-1-3") $document->setValue("7-1#".$i,"-Banques");
	else if($donnees["numero_question"] == "7-1-4") $document->setValue("7-1#".$i,"-Avocats");
	$i++;
}
//______________________________________________________________________________________________________

// 3-Remplissage de la partie 1-6 (input type checkbox) sauf le textarea
$reponse = $bdd->query("SELECT `numero_question`,`value`
							FROM `tab_notes_de_synthese`
							WHERE `numero_question` LIKE '1-6-%'
							AND `MISSION_ID` = ".$ID_mission."
							ORDER BY `numero_question` ASC");
while($donnees = $reponse->fetch()){
	if($donnees['value'] == 'true'){
		$document->setValue($donnees['numero_question'], "X");
	}
	else{
		$document->setValue($donnees['numero_question'], "");
	}
}
//_______________________________________________________________________________________________________

// 4-Remplissage des donnees(textarea, date, risques) prises lors de la preparation autre que 7-1 et les 1-6 checkbox
$reponse = $bdd->query("SELECT `numero_question`, `value` 
							FROM `tab_notes_de_synthese`
							WHERE `numero_question` NOT LIKE '7-1-%'
							AND `numero_question` NOT LIKE '1-6-%'
							AND `MISSION_ID` = ".$ID_mission);
while($donnees = $reponse->fetch()){
	$document->setValue($donnees["numero_question"], decoder($donnees["value"]));
}
//___________________________________________________________________________________________________

// 5-Remplissage des donnees venant de la base
// Remplissage du document autre que les tableaux 1-2, 1-4, 3-4
$reponse = $bdd->query("SELECT 
							`ENTREPRISE_DENOMINATION_SOCIAL`,
							`ENTREPRISE_CODE`,
							`ENTREPRISE_RAISON_SOCIAL`,
							`ENTREPRISE_ACTIVITE`,
							`ENTREPRISE_VALEUR_NOMINAL`,
							`ENTREPRISE_NOMBRE_ACTION`
							FROM `tab_entreprise`
							WHERE `ENTREPRISE_ID` = ".$ID_Entreprise);
$entreprise = $reponse->fetch();
$reponse = $bdd->query("SELECT `MISSION_DATE_CLOTURE`
							FROM `tab_mission`
							WHERE `MISSION_ID` = ".$ID_mission);
$mission = $reponse->fetch();
$reponse = $bdd->query("SELECT `SUPERVISEUR_NOM`
						FROM `tab_superviseur`
						WHERE `MISSION_ID` = ".$ID_mission);
$superviseur = $reponse->fetch();

$document->setValue("code_entreprise", decoder($entreprise["ENTREPRISE_CODE"]." ".$entreprise["ENTREPRISE_RAISON_SOCIAL"]));
$document->setValue("denomination_entreprise", decoder($entreprise["ENTREPRISE_DENOMINATION_SOCIAL"]));
$document->setValue("date_cloture_mission", decoder($mission["MISSION_DATE_CLOTURE"]));
$document->setValue("nom_superviseur", decoder($superviseur["SUPERVISEUR_NOM"]));
$document->setValue("forme_juridique_entreprise", decoder($entreprise["ENTREPRISE_RAISON_SOCIAL"]));
$document->setValue("activite_entreprise", decoder($entreprise["ENTREPRISE_ACTIVITE"]));

// Remplissage des tableaux 1-2, 1-4, 3-4
// Remplissage de 1-2
$reponse = $bdd->query("SELECT `COLLAB_UTIL_NOM` AS nom
						FROM `tab_collaborateur`
						WHERE `COLLAB_MISSION_ID` = ".$ID_mission."
						AND `COLLAB_STATUT` = 'actif'");
$i = 0;
while($auditeur = $reponse->fetch()){
	$document->setValue("auditeur#".$i, decoder($auditeur['nom']));
	$i++;
}

// Remplissage de 1-4
$reponse = $bdd->query("SELECT `POSTE_CLE_NOM` AS fonction,`POSTE_CLE_TITULAIRE` As nom 
						FROM `tab_poste_cle`
						WHERE `ENTREPRISE_ID` = ".$ID_Entreprise);
$i = 1;
while($poste_cle = $reponse->fetch()){
	$document->setValue("nom_interlocuteur#".$i, decoder($poste_cle["nom"]));
	$document->setValue("fonction_interlocuteur#".$i, decoder($poste_cle["fonction"]));
	$i++;
}

// Remplissage de 3-4
$valeur_nominale = intval($entreprise["ENTREPRISE_VALEUR_NOMINAL"]);
$nb_action_totale = intval($entreprise["ENTREPRISE_NOMBRE_ACTION"]);
$reponse = $bdd->query("SELECT `ACTIONNAIRE_NOM` AS nom,`ACTIONNAIRE_PART` AS nb_part
						FROM `tab_actionnaire`
						WHERE `ENTREPRISE_ID` = ".$ID_Entreprise);
$i = 1;
while($actionnaire = $reponse->fetch()){
	$nb_part = intval($actionnaire["nb_part"]);
	$document->setValue("nom_actionnaire#".$i, decoder($actionnaire["nom"]));
	$document->setValue("nb_part#".$i, number_format( $nb_part, 2, ",", " "));
	$document->setValue("captl_percent#".$i, number_format( $nb_part/$nb_action_totale*100, 2, ",", " "));
	$document->setValue("montant_action#".$i, number_format( $nb_part*$valeur_nominale, 2, ",", " "));
	$i++;
}
$document->setValue("n_tot_act", number_format( $nb_action_totale, 2, ",", " "));
$document->setValue("montant_total", number_format( $nb_action_totale*$valeur_nominale, 2, ",", " "));

//=========================================================================

$fichier = '../fichier_output/note_de_synthese('.$DATE_memorandum.').docx';
   if( file_exists ($fichier)){
		unlink($fichier);
		$document->saveAs('../fichier_output/note_de_synthese('.$DATE_memorandum.').docx');
	}
	else{
		$document->saveAs('../fichier_output/note_de_synthese('.$DATE_memorandum.').docx');
	}
echo '<a id="#icone_memorandum" href="includes/google_docs_viewer.php?id=Rap_Inter/memorandum/fichier_output/note_de_synthese('.$DATE_memorandum.').docx&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
?>