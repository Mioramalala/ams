<?php

	include '../../../connexion.php';

	$commentaire=$_POST['commentaire'];
	$risque=$_POST['risque']; //ok verification tinay
	@session_start();
	$mission_id=$_SESSION['idMission'];

	//tinay editer
	//$cycleId=$_POST['cycleAchatId'];
	$cycleId=$_POST['cycleId']; // efa 111 @ Message_synthese_termine.php
	$UTIL_ID=$_SESSION['id'];

	//--------------Get the synthese id if exist then it update-------------------//

	//tinay editer
	//$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=111');
	$reponse= $bdd->query("	SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE 
					FROM tab_synthese 
					WHERE MISSION_ID= " .$mission_id ." AND CYCLE_ACHAT_ID=" .$cycleId 
				);
	$donnees=$reponse->fetch();
	$synthese=$donnees['SYNTHESE_ID'];

	//---------It update the data in the table tab_synthese if the synthese id exist-------//
	if($donnees['SYNTHESE_ID']!=0) {
		// tinay editer:
		//$req='UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="faible", UTIL_ID='.$UTIL_ID.' WHERE CYCLE_ACHAT_ID=111';
		$req= 'UPDATE tab_synthese SET SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="' .$risque .'", UTIL_ID= "' .$UTIL_ID .'" WHERE  MISSION_ID= "' .$mission_id .'" AND CYCLE_ACHAT_ID= "' .$cycleId .'"';
		echo $req;
		$reponse2 = $bdd->exec($req);
	}else{
		//------------It add the data in the table tab_synthese if the synthese id is not exist--//
		// tinay editer
		//$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","faible",'.$mission_id.',111,'.$UTIL_ID.')');
		$reponse1 = $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("' .$commentaire .'", "' .$risque .'", "' .$mission_id .'", "' .$cycleId .'" ,"' .$UTIL_ID.'")');
	}
?>
