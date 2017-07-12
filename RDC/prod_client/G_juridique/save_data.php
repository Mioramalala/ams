<?php
session_start();
include '../../../connexion.php';

$util_id    = $_SESSION['id'];

$row        = $_POST['row'];
$column     = $_POST['column'];
$value      = $_POST['value'];
$mission_id = $_POST['mission_id'];

$query = "SELECT * FROM tab_prod_client_g8 WHERE row = :row AND columnn = :column AND mission_id = :mission_id";
$request = $bdd->prepare($query);

$request->execute(array(
	"row"        => $row,
	"column"     => $column,
	"mission_id" => $mission_id
));

if($request->fetch()) {
	$query = "UPDATE tab_prod_client_g8 SET value = :value, util_id = :util_id WHERE row = :row AND columnn = :column AND mission_id = :mission_id";
	$request = $bdd->prepare($query);
	$request->execute(array(
		"value"      => $value,
		"util_id"    => $util_id,
		"row"        => $row,
		"column"     => $column,
		"mission_id" => $mission_id
	));
} else {
	$query = "INSERT INTO tab_prod_client_g8(row, columnn, mission_id, value, util_id) VALUES(:row, :column, :mission_id, :value, :util_id)";
	$request = $bdd->prepare($query);
	$request->execute(array(
		"row"        => $row,
		"column"     => $column,
		"mission_id" => $mission_id,
		"value"      => $value,
		"util_id"    => $util_id
	));
}

?>