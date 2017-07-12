<?php
@session_start();
$mission_id=$_SESSION['idMission'];
$UTIL_ID=$_SESSION['id'];
include '../../../connexion.php';



$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
//$cycleId=$_POST['cycleAchatId'];

//--------------Get the synthese id if exist then it update-------------------//
$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE FROM tab_synthese WHERE MISSION_ID= "' .$mission_id .'" AND CYCLE_ACHAT_ID=100');
$donnees=$reponse->fetch();
$synthese=$donnees['SYNTHESE_ID'];

$req= '';

//---------It update the data in the table tab_synthese if the synthese id exist-------//
if($donnees['SYNTHESE_ID']!=0){
	$req= 'UPDATE tab_synthese SET UTIL_ID= "' .$UTIL_ID .'", SYNTHESE_COMMENTAIRE= "' .$commentaire .'", SYNTHESE_RISQUE= "' .$risque .'" WHERE  MISSION_ID= "' .$mission_id .'" AND CYCLE_ACHAT_ID=100';

}else{
	
	//REPLICATION DES DONNEES
	$req= 'INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID) VALUES ("' .$commentaire .'", "' .$risque .'", "' .$mission_id .'", 100)';
}

$reponse= $bdd->query($req);

$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

print ($req);

?>
