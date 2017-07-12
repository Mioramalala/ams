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

require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'recuperation_informations.php';
include "../connex.php";
require_once '../Reporting_Word/fonctions_ra.php';
//require_once '../Reporting_Word/fonctions_rsci.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load("Template/Revues_analytiques.xls");

//INITIALISATION DATE DE GENERATION EXPORT
$date_font = date ("d-m-Y");

@session_start();
$idMission=$_SESSION['idMission'];
$lienRA="http://".$_SERVER['HTTP_HOST']."/RA_liengenerer.php?";
//$lienRA="http://".$_SERVER['HTTP_HOST']."/RDC_liengenerer.php?lien=PRODUIT_CLIENTS/".$idMission;


//RECUPERATION NOM CLIENT, DATE DE GENERATION ET DATE DE CLOTURE DE L'ENTREPRISE BY NIAINA
$feuille = $objPHPExcel->getSheet( 0 );
$feuille->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3

$feuille->setCellValue('I1',$lienRA."lien=RA_FONDPROPRE/".$idMission); //

//RECUPERATION COLLABORATEUR BY NIAINA
//Supprimer touts les fichiers texte avant de créer le fichier texte
$path='Collaborateurs/';
$rep=opendir($path);
while($file = readdir($rep)){
    if($file != '..' && $file !='.' && $file !='' && $file!='.txt'){
        unlink($path.$file);        
    }
}
$file ="Collaborateurs/ra_revues_analytiques_".$_SESSION['idMission'].".txt";
if (file_exists($file))
	unlink($file);
$fileopen=(fopen("$file",'w+'));
$sql = "SELECT distinct(UTIL_NOM) FROM tab_ra,tab_utilisateur WHERE tab_ra.UTIL_ID=tab_utilisateur.UTIL_ID and tab_ra.MISSION_ID=".$_SESSION['idMission'];
$rep = $bdd->query($sql); 
while ($donnee = $rep->fetch()) {
    $utilID = $donnee['UTIL_NOM'];
	fwrite($fileopen,$utilID.' ');
}
fclose($fileopen);
$read=file($file);
$octet=filesize($file);
if ($octet==0) {
	$feuille->setCellValue('I2', 'Pas de collaborateur');
} 
else {
	$Auditeur = explode(",", $read[0]);
    $listAuditeur = ''; $i=0;
    foreach ($Auditeur as $key => $value) {
        if($i!=0) $listAuditeur .=', ';
        $listAuditeur .= substr($value, 0,1).'.';
    }

    $feuille->setCellValue('I2', $listAuditeur);

    // $feuille->setCellValue('I2', $read[0]);
}





//RECUPERATION COMPTE, LIBELLE, SOLDE N, SOLDE N-1, VARIATION (N-(N-1)) ET COMMENTAIRES DE L'ENTREPRISE BY NIAINA
//SYNTHESE A
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='fond' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille->setCellValue('A9', $donnee1['SYNTHESE']);

//CYCLE A
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='fond' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(0); 
$rowCount = 17; 
getCollaborateurs($feuille, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE B
$feuille2 = $objPHPExcel->getSheet( 1 );
$feuille2->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille2->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille2->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='immo' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille2->setCellValue('A9', $donnee1['SYNTHESE']);
$feuille2->setCellValue('I1',$lienRA."lien=RA_IMMOCORP_INCORP/".$idMission); //

//CYCLE B
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='immo' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(1); 
$rowCount = 17; 
getCollaborateurs($feuille2, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE C
$feuille3 = $objPHPExcel->getSheet( 2 );
$feuille3->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille3->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille3->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='immofi' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille3->setCellValue('A9', $donnee1['SYNTHESE']);
$feuille3->setCellValue('I1',$lienRA."lien=RA_IMMOFI/".$idMission); 

//CYCLE C
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='immofi' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(2); 
$rowCount = 17; 
getCollaborateurs($feuille3, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE D
$feuille4 = $objPHPExcel->getSheet( 3 );
$feuille4->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille4->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille4->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='stock' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille4->setCellValue('A9', $donnee1['SYNTHESE']);
$feuille4->setCellValue('I1',$lienRA."lien=RA_STOCK/".$idMission); 

//CYCLE D
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='stock' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);

$objPHPExcel->setActiveSheetIndex(3); 
$rowCount = 17; 
getCollaborateurs($feuille4, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


//SYNTHESE E
$feuille5 = $objPHPExcel->getSheet( 4 );
$feuille5->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille5->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille5->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='tresorerie' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille5->setCellValue('A8', $donnee1['SYNTHESE']);
$feuille5->setCellValue('I1',$lienRA."lien=RA_TRESORERIE/".$idMission); 

//CYCLE E
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='tresorerie' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(4); 
$rowCount = 17; 
getCollaborateurs($feuille5, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE F
$feuille6 = $objPHPExcel->getSheet( 5 );
$feuille6->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille6->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille6->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_conclusion_ra WHERE CONCLUSION_OBJECTIF='charge' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille6->setCellValue('A8', $donnee1['CONCLUSION']);
$feuille6->setCellValue('I1',$lienRA."lien=RA_CHARGEFRS/".$idMission); 

//CYCLE F
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='charge' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(5); 
$rowCount = 17; 
getCollaborateurs($feuille6, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE G
$feuille7 = $objPHPExcel->getSheet( 6 );
$feuille7->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille7->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille7->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='vente' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille7->setCellValue('A9', $donnee1['SYNTHESE']);
$feuille7->setCellValue('I1',$lienRA."lien=RA_VENTE/".$idMission); 

//CYCLE G
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='vente' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(6); 
$rowCount = 17; 
getCollaborateurs($feuille7, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE H
$feuille8 = $objPHPExcel->getSheet( 7 );
$feuille8->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille8->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille8->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='paie' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille8->setCellValue('A9', $donnee1['SYNTHESE']);
$feuille8->setCellValue('I1',$lienRA."lien=RA_PAIE/".$idMission);

//CYCLE H
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='paie' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(7); 
$rowCount = 17; 
getCollaborateurs($feuille8, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE I
$feuille9 = $objPHPExcel->getSheet( 8 );
$feuille9->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille9->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille9->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='impot' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille9->setCellValue('A9', $donnee1['SYNTHESE']);
$feuille8->setCellValue('I1',$lienRA."lien=RA_IMPOTTAXE/".$idMission);
//CYCLE I
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='impot' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(8); 
$rowCount = 17; 
getCollaborateurs($feuille9, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE J
$feuille10 = $objPHPExcel->getSheet( 9 );
$feuille10->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille10->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille10->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='emprunt' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille10->setCellValue('A9', $donnee1['SYNTHESE']); 
$feuille10->setCellValue('I1',$lienRA."lien=RA_emprunt/".$idMission);

//CYCLE J 
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='emprunt' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(9); 
$rowCount = 17; 
getCollaborateurs($feuille10, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//SYNTHESE K
$feuille11 = $objPHPExcel->getSheet( 10 );
$feuille11->setCellValue('A1', $nomEntreprise); //Nom Client A1
$feuille11->setCellValue('A2', 'Audit '.$typeMission.' '.$anneeMission); //Type mission et année mission A2
$feuille11->setCellValue('A3', 'Exercice clos le '.$dateClotureMission); //Date de clôture D3
$sql1=$bdd->query("select * from tab_synthese_ra WHERE SYNTHESE_OBJECTIF='dcdivers' and MISSION_ID=".$_SESSION['idMission']);
$donnee1=$sql1->fetch();
$feuille11->setCellValue('A9', $donnee1['SYNTHESE']);
$feuille11->setCellValue('I1',$lienRA."lien=RA_DCD/".$idMission);

//CYCLE K
$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE='dcdivers' and MISSION_ID=".$_SESSION['idMission']." ORDER BY RA_COMPTE ASC";
$result = $bdd->query($sql);
$objPHPExcel->setActiveSheetIndex(10); 
$rowCount = 17; 
getCollaborateurs($feuille11, 'I2', $_SESSION['idMission'], "");
while($row = $result->fetch()){ 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['RA_COMPTE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['RA_LIBELLE']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['RA_D']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['RA_C']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['RA_SOLDE_N']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['RA_SOLDE_N1']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['RA_VARIATION']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['RA_POURCENTAGE']);  
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['RA_COMMENTAIRE']);  
    $rowCount++; 
} 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('../../icone/Logo_2.png');
$objDrawing->setCoordinates('K3');
$objDrawing->setOffsetX('-60');
$objDrawing->setOffsetY('2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls','../Sauvegarde_sortie/Excel/Revues_analytiques('.$date_font.').xls'));
Ajout_base ('Revues_analytiques('.$date_font.').xls',$_SESSION["user"],$_SESSION['idMission'],get_Entreprise ($_SESSION['idMission']),get_ID_utilisateur($_SESSION["user"])); 


echo '<a id="icone_ra" href="includes/google_docs_viewer.php?id=Dossier_Rapport/Sauvegarde_sortie/Excel/Revues_analytiques('.$date_font.').xls&amp;nomfichier=" TARGET="_BLANK"><img src="Dossier_Rapport/img/Excel.png" height="28px" width="28px"/></a>';