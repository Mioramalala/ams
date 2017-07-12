<?php
@session_start();
 set_time_limit(1200);				//ini_set('memory_limit', '48octets');
		ini_set('memory_limit','-1');
        ini_alter('memory_limit','-1');
      
		gc_enable(); 								//Garbage Collector ACTIVER
		gc_collect_cycles(); 
		

$mission_id=@$_SESSION['idMission'];
include '../connex.php';

$ENTREPRISE_DENOMINATION_SOCIAL=$MISSION_DATE_CLOTURE=$MISSION_TYPE="";

//ENTREPRISE
$get_entreprise =db_connect ("select ENTREPRISE_DENOMINATION_SOCIAL,MISSION_DATE_CLOTURE,MISSION_TYPE from tab_mission m,tab_entreprise e
								where MISSION_ID='".$mission_id."' and m.ENTREPRISE_ID=e.ENTREPRISE_ID ");
foreach ($get_entreprise as $valeur){
	$ENTREPRISE_DENOMINATION_SOCIAL=$valeur['ENTREPRISE_DENOMINATION_SOCIAL'];
	$MISSION_DATE_CLOTURE=$valeur['MISSION_DATE_CLOTURE'];
	$MISSION_TYPE=$valeur['MISSION_TYPE'];
}




	

		
		
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

require_once 'Classes/PHPExcel/IOFactory.php';
require_once '../Reporting_Excel/fonctions_rdc.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load("Template/synthese_mission.xls");



$data=db_connect ("SELECT SYNTHESE_RDC,CASE 
            	WHEN SYNTHESE_CYCLE_RDC='charge' THEN 'CHARGES FOURNISSEURS'
				WHEN SYNTHESE_CYCLE_RDC='dcd' THEN 'DEBITEURS ET CREDITEURS'
				WHEN SYNTHESE_CYCLE_RDC='emprunt' THEN 'EMPRUNTS ET DETTES FINANCIERES'
				WHEN SYNTHESE_CYCLE_RDC='fond' THEN 'FONDS PROPRES'
            	WHEN SYNTHESE_CYCLE_RDC='immo' THEN 'IMMOBILISATIONS CORPORELLES ET INCORPORELLES'
             	WHEN SYNTHESE_CYCLE_RDC='immofi' THEN 'IMMOBILISATIONS FINANCIERES'
                WHEN SYNTHESE_CYCLE_RDC='impot' THEN 'IMPOTS ET TAXES'
                WHEN SYNTHESE_CYCLE_RDC='paie' THEN 'PAIE ET PERSONNEL'
                WHEN SYNTHESE_CYCLE_RDC='prod_client' THEN 'PRODUITS CLIENTS'
                WHEN SYNTHESE_CYCLE_RDC='tresorerie' THEN 'TRESORERIE'
				ELSE 'STOCKS'
				END AS 'SYNTHESE_MISSION'
                
FROM tab_validation_synthese_rdc WHERE MISSION_ID=5");
$baseRow = 5;
foreach($data as $r => $dataRow) {
	$row = $baseRow + $r;
	$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$dataRow['SYNTHESE_RDC'] )
	                              ->setCellValue('C'.$row, $dataRow['SYNTHESE_MISSION']);
								  
}



$date_font = date ("d-m-Y");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls','../Sauvegarde_sortie/Excel/synthese_mission ('.$date_font.').xls')); 

echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Excel/synthese_mission ('.$date_font.').xls" TARGET="_BLANK"><img src="Dossier_Rapport/img/Excel.png" height="28px" width="28px"/></a>';

?>
