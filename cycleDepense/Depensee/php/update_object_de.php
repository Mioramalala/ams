<?php
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$question_id=$_POST['question_id'];
$mission_id=$_SESSION['idMission'];

$reponse0=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=25');

$donnees=$reponse0->fetch();

if($donnees['OBJECTIF_COMMENTAIRE']==$commentaire && $donnees['OBJECTIF_QCM']==$qcm){
	echo '0';
}
else{
	$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",OBJECTIF_QCM="'.$qcm.'",UTIL_ID ="'.$UTIL_ID.'" WHERE MISSION_ID='.$mission_id.' AND QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=25');
	echo '1';
	
	
$req='UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",OBJECTIF_QCM="'.$qcm.'",UTIL_ID ="'.$UTIL_ID.'" WHERE MISSION_ID='.$mission_id.' AND QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=25';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}

?>