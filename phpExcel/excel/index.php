<?php
require_once './biblio/Classes/PHPExcel/IOFactory.php';
 /*
// Chargement du fichier Excel
$objPHPExcel = PHPExcel_IOFactory::load("test.xlsx");
 
$sheet = $objPHPExcel->getSheet(0);
 
echo '<table border="1" style="border-collapse: collapse">';
 
// On boucle sur les lignes
foreach($sheet->getRowIterator() as $row) {
 
   echo '<tr>';
 
   // On boucle sur les cellule de la ligne
   foreach ($row->getCellIterator() as $cell) {
      echo '<td style="border: 1px solid #777; min-width: 20px;">';
      print_r($cell->getValue() == '' ? '&nbsp;' : $cell->getValue());
      echo '</td>';
   }
 
   echo '</tr>';
}
echo '</table>';*/

include "lecture.php";
/*
$objPHPExcel = PHPExcel_IOFactory::load("bal.xls"); 
$sheet = $objPHPExcel->getSheet(0);

$result = selectRegExp($sheet, array(
	1 => "#^MA#",
	0 => "#^4#"
))["data"];

foreach($result as $e) {
	echo $e["COMPTES"].' - '.$e["INTITULE"].' - '.(intval($e["DEBIT"]) - intval($e["CREDIT"])).'<br>';
}
 */
 
 phpinfo();