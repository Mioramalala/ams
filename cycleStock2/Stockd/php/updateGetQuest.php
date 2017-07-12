<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$question_id=$_POST['question_id'];
$cycleId=$_POST['cycleId'];
$mission_id=$_POST['mission_id'];

$test=0;

$reponse0=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID='.$cycleId);

$donnees=$reponse0->fetch();

if($donnees['OBJECTIF_COMMENTAIRE']!=$commentaire || $donnees['OBJECTIF_QCM']!=$qcm){
	$reponse = $bdd->exec('UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'",OBJECTIF_QCM="'.$qcm.'" WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=13');

$req1='UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'",OBJECTIF_QCM="'.$qcm.'" WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=13';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
	}

$questSuiv=$question_id+1;

$reponse1=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM  tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID='.$cycleId.' AND QUESTION_ID='.$questSuiv);

$donnees1=$reponse1->fetch();

$data=$donnees1['OBJECTIF_COMMENTAIRE'].','.$donnees1['OBJECTIF_QCM'].',1';

$dataTest=$donnees1['OBJECTIF_COMMENTAIRE'];

if($dataTest!=""){
	echo $data; 
}
else{
	echo '0,0';
}

?>