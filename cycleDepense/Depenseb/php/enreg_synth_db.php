<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$mission_id=$_POST['mission_id'];
$cycleId=$_POST['cycleAchatId'];
$echo_score_db=$_POST['echo_score_db'];

//--------------Get the synthese id if exist then it update-------------------//
$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE,SCORE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=22');

$donnees=$reponse->fetch();

$synthese=$donnees['SYNTHESE_ID'];

//---------It update the data in the table tab_synthese if the synthese id exist-------//
if($donnees['SYNTHESE_ID']!=0){
$req='UPDATE tab_synthese SET UTIL_ID="'.$UTIL_ID.'",SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'", SCORE="'.$echo_score_db.'"  WHERE MISSION_ID="'.$mission_id.'" AND CYCLE_ACHAT_ID=22';
echo $req;
$reponse2 = $bdd->exec($req);


$req='UPDATE tab_synthese SET UTIL_ID="'.$UTIL_ID.'", SYNTHESE_RISQUE="'.$risque.'",SCORE="'.$echo_score_db.'" WHERE MISSION_ID="'.$mission_id.'" AND CYCLE_ACHAT_ID=22';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

}
else{
//------------It add the data in the table tab_synthese if the synthese id is not exist--//
$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'","'.$echo_score_db.'",'.$mission_id.',22,'.$UTIL_ID.')');


$req='INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'","'.$echo_score_db.'",'.$mission_id.',22,'.$UTIL_ID.')';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
?>
