<!-- Modification superviseur by Niaina -->

<?php

include'../connexion.php';

//Superviseur
$idSup = array();
$nomSup = array();
$nbrSup = $_POST["nbr"];
$idSup = $_POST["valuesID"];
$nomSup = $_POST["valuesNOM"];
$idMission = $_POST["idMiss"];

//Modification superviseur
$reqInsert=$bdd->prepare("DELETE FROM tab_superviseur WHERE MISSION_ID=:mission");
$reqInsert->execute(array(	
	'mission'=>$idMission		
));

for ($i=0;$i<$nbrSup;$i++){
	$reqInsert=$bdd->prepare("INSERT INTO tab_superviseur (SUPERVISEUR_NOM,MISSION_ID,UTIL_ID) VALUE (:nom,:mission,:util)");
	$reqInsert->execute(array(
		'nom'=>$nomSup[$i],
		'mission'=>$idMission,
		'util'=>$idSup[$i]		
	));
}

?>