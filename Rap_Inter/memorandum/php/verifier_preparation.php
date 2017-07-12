<?php
/** Retourne true s'il y a des informations manquantes dans la preparation **/
session_start();
require_once("../../../connexion.php");
$ID_mission = $_SESSION['idMission'];
$probleme = false;
// Verifier si tous les champs ont ete remplis
$reponse = $bdd->query("SELECT COUNT(DISTINCT `numero_question`) AS nbr
							FROM `tab_notes_de_synthese`
							WHERE `MISSION_ID` = ".$ID_mission);
$donnees = $reponse->fetch();
if($donnees["nbr"] < 99){
	$probleme = true;
}
// Verifier si tous les fichiers uploadés sont de format Excel
$reponse = $bdd->query("SELECT COUNT(DISTINCT `numero_question`) AS nb
						FROM `tab_notes_de_synthese_fichier`
						WHERE `MISSION_ID` = ".$ID_mission."
						AND `extension` != ''");
$donnees = $reponse->fetch();
if($donnees["nb"] < 5){
	$probleme = true;
}
echo $probleme;
?>