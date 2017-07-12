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
include "../connex.php";
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'recuperation_informations.php';
require_once '../Reporting_Excel/fonctions_rdc.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load("Template/immo_in_corp.xls");

//INITIALISATION DATE DE GENERATION EXPORT
$date_font = date ("d-m-Y");

//RECUPERATION NOM CLIENT, DATE DE GENERATION ET DATE DE CLOTURE DE L'ENTREPRISE BY NIAINA
$feuille = $objPHPExcel->getSheet( 0 );
$feuille->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3

//RECUPERATION COLLABORATEUR BY NIAINA
//Supprimer touts les fichiers texte avant de créer le fichier texte
$path='Collaborateurs/';
$rep=opendir($path);
while($file = readdir($rep)){
    if($file != '..' && $file !='.' && $file !='' && $file!='.txt'){
        unlink($path.$file);        
    }
}
$file ="Collaborateurs/immobilisation_corporelle_incorporelle_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_rdc,tab_utilisateur WHERE tab_rdc.RDC_CYCLE='immobilisation corporelle et incorporelle' and tab_rdc.UTIL_ID=tab_utilisateur.UTIL_ID and tab_rdc.MISSION_ID=".$_SESSION['idMission'];
$rep = $bdd->query($sql); 
while ($donnee = $rep->fetch()) {
    $utilID = $donnee['UTIL_NOM'];
	fwrite($fileopen,$utilID.' ');
}
fclose($fileopen);
$read=file($file);
$octet=filesize($file);
if ($octet==0) {
	$feuille->setCellValue('G2', 'Pas de collaborateur');
} 
else {
	$Auditeur = explode(",", $read[0]);
	$listAuditeur = ''; $i=0;
	foreach ($Auditeur as $key => $value) {
		if($i!=0) $listAuditeur .=', ';
		$listAuditeur .= substr($value, 0,1).'.';
	}

	$feuille->setCellValue('G2', $listAuditeur);

	// $feuille->setCellValue('G2', $read[0]);
}
getCollaborateurs($feuille, 'F2', $_SESSION['idMission'], 'B-Immobilisations incorporelles et corporelles');
getSuperviseurs($feuille, 'F3', $_SESSION['idMission']);
//RECUPERATION REPONSE ET COMMENTAIRE RDC BY NIAINA
//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D9', $reponse1);
$feuille->setCellValue('F9', $commentaire1);


//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D10', $reponse1);
$feuille->setCellValue('F10', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D11', $reponse1);
$feuille->setCellValue('F11', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D14', $reponse1);
$feuille->setCellValue('F14', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D15', $reponse1);
$feuille->setCellValue('F15', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D16', $reponse1);
$feuille->setCellValue('F16', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 7
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=7 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D17', $reponse1);
$feuille->setCellValue('F17', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 8
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=8 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D18', $reponse1);
$feuille->setCellValue('F18', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 9
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=9 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D21', $reponse1);
$feuille->setCellValue('F21', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 10
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=10 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D22', $reponse1);
$feuille->setCellValue('F22', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 11
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=11 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D23', $reponse1);
$feuille->setCellValue('F23', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 12
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=12 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D24', $reponse1);
$feuille->setCellValue('F24', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 13
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=13 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D25', $reponse1);
$feuille->setCellValue('F25', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 14
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=14 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D26', $reponse1);
$feuille->setCellValue('F26', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 15
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=15 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D28', $reponse1);
$feuille->setCellValue('F28', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 16
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=16 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D29', $reponse1);
$feuille->setCellValue('F29', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 17
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=17 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D30', $reponse1);
$feuille->setCellValue('F30', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 18
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=18 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D32', $reponse1);
$feuille->setCellValue('F32', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 19
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=19 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D33', $reponse1);
$feuille->setCellValue('F33', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - A 20
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="A" and RDC_RANG=20 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D34', $reponse1);
$feuille->setCellValue('F34', $commentaire1);


//RECUPERATION REPONSE ET COMMENTAIRE RDC - B 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="B" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D36', $reponse1);
$feuille->setCellValue('F36', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D39', $reponse1);
$feuille->setCellValue('F39', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D40', $reponse1);
$feuille->setCellValue('F40', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D41', $reponse1);
$feuille->setCellValue('F41', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D42', $reponse1);
$feuille->setCellValue('F42', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D44', $reponse1);
$feuille->setCellValue('F44', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D45', $reponse1);
$feuille->setCellValue('F45', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 7
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=7 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D47', $reponse1);
$feuille->setCellValue('F47', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - C 8
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="C" and RDC_RANG=8 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D48', $reponse1);
$feuille->setCellValue('F48', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D50', $reponse1);
$feuille->setCellValue('F50', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D51', $reponse1);
$feuille->setCellValue('F51', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D52', $reponse1);
$feuille->setCellValue('F52', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D54', $reponse1);
$feuille->setCellValue('F54', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D55', $reponse1);
$feuille->setCellValue('F55', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - D 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="D" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D56', $reponse1);
$feuille->setCellValue('F56', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D58', $reponse1);
$feuille->setCellValue('F58', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D59', $reponse1);
$feuille->setCellValue('F59', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D60', $reponse1);
$feuille->setCellValue('F60', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D61', $reponse1);
$feuille->setCellValue('F61', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D62', $reponse1);
$feuille->setCellValue('F62', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D63', $reponse1);
$feuille->setCellValue('F63', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 7
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D64', $reponse1);
$feuille->setCellValue('F64', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - E 8
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="E" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D65', $reponse1);
$feuille->setCellValue('F65', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - F 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D67', $reponse1);
$feuille->setCellValue('F67', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - F 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D68', $reponse1);
$feuille->setCellValue('F68', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - F 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D69', $reponse1);
$feuille->setCellValue('F69', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - F 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="F" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D70', $reponse1);
$feuille->setCellValue('F70', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D74', $reponse1);
$feuille->setCellValue('F74', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D75', $reponse1);
$feuille->setCellValue('F75', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D76', $reponse1);
$feuille->setCellValue('F76', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 4
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=4 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D77', $reponse1);
$feuille->setCellValue('F77', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 5
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=5 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D78', $reponse1);
$feuille->setCellValue('F78', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 6
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=6 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D79', $reponse1);
$feuille->setCellValue('F79', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - G 7
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="G" and RDC_RANG=7 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D80', $reponse1);
$feuille->setCellValue('F80', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - H 1
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="H" and RDC_RANG=1 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D83', $reponse1);
$feuille->setCellValue('F83', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - H 2
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="H" and RDC_RANG=2 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D84', $reponse1);
$feuille->setCellValue('F84', $commentaire1);

//RECUPERATION REPONSE ET COMMENTAIRE RDC - H 3
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from  tab_rdc WHERE RDC_CYCLE="immobilisation corporelle et incorporelle" and RDC_OBJECTIF="H" and RDC_RANG=3 and MISSION_ID='.$_SESSION['idMission']);
$donnees1=$reponse1->fetch();
$reponse1=$donnees1['RDC_REPONSE'];
$commentaire1=$donnees1['RDC_COMMENTAIRE'];
$feuille->setCellValue('D85', $reponse1);
$feuille->setCellValue('F85', $commentaire1);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls','../Sauvegarde_sortie/Excel/Immo_in_corp('.$date_font.').xls')); 

echo '<a id="icone_immoCorp" href="Dossier_Rapport/Sauvegarde_sortie/Excel/Immo_in_corp('.$date_font.').xls" TARGET="_BLANK"><img src="Dossier_Rapport/img/Excel.png" height="28px" width="28px"/></a>';
Ajout_base('Immo_in_corp('.$date_font.').xls',$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 
