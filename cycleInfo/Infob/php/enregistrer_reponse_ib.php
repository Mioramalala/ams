<?php

@session_start();
include '../../../connexion.php';

$question_id=$_POST['question_id'];
$reponse= $_POST['reponse'];
$mission_id= $_SESSION['idMission'];
$UTIL_ID= $_SESSION['id'];

// tinay editer
//$reponse0 = $bdd->query('SELECT OBJECTIF_ID, QUESTION_ID FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND MISSION_ID='.$_SESSION['idMission']);

$reponse0 = $bdd->query('SELECT QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID= 32 AND QUESTION_ID="'.$question_id.'" AND MISSION_ID="'.$mission_id .'"');
$donnees=$reponse0->fetch();
	
if($donnees && $donnees['QUESTION_ID']==$question_id){
	
	// $reponse1=$bdd->exec('UPDATE tab_objectif SET OBJECTIF_QCM = "' .$reponse .'", UTIL_ID= "'.$UTIL_ID.'" WHERE QUESTION_ID='.$question_id);
	// if(!$reponse1) echo  'UPDATE tab_objectif SET OBJECTIF_QCM = "'.$reponse.'" WHERE QUESTION_ID='.$question_id;

	$reponse1= $bdd->exec('UPDATE tab_objectif SET OBJECTIF_QCM = "' .$reponse .'", UTIL_ID= "'.$UTIL_ID .'" WHERE QUESTION_ID="' .$question_id .'" AND CYCLE_ACHAT_ID= 32 AND MISSION_ID="'.$mission_id .'"');
	if($reponse1) {
		echo  'Enregistrement updaté.';
	}else{
		echo 'Info non update';
	}

}else{
	$reponse2 = $bdd->exec('INSERT INTO tab_objectif (OBJECTIF_QCM, MISSION_ID, QUESTION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$reponse.'","'.$mission_id .'",'.$question_id.', 32 ,'.$UTIL_ID.')');
	if($reponse){
		echo 'Info enregistrer';
	}else{
		echo 'Info non eregistre';
	}

}

?>