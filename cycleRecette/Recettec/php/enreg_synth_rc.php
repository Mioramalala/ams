<?php
@session_start();
include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$echo_score_rc=$_POST['echo_score_rc'];

$mission_id=$_SESSION['idMission'];

$cycleId=$_POST['cycleAchatId'];
$UTIL_ID =$_SESSION['id'];

//--------------Get the synthese id if exist then it update-------------------//
$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE,SCORE FROM tab_synthese WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=19');
$donnees=$reponse->fetch();


//---------It update the data in the table tab_synthese if the synthese id exist-------//
// if($donnees['SYNTHESE_ID']!=0){
// $req='UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'", SCORE="'.$echo_score_rc.'", UTIL_ID='.$UTIL_ID.' WHERE CYCLE_ACHAT_ID=19';
// echo $req;
// $reponse2 = $bdd->exec($req);
// }
// else{
// //------------It add the data in the table tab_synthese if the synthese id is not exist--//
// $reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'","'.$echo_score_rc.'",'.$mission_id.',19,'.$UTIL_ID.')');
// echo 'INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'","'.$echo_score_rc.'",'.$mission_id.',19,'.$UTIL_ID.')';
// }

//if($donnees['SYNTHESE_ID']!=0){
if($donnees){

	if($donnees['SYNTHESE_ID']!= ''){
		$synthese= $donnees['SYNTHESE_ID'];

		$req= 'UPDATE tab_synthese SET 	SYNTHESE_COMMENTAIRE="'.$commentaire.'", 
										SYNTHESE_RISQUE="'.$risque.'", 
										SCORE="'.$echo_score_rc.'", 
										UTIL_ID= "'.$UTIL_ID.'" 
										WHERE SYNTHESE_ID= "' .$synthese .'"';
		$reponse2 = $bdd->exec($req);
		
		echo 'UPDATE tab_synthese SET 	SYNTHESE_COMMENTAIRE="'.$commentaire.'", 
										SYNTHESE_RISQUE="'.$risque.'", 
										SCORE="'.$echo_score_rc.'", 
										UTIL_ID= "'.$UTIL_ID.'" 
										WHERE SYNTHESE_ID= "' .$synthese .'"';
	}
	// 
	
}else{
	// //------------It add the data in the table tab_synthese if the synthese id is not exist--//
	$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("' .$commentaire .'","' .$risque .'","' .$echo_score_rc .'", "' .$mission_id .'", 19 , "' .$UTIL_ID .'")');
	//echo  'INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("' .$commentaire .'","' .$risque .'","' .$echo_score_rc .'", "' .$mission_id .'", 19 , "' .$UTIL_ID .'")';
	echo 'enregistré';
}

?>
