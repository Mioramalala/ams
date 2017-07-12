<?php

 function selectRegExp($sheet, $where /* array like ("compte" => "#40#") */) {
	$is_title = true;
	$title    = array();
	$result   = array();
	$result["data"] = array();
	
	foreach($sheet->getRowIterator() as $row) {
		if($is_title) {
			foreach ($row->getCellIterator() as $cell) {
				$title[] = $cell->getValue();
			}
			$is_title = false;
			$result["title"] = $title;
		} else {
			$i = 0;
			// create an element will contain data, like an object
			$element = array();
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false);
			foreach ($cellIterator as $cell) {
				$element[$title[$i]] = $cell->getValue();
				$i++;
			}
			
			// do selection for each object and put this into the result array when it matches with the regexp
			$ok = true;
			foreach ($where as $key => $value) 
				$ok = $ok && preg_match($value, $element[is_int($key) ? $title[$key] : $key]);
			if($ok) $result["data"][] = $element;
		}
	}
 
	return $result;
 } 