<?php

include '../../../connexion.php';

$score=$_POST['score'];
$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$mission_id=$_POST['mission_id'];
$cycleId=$_POST['cycleId'];
$UTIL_ID=$_SESSION['id'];

//--------------Get the synthese id if exist then it update-------------------//

// tinay editer
// $reponse=$bdd->query('SELECT SYNTHESE_ID FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=32');
$reponse=$bdd->query('SELECT SYNTHESE_ID FROM tab_synthese WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=32');
$donnees=$reponse->fetch();
$synthese=$donnees['SYNTHESE_ID'];

//------------It add the data in the table tab_synthese if the synthese id is not exist--//
if($synthese==0){
	$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$commentaire.'", "'.$risque.'", "'.$score.'", "'.$mission_id.'", 32, "'.$UTIL_ID.'")');
}else{
	//---------It update the data in the table tab_synthese if the synthese id is exist-------//
	$reponse2 = $bdd->exec('UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE= "' .$commentaire .'", SYNTHESE_RISQUE= "' .$risque.'", SCORE="' .$score .'", UTIL_ID="' .$UTIL_ID.'" WHERE SYNTHESE_ID= "'.$synthese.'" AND CYCLE_ACHAT_ID=32');
}
?>