<!-- Enregistrement superviseur by Niaina -->

<?php

include'../connexion.php';

//Superviseur
$idSup = array();
$nomSup = array();
$nbrSup = $_POST["nbr"];
$idSup = $_POST["valuesID"];
$nomSup = $_POST["valuesNOM"];
$AnnM = $_POST["anneM"];
$typeM = $_POST["typeM"];

//On cherche la session à inclure
$sqlIdMission="SELECT MISSION_ID FROM tab_mission WHERE MISSION_ANNEE='".$AnnM."'AND MISSION_TYPE='".$typeM."'";
$repIdMiss=$bdd->query($sqlIdMission);
while($donneeMissId=$repIdMiss->fetch()){
	$IdMission=$donneeMissId['MISSION_ID'];
}
	
//Enregistrement superviseur
for ($i=0;$i<$nbrSup;$i++){
	$reqInsert=$bdd->prepare("INSERT INTO tab_superviseur (SUPERVISEUR_NOM,MISSION_ID,UTIL_ID) VALUE (:nom,:mission,:util)");
	$reqInsert->execute(array(
		'nom'=>$nomSup[$i],
		'mission'=>$IdMission,
		'util'=>$idSup[$i]		
	));
}

?>