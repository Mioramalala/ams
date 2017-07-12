<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$compte=$_POST['compteF5'];
$soldeBal=$_POST['soldeBalF5'];
$soldeGL=$_POST['soldeGLF5'];
$soldeAux=$_POST['soldeAuxF5'];
$ecart1=$_POST['ecartF5'];
$observation1=$_POST['observationF5'];
$ecart2=$_POST['ecart2F5'];
$observation2=$_POST['observation2F5'];
$mission_id=$_POST['mission_id'];

/////////Selection de l'id pour vérifier l'existence des données dans la table tab_rdc_cf_f5///////////////
$queryId='select id from tab_rdc_cf_f5 where mission_id='.$mission_id.' and compte="'.$compte.'"';
$reponseId=$bdd->query($queryId);
$missId=0;

while($donneesId=$reponseId->fetch()){
	$missId=$donneesId['id'];
}

////////Test de l'id, si il existe alors on fait la mise à jour sinon on insert les données////////////
if($missId==0){
	$queryInsert='insert into tab_rdc_cf_f5 (compte, soldeBal, soldeGL, soldeAux, ecart1, observation1, ecart2, observation2, mission_id,UTIL_ID) value ("'.$compte.'",'.$soldeBal.','.$soldeGL.','.$soldeAux.','.$ecart1.',"'.$observation1.'",'.$ecart2.',"'.$observation2.'",'.$mission_id.','.$UTIL_ID.')';
	$reponse=$bdd->exec($queryInsert);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
}
else{
	$queryUpdate='update tab_rdc_cf_f5 set UTIL_ID = '.$UTIL_ID.',compte="'.$compte.'", soldeBal='.$soldeBal.', soldeGL='.$soldeGL.', soldeAux='.$soldeAux.', ecart1='.$ecart1.', observation1="'.$observation1.'", ecart2='.$ecart2.', observation2="'.$observation2.'" where mission_id='.$mission_id.' AND id='.$missId;
	$reponse=$bdd->exec($queryUpdate);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
}
?>