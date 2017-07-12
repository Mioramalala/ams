<?php

@session_start();
include '../../../connexion.php';
$question_id=$_POST['question_id'];
$reponse=$_POST['reponse'];
$UTIL_ID=$_SESSION['id'];

$reponse0 = $bdd->query('SELECT OBJECTIF_ID, QUESTION_ID FROM tab_objectif WHERE QUESTION_ID= "'.$question_id .'" AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
$donnees=$reponse0->fetch();
	
if($donnees['QUESTION_ID']==$question_id){
	$reponse1=$bdd->exec('UPDATE tab_objectif SET OBJECTIF_QCM = "'.$reponse.'", UTIL_ID = "'.$UTIL_ID.'" WHERE QUESTION_ID= "'.$question_id .'" AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
	if($reponse1) echo  'update';
}
else{
	$reponse2 = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_QCM, MISSION_ID, QUESTION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$reponse.'","'.$_SESSION['idMission'].'",'.$question_id.',34,'.$UTIL_ID.')');
	if($reponse) echo 'enregistré';
}


?>