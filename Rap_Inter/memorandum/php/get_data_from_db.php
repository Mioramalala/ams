<?php
include("../../../connexion.php");
$num_question = $_POST["id"];
$idMission = $_SESSION["idMission"];
$idEntreprise = $_SESSION["id_Entre"];
$reponse = $bdd->query("SELECT `value` FROM `tab_notes_de_synthese`
							WHERE `MISSION_ID` = ".$idMission."
							AND `ENTREPRISE_ID` = ".$idEntreprise."
							AND `numero_question` LIKE '".$num_question."'");
$donnees = $reponse->fetch();
echo $donnees["value"];
?>