<?php
include("../../../connexion.php");
$num_question = $_POST["id"];
$idMission = $_SESSION["idMission"];
$idEntreprise = $_SESSION["id_Entre"];
$reponse = $bdd->query("SELECT `nom_fichier`
							FROM `tab_notes_de_synthese_fichier` 
							WHERE `MISSION_ID` = ".$idMission."
							AND `numero_question` = '".$num_question."'");
$donnees = $reponse->fetch();
echo $donnees["nom_fichier"];
?>