<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];
if($_POST['compte']=="" && $_POST['libelle']=="" && $_POST['solde']=="" && $_POST['justification']=="" ){}else{
$reference=(isset($_POST['reference'])) ? $_POST['reference'] : '';
$compte=(isset($_POST['compte'])) ? $_POST['compte'] : '';
$libelle=(isset($_POST['libelle'])) ? $_POST['libelle'] : '';
$solde=(isset($_POST['solde'])) ? $_POST['solde'] : '';
$justification=(isset($_POST['justification'])) ? $_POST['justification'] : '';
$mission_id=$_POST['mission_id'];

$queryId='select id 
from tab_rdc_cf_f7 
where compte="'.$compte.'" 
and reference="'.$reference.'" 
and MISSION_ID='.$mission_id ;
$reponseId=$bdd->query($queryId);
$donneesId=$reponseId->fetch();

echo $queryId;

if($donneesId['id']==0)
{
    $queryInsert='insert into tab_rdc_cf_f7 (compte, libelle, soldeDebit, justification, MISSION_ID, reference, UTIL_ID) values ("'.$compte.'","'.$libelle.'","'.$solde.'","'.$justification.'",'.$mission_id.',"'.$reference.'",'.$UTIL_ID.')';
    $reponseInsert=$bdd->exec($queryInsert);
	
    $file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
    echo $queryInsert;
}
 else 
{
     $queryUpdate='update tab_rdc_cf_f7 
     set UTIL_ID = "'.$UTIL_ID.'",compte="'.$compte.'", libelle="'.$libelle.'", soldeDebit="'.$solde.'", justification="'.$justification.'" 
     where MISSION_ID="'.$mission_id.'" AND id='.$donneesId['id'];
     $reponseUpdate=$bdd->exec($queryUpdate);
	 
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
     echo $queryUpdate;
}

}
?>
