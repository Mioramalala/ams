<?php

include '../../../connexion.php';
$commentaire=$_POST['commentaire'];
$mission_id=$_POST['mission_id'];
$cycleId=$_POST['cycleAchatId'];
$risque=$_POST['risque'];
$echo_score=$_POST['echo_score'];
$UTIL_ID=$_SESSION['id'];
//echo $echo_score;
//die("error");
//--------------Get the synthese id if exist then it update-------------------//
$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE,SCORE FROM tab_synthese WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=2');
$donnees=$reponse->fetch();

$synthese=$donnees['SYNTHESE_ID'];

//---------It update the data in the table tab_synthese if the synthese id exist-------//
if($donnees['SYNTHESE_ID']!=0){
	$req='UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE= "' .$commentaire .'", SYNTHESE_RISQUE= "' .$risque .'", SCORE= "' .$echo_score .'", UTIL_ID = "' .$UTIL_ID .'" WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID= "' .$mission_id .'"';
	echo $req;
	$reponse2 = $bdd->exec($req);
}else{
	// ------------It add the data in the table tab_synthese if the synthese id is not exist--//
	$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("' .$commentaire .'", "' .$risque .'", "' .$echo_score .'", "'.$mission_id .'", 2, "' .$UTIL_ID .'")' );
}
?>