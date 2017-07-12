<?php
session_start();
include '../../../connexion.php';

if(isset($_POST['mission_id'])) {
	$mission_id = $_POST['mission_id'];

	$query = "SELECT * FROM tab_prod_client_g8 WHERE mission_id = :mission_id";
	$request = $bdd->prepare($query);

	$request->execute(array(
		"mission_id" => $mission_id
	));

	$rowCount = $request->rowCount();
	$i = 0;

	echo '{"data" : [';

	while($data = $request->fetch()) {
		echo '{';
			echo '"row"    : '.$data["row"].',';
			echo '"column" : '.$data["columnn"].',';
			echo '"value"  : "'.addslashes($data["value"]).'"';
		echo '}';
		$i++;
		if($i < $rowCount) echo ',';
	}

	echo '], "mission_id" : '.$mission_id.'}';
}
?>