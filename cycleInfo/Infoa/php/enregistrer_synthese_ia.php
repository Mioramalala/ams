<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
@session_start();
$mission_id=$_SESSION['idMission'];
$cycleId=$_POST['cycleId'];
$UTIL_ID=$_SESSION['id'];

//--------------Get the synthese id if exist then it update-------------------//
$reponse=$bdd->query('SELECT SYNTHESE_ID FROM tab_synthese WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=100000000');
$donnees=$reponse->fetch();
$synthese=$donnees['SYNTHESE_ID'];

//------------It add the data in the table tab_synthese if the synthese id is not exist--//
if($synthese==0){
$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'",'.$mission_id.',100000000,'.$UTIL_ID.')');
}
else{
//---------It update the data in the table tab_synthese if the synthese id is exist-------//
$reponse2 = $bdd->exec('UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'",UTIL_ID = '.$UTIL_ID.' WHERE SYNTHESE_ID='.$synthese.' AND CYCLE_ACHAT_ID=100000000');
}
?>