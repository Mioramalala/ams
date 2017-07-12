<?php 
	require_once '../phpExcel/excel/biblio/Classes/PHPExcel/IOFactory.php';
	include "../phpExcel/excel/lecture.php";
	
	if(isset($_POST['fichier']) && isset($_POST['comptes']) && isset($_POST['rang_debit']) && isset($_POST['rang_credit'])) {
		
		$comptes = explode('/', $_POST['comptes']);
		$count   = count($comptes);
		$re      = "#";
		
		// 
		for($i = 0; $i < $count;$i++) {
			$re = $re.'^'.$comptes[$i];
			if($i < $count-1) $re = $re.'|';
		}
		
		$re = $re."#";
		
		$objPHPExcel = PHPExcel_IOFactory::load($_POST['fichier']); 
		$sheet = $objPHPExcel->getSheet(0);
		
		$result = selectRegExp($sheet, array(
			0 => $re
		));
		
		$debit_libelle  = $result["title"][$_POST['rang_debit']];
		$credit_libelle = $result["title"][$_POST['rang_credit']];

		$sum = 0;
		
		foreach($result["data"] as $compte) {
			$sum = $sum + floatval($compte[$debit_libelle]) - floatval($compte[$credit_libelle]);
		}
		
		echo '{"sum" : '.$sum.'}';

	}
?>