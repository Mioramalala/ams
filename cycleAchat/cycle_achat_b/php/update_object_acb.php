<?php
@session_start();
include '../../../connexion.php';
$mission_id=$_SESSION['idMission'];
$commentaire=$_POST['commentaire'];
$qcm=$_POST['qcm'];
$question_id=$_POST['question_id'];
$UTIL_ID=$_SESSION['id'];

$reponse0=$bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif 
WHERE QUESTION_ID='.$question_id.' AND CYCLE_ACHAT_ID=2');

$donnees=$reponse0->fetch();

if($donnees['OBJECTIF_COMMENTAIRE']==$commentaire && $donnees['OBJECTIF_QCM']==$qcm){
	echo '0';
}
else{
    $req="UPDATE tab_objectif SET OBJECTIF_COMMENTAIRE='$commentaire',OBJECTIF_QCM='$qcm', UTIL_ID='$UTIL_ID' 
          WHERE  MISSION_ID='$mission_id' AND  QUESTION_ID='$question_id' AND CYCLE_ACHAT_ID='2'";
	$reponse = $bdd->exec($req);
	echo '1';
    $file = $_SERVER["DOCUMENT_ROOT"].'/fichier/save_mission/mission.sql';
    file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}

?>