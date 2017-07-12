<?php 
	$output = array();
	$ligne_1 = array(
			"piou" => "lelah",
			"prin" => "lelah"
		);
	$ligne_2 = array(
			"enoch" => "lelah",
			"tojo" => "lelah"
		);

	array_push($output, $ligne_1); array_push($output, $ligne_2);
	//print_r($output);

	foreach ($output as $ligne) {
		foreach ($ligne as $key => $value) {
			echo $key."<br/>";
		}
	}

	$keys = array();
	foreach ($output as $ligne) {
		$keys[] = array_keys($ligne);
	}
	print_r($keys);
 ?>