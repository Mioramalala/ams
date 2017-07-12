<?php
	@session_start();
	include '../../../connexion.php';

	$commentaire=$_POST['commentaire'];
	$risque=$_POST['risque'];
	$echo_score_pd=$_POST['echo_score_pd'];
	$mission_id=@$_SESSION['idMission'];
	$cycleId=$_POST['cycleAchatId'];
	$UTIL_ID=$_SESSION['id'];

	//--------------Get the synthese id if exist then it update-------------------//
	$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE,SCORE FROM tab_synthese WHERE MISSION_ID= "' .$mission_id .'" AND CYCLE_ACHAT_ID=16');
	$donnees=$reponse->fetch();
	$synthese=$donnees['SYNTHESE_ID'];

	//---------It update the data in the table tab_synthese if the synthese id exist-------//
	if($donnees['SYNTHESE_ID']!=0){
		$req='UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'", SCORE="'.$echo_score_pd.'", UTIL_ID='.$UTIL_ID.' WHERE MISSION_ID= "' .$mission_id .'" AND CYCLE_ACHAT_ID=16';
		echo $req;
		$reponse2 = $bdd->exec($req);
	}else{
		//------------It add the data in the table tab_synthese if the synthese id is not exist--//
		$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, SCORE, MISSION_ID, CYCLE_ACHAT_ID, UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'","'.$echo_score_pd.'", "' .$mission_id .'", 16, "' .$UTIL_ID .'")');
	}
?>
