<?php
@session_start();
$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
//$risque=$_POST['risque'];
$mission_id=$_POST['mission_id'];
$cycleId=$_POST['cycleAchatId'];

//--------------Get the synthese id if exist then it update-------------------//
$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12');

$donnees=$reponse->fetch();

$synthese=$donnees['SYNTHESE_ID'];

//---------It update the data in the table tab_synthese if the synthese id exist-------//
if($donnees['SYNTHESE_ID']!=0){
$req='UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", SYNTHESE_RISQUE="faible" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12';
echo $req;
$reponse2 = $bdd->exec($req);

$req1='UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'",UTIL_ID="'.$UTIL_ID.'", SYNTHESE_RISQUE="faible" WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);


}
else{
//------------It add the data in the table tab_synthese if the synthese id is not exist--//
$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","faible",'.$mission_id.',12,'.$UTIL_ID.')');

$req1='INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","faible",'.$mission_id.',12,'.$UTIL_ID.')';
$file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
}
?>
