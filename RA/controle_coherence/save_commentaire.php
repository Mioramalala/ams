<?php
session_start();
include '../../connexion.php';

$util_id    = $_SESSION['id'];

$pour        = $_POST['pour'];
$commentaire = $_POST['commentaire'];
$mission_id  = $_POST['mission_id'];

$query = "SELECT * FROM tab_commentaire_coherence_bg_ba WHERE pour = :pour AND mission_id = :mission_id";
$request = $bdd->prepare($query);

$request->execute(array(
	"pour"       => $pour,
	"mission_id" => $mission_id
));

if($request->fetch()) {
	$query = "UPDATE tab_commentaire_coherence_bg_ba SET commentaire = :commentaire, util_id = :util_id WHERE pour = :pour AND mission_id = :mission_id";
	$request = $bdd->prepare($query);
	$request->execute(array(
		"commentaire" => $commentaire,
		"util_id"     => $util_id,
		"pour"        => $pour,
		"mission_id"  => $mission_id
	));
} else if($commentaire != '') {
	$query = "INSERT INTO tab_commentaire_coherence_bg_ba(pour, mission_id, commentaire, util_id) VALUES(:pour, :mission_id, :commentaire, :util_id)";
	$request = $bdd->prepare($query);
	$request->execute(array(
		"pour"        => $pour,
		"mission_id"  => $mission_id,
		"commentaire" => $commentaire,
		"util_id"     => $util_id
	));
}

?>