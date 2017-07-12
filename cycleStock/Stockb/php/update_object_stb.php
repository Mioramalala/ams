<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$question_id=$_POST['question_id'];
$UTIL_ID=$_SESSION['id'];

$reponse0=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=11');

$donnees=$reponse0->fetch();

if($donnees['OBJECTIF_COMMENTAIRE']==$commentaire && $donnees['OBJECTIF_QCM']==$qcm){
	echo '0';
}
else{
	$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'",OBJECTIF_QCM="'.$qcm.'" WHERE MISSION_ID='.$mission_id.' AND QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=11');
	echo '1';
	
$req1='UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'",OBJECTIF_QCM="'.$qcm.'" WHERE MISSION_ID='.$mission_id.' AND QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=11';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
	
	
	}

?>