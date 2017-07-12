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

//date_default_timezone_set('Europe/London');

/** PHPExcel_IOFactory */
//require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/IOFactory.php';



//echo date('H:i:s') , " Load from Excel5 template" , EOL;
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load("Template/Font_propre.xls");




//echo date('H:i:s') , " Add new data to the template" , EOL;
/*$data = array(array('title'		=> 'Excel for dummies',
					'price'		=> 17.99,
					'quantity'	=> 2
				   ),
			  array('title'		=> 'PHP for dummies',
					'price'		=> 15.99,
					'quantity'	=> 1
				   ),
			  array('title'		=> 'Inside OOP',
					'price'		=> 12.95,
					'quantity'	=> 1
				   )
			 );*/
$F="DFDFDFD";
$feuille = $objPHPExcel->getSheet( 1 );
$feuille->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time())); //Date D 1
$objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time())); //Date D 1
$objPHPExcel->getActiveSheet()->setCellValue('B4',"KJKLJKLJKL"); //Date D 1
$objPHPExcel->getActiveSheet()->setCellValue('A4',$F); //Date D 1

/*$baseRow = 5;
foreach($data as $r => $dataRow) {
	$row = $baseRow + $r;
	$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

	$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r+1)
	                              ->setCellValue('B'.$row, $dataRow['title'])
	                              ->setCellValue('C'.$row, $dataRow['price'])
	                              ->setCellValue('D'.$row, $dataRow['quantity'])
	                              ->setCellValue('E'.$row, '=C'.$row.'*D'.$row);
}
$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);
*/

$date_font = date ("d-m-Y");
//echo date('H:i:s') , " Write to Excel5 format" , EOL;
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls','../Sauvegarde_sortie/Excel/Font_propre ('.$date_font.').xls')); //__FILE__
//echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;

echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Excel/Font_propre ('.$date_font.').xls" TARGET="_BLANK"><img src="Dossier_Rapport/img/Excel.png" height="28px" width="28px"/></a>';

// Echo memory peak usage
//echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
//echo date('H:i:s') , " Done writing file" , EOL;
//echo 'File has been created in ' , getcwd() , EOL;
