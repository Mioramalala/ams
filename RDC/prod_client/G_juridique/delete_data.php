<?php
session_start();
include '../../../connexion.php';

$mission_id = $_POST['mission_id'];

$query      = "DELETE FROM tab_prod_client_g8 WHERE mission_id = :mission_id";
$request    = $bdd->prepare($query);

$request->execute(array(
	"mission_id" => $mission_id
));

?>