<?php
session_start();
include '../../connexion.php';

if(isset($_POST['mission_id']) && isset($_POST['pour'])) {
	$mission_id = $_POST['mission_id'];
	$pour       = $_POST['pour'];

	$query   = "SELECT * FROM tab_commentaire_coherence_bg_ba WHERE pour = :pour AND mission_id = :mission_id";
	$request = $bdd->prepare($query);

	$request->execute(array(
		"pour"       => $pour,
		"mission_id" => $mission_id
	));

	echo '{';

	if($data = $request->fetch()) {
		echo '"commentaire" : "'.addslashes($data["commentaire"]).'"';
	}

	echo '}';
}
?>