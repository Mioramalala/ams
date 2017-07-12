<?php
@session_start();
include("../../../connexion.php");
$numero_de_question = $_POST["id"];
$value = $_POST["value"];
$idMission = $_SESSION["idMission"];
$idEntreprise = $_SESSION["id_Entre"];
//Verifier si le numero de question existe deja dans la base
$reponse = $bdd->query("SELECT COUNT(DISTINCT id) AS nbr
						FROM `tab_notes_de_synthese` 
						WHERE `numero_question` LIKE '".$numero_de_question."'
						AND `MISSION_ID` = ".$idMission);
$donnees = $reponse->fetch();
$nbr = $donnees["nbr"];

if($nbr == 0){
	//Requete qui insere les numeros de question ainsi que les valeurs dans la table tab_notes_de_synthese
	$bdd->exec("INSERT INTO `tmsconsuams`.`tab_notes_de_synthese` 
			(`id`, `MISSION_ID`, `ENTREPRISE_ID`, `numero_question`, `value`) 
			VALUES (NULL, '".$idMission."', '".$idEntreprise."', '".$numero_de_question."', '".$value."');");
}
else{
	//Requete qui met a jour la table tab_notes_de_synthese si le numero de question existe deja dans la table
	$bdd->exec("UPDATE `tmsconsuams`.`tab_notes_de_synthese` 
				SET `tab_notes_de_synthese`.`value` = '".$value."' 
				WHERE `tab_notes_de_synthese`.`numero_question` = '".$numero_de_question."'
				AND `tab_notes_de_synthese`.`MISSION_ID` = ".$idMission);
}
?>