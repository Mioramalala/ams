<?php

require_once 'class_word/PHPWord.php';
require_once 'recuperation_informations.php';
require_once 'fonctions_ra.php';

$PHPWord = new PHPWord();

// New portrait section
$section = $PHPWord->createSection();

// Add header
//RECUPERATION NOM CLIENT, DATE DE GENERATION, DATE DE CLOTURE ET NOM SUPERVISEUR DE L'ENTREPRISE BY NIAINA
//INITIALISATION DATE DE GENERATION EXPORT
$DATE_GENERATION = date("d-m-Y");
//NOM SUPERVISEUR
$sqlSuperviseur = 'SELECT * FROM tab_superviseur WHERE MISSION_ID = '.$_SESSION['idMission'];
$reqSuperviseur = $bdd->query($sqlSuperviseur);
$tabSuperviseur = $reqSuperviseur->fetch();
$nom = $tabSuperviseur['SUPERVISEUR_NOM'];

$header = $section->createHeader();
$table = $header->addTable();
$table->addRow();
$table->addCell(8000)->addText('Client: '.utf8_decode($nomEntreprise));
$table->addCell(4500)->addText('REPARTITION DES TACHES COLLABORATEURS',array('bold'=>true, 'align'=>'center'));
$table->addCell(4500)->addImage('../../logo/logoGerCats.jpg', array('width'=>113, 'height'=>35,'align'=>'right'));
$table->addRow();
$table->addCell(8000)->addText(utf8_decode('Comptes arrêtés au ').$dateClotureMission);
$table->addCell(4500)->addText('');
$table->addCell(4500)->addText(utf8_decode("Date d'édition: ").$DATE_GENERATION,array('align'=>'right'));
$table->addRow();
$table->addCell(4500)->addText('Superviseur: '.utf8_decode($nom));

// Add footer
$footer = $section->createFooter();
$table = $footer->addTable();
$table->addRow();
$table->addCell(3500)->addImage('../../logo/logoGerCats.jpg', array('width'=>113, 'height'=>35,'align'=>'left'));
$table->addCell(4500)->addPreserveText(utf8_decode('Evaluation des procédures               Page {PAGE} / {NUMPAGES}'), array('align'=>'right'));
$table->addCell(60)->addImage('../../icone/defaut_.png', array('width'=>60, 'height'=>45,'wrappingStyle' => 'behind','align'=>'right'));

// Define table style arrays
$styleTable = array('borderSize'=>6, 'borderColor'=>'black', 'cellMargin'=>50);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'black', 'bgColor'=>'silver');

// Define cell style arrays
$styleCell = array('valign'=>'center');

// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'center');

// Add table style
$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

// Add table
$table = $section->addTable('myOwnTableStyle');

// Add row
$table->addRow(900);

// Add cells
$table->addCell(3000, $styleCell)->addText('            '.'Collaborateurs', $fontStyle);
$table->addCell(750, $styleCell)->addText('Processus', $fontStyle);
$table->addCell(6000, $styleCell)->addText(utf8_decode('                                       '.'Tâche'), $fontStyle);

// Add more rows / cells
//RECUPERATION NOM COLLABORATEUR, PROCESSUS ET FORMULATION DE L'ENTREPRISE BY NIAINA
$sql = "SELECT * FROM tab_distribution_tache WHERE MISSION_ID=".$_SESSION['idMission']." ORDER BY UTIL_ID";
$rep = $bdd->query($sql); 
while ($donnee = $rep->fetch()) {
    $utilID = $donnee['UTIL_ID'];
    $tacheID = $donnee['tache_id'];
    //NOM COLLABORATEUR
    $sql = 'SELECT * FROM tab_utilisateur WHERE UTIL_ID = '.$utilID;
    $req = $bdd->query($sql);
    $tab = $req->fetch();
    $collaborateur = $tab['UTIL_NOM'];
    $table->addRow();
    $table->addCell(3000)->addText(utf8_decode($collaborateur));    
    //NOM PROCESSUS
    $sql2 = 'SELECT * FROM tab_tache WHERE id_tache = '.$tacheID;
    $req2 = $bdd->query($sql2);
    $tab2 = $req2->fetch();
    $processus = $tab2['processus_tache'];
    $table->addCell(750)->addText(utf8_decode('     '.$processus));    
    //NOM FORMULATION
    $sql3 = 'SELECT * FROM tab_tache WHERE id_tache = '.$tacheID;
    $req3 = $bdd->query($sql3);
    $tab3 = $req3->fetch();
    $formulation = $tab3['formulation_tache'];
    $table->addCell(6000)->addText(utf8_decode($formulation));    
}

$fichier = 'REPARTITION_TACHE (' . $DATE_GENERATION . ').docx';
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
if (file_exists($fichier)) {
    unlink($fichier);
    $objWriter->save('../Sauvegarde_sortie/Word/REPARTITION_TACHE (' . $DATE_GENERATION . ').docx');
} else {
    $objWriter->save('../Sauvegarde_sortie/Word/REPARTITION_TACHE (' . $DATE_GENERATION . ').docx');
}

echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/REPARTITION_TACHE (' . $DATE_GENERATION . ').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

?>