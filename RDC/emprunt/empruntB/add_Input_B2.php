<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$date=$_POST['date'];
$libelle=$_POST['libelle'];
$commentaire=$_POST['commentaire'];
$compte=$_POST['compte'];
$montant=$_POST['montant'];
$ligne=$_POST['ligne'];
$mission_id=$_POST['mission_id'];

$rep0=$bdd->query('select ID from tab_j3 WHERE COMPTE="'.$compte.'" AND LIGNE='.$ligne.' AND MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();
$dcd_id = $donnees0['ID'];

if($dcd_id==0){
$req='insert into tab_j3(LIGNE, DATE, LIBELLE, COMPTE, COMMENTAIRE, MONTANT, MISSION_ID,UTIL_ID) values ('.$ligne.',"'.$date.'","'.$libelle.'","'.$compte.'","'.$commentaire.'","'.$montant.'",'.$mission_id.','.$UTIL_ID.')';
 $rep=$bdd->exec($req);

		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
else{
$req1='update tab_j3 set UTIL_ID = "'.$UTIL_ID.'",DATE="'.$date.'", LIBELLE="'.$libelle.'", COMPTE="'.$compte.'", COMMENTAIRE="'.$commentaire.'", MONTANT="'.$montant.'" where MISSION_ID="'.$mission_id.'" AND ID='.$dcd_id;
 $rep1=$bdd->exec($req1); 

		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
 echo 'update'; 
}

?>