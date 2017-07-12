<?php
 set_time_limit(1200);				//ini_set('memory_limit', '48octets');
		ini_set('memory_limit','-1');
        ini_alter('memory_limit','-1');
      
		gc_enable(); 								//Garbage Collector ACTIVER
		gc_collect_cycles(); 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include "../../connexion.php";
include_once"../connex.php";
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'recuperation_informations.php';
require_once '../Reporting_Excel/fonctions_rdc.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');


$objPHPExcel = $objReader->load("Template/Font_propre.xls");

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath($_SERVER['DOCUMENT_ROOT']."/icone/Logo_2.png");
$objDrawing->setCoordinates('G5');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$objDrawing2 = new PHPExcel_Worksheet_Drawing();
$objDrawing2->setPath($_SERVER['DOCUMENT_ROOT']."/icone/bt.jpg");
$objDrawing2->setCoordinates('C1');
$objDrawing2->setOffsetY('10');
$objDrawing2->setWorksheet($objPHPExcel->getActiveSheet());

//INITIALISATION DATE DE GENERATION EXPORT
$date_font = date ("d-m-Y");

//RECUPERATION NOM CLIENT, DATE DE GENERATION ET DATE DE CLOTURE DE L'ENTREPRISE BY NIAINA
$feuille = $objPHPExcel->getSheet( 0 );
$feuille->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3

@session_start();
$idMission=$_SESSION['idMission'];
$lienRA="http://".$_SERVER['HTTP_HOST']."/RDC_liengenerer.php?lien=FONDPROPRES/".$idMission;
$feuille->setCellValue('F1', $lienRA);
//RECUPERATION COLLABORATEUR BY NIAINA
//Supprimer touts les fichiers texte avant de créer le fichier texte

$path='Collaborateurs/';
$rep=opendir($path);
while($file = readdir($rep)){
    if($file != '..' && $file !='.' && $file !='' && $file!='.txt'){
        unlink($path.$file);        
    }
}
$file ="Collaborateurs/fond_propre_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_rdc,tab_utilisateur WHERE tab_rdc.RDC_CYCLE='Fond propre' and tab_rdc.UTIL_ID=tab_utilisateur.UTIL_ID and tab_rdc.MISSION_ID=".$_SESSION['idMission'];
$rep = $bdd->query($sql); 
while ($donnee = $rep->fetch()) {
    $utilID = $donnee['UTIL_NOM'];
	fwrite($fileopen,$utilID.' ');
}


fclose($fileopen);
$read=file($file);
$octet=filesize($file);
if ($octet==0) {
	$feuille->setCellValue('F2', 'Pas de collaborateur');
} 
else {
	$feuille->setCellValue('F2', $read[0]);
}

getCollaborateurs($feuille, 'F2', $_SESSION['idMission'], 'A-Fonds propres');
getSuperviseurs($feuille, 'F3', $_SESSION['idMission']);
//RECUPERATION REPONSE ET COMMENTAIRE RDC BY NIAINA
//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D9', $reponse1);
$feuille->setCellValue('F9', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D10', $reponse1);
$feuille->setCellValue('F10', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D11', $reponse1);
$feuille->setCellValue('F11', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D12', $reponse1);
$feuille->setCellValue('F12', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - B 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D14', $reponse1);
$feuille->setCellValue('F14', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - B 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D15', $reponse1);
$feuille->setCellValue('F15', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - B 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D16', $reponse1);
$feuille->setCellValue('F16', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - B 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="B" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D17', $reponse1);
$feuille->setCellValue('F17', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D19', $reponse1);
$feuille->setCellValue('F19', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D20', $reponse1);
$feuille->setCellValue('F20', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D22', $reponse1);
$feuille->setCellValue('F22', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D23', $reponse1);
$feuille->setCellValue('F23', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D25', $reponse1);
$feuille->setCellValue('F25', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D26', $reponse1);
$feuille->setCellValue('F26', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="D" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D27', $reponse1);
$feuille->setCellValue('F27', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="Fond propre" and RDC_OBJECTIF="E" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D29', $reponse1);
$feuille->setCellValue('F29', $commentaire1);

$feuille->setCellValue('A32', setSynthese("fond", $_SESSION['idMission']));

$objPHPExcel->setActiveSheetIndex(0);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls','../Sauvegarde_sortie/Excel/Fonds_propres('.$date_font.').xls'));

echo '<a id="icone_fondPropre" href="includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Excel/Fonds_propres('.$date_font.').xls&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/Excel.png" height="28px" width="28px"/></a>';
Ajout_base ('Fonds_propres('.$date_font.').xls',$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
