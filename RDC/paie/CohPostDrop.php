<?php
session_start();
include '../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$rep=$_POST['rep'];
$cmt=$_POST['cmt'];
$rang=$_POST['rang'];
$cycle=$_POST['cycle'];
$objectif=$_POST['objet'];

$sql = 'SELECT * from tab_rdc where RDC_RANG='.$rang.' AND RDC_OBJECTIF="'.$objectif.'" AND RDC_CYCLE="'.$cycle.'" AND MISSION_ID='.$_SESSION['idMission'];
$reponse = $bdd->query($sql);
$rowCount =count($reponse);

if($rowCount != 0) {
$sql1 = "UPDATE tab_rdc set UTIL_ID = ".$UTIL_ID.",RDC_REPONSE='".$rep."', RDC_COMMENTAIRE='".$cmt."' WHERE RDC_RANG=".$rang." AND RDC_OBJECTIF='".$objectif."' AND RDC_CYCLE='".$cycle."' AND MISSION_ID=".$_SESSION['idMission']; 

} 
else 
{
$sql1 = 'INSERT INTO tab_rdc(RDC_RANG, RDC_OBJECTIF, RDC_CYCLE, MISSION_ID, RDC_REPONSE, RDC_COMMENTAIRE, UTIL_ID) VALUES ('.$rang.', "'.$objectif.'", "'.$cycle.'", '.$_SESSION["idMission"].', "'.$rep.'", "'.$cmt.'", '.$UTIL_ID.')';
}

$req=$bdd->exec($sql1);

$file = '../../fichier/save_mission/mission.sql';
file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);
?>
