<?php
session_start();
include '../../../connexion.php';

$mission_id = $_POST['mission_id'];
$reference  = $_POST['reference'];

//J'active un requette qui vérifie si l'identifiant du tab_rdc_tr_e2 existe
$query      = 'delete from tab_rdc_tr_e2 where mission_id=:mission_id and reference=:reference';
$reponse    = $bdd->prepare($query);
$reponse->execute(array(
	"mission_id" => $mission_id,
	"reference"  => $reference
));

?>