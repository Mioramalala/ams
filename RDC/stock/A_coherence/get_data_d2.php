<?php
session_start();
include '../../../connexion.php';

$table      = $_POST['table'];/*
$row        = $_POST['row'];
$column     = $_POST['column'];*/
$mission_id = $_POST['mission_id'];
/*
$query = "SELECT T".$table."_L".$column."_N".$row." FROM tab_rdc_st_d2 WHERE mission_id = :mission_id";
$request = $bdd->prepare($query);

$request->execute(array(
	"mission_id" => $mission_id
));

if($data = $request->fetch()) {
	echo $data["T".$table."_L".$column."_N".$row];
}
*/

echo '{';
echo '"donnees" : [';

	$sql = "SELECT ";

	for($i = 1; $i <= 5; $i++) {
		if($i != 4)
			for($j = 1; $j <= 3; $j++) {
				$sql .= "T".$table."_L".$i."_N".$j;
				if($i != 5 || $j != 3) $sql .= ',';
			}
	}

	$sql .= " FROM tab_rdc_st_d2 WHERE mission_id = :mission_id";
	$request = $bdd->prepare($sql);

	$request->execute(array(
		"mission_id" => $mission_id
	));

	if($data = $request->fetch()) {
		for($i = 1; $i <= 5; $i++)
			if($i != 4)
				for($j = 1; $j <= 3; $j++) {
					echo '{';
					echo '"i" : '.$i.",";
					echo '"j" : '.$j.",";
					echo '"value" : "'.$data["T".$table."_L".$i."_N".$j].'"';
					echo '}';
					if($i != 5 || $j != 3) echo ',';
				}
	}

echo ']';
echo '}';

?>