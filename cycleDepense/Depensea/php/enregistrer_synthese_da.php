<?php
	@session_start();
	include '../../../connexion.php';

	$commentaire=$_POST['commentaire'];
	$risque=$_POST['risque'];
	$mission_id=$_SESSION['idMission'];
	$cycleId=$_POST['cycleAchatId'];
	$UTIL_ID=$_SESSION['id'];

	//--------------Get the synthese id if exist then it update-------------------//
	$reponse=$bdd->query('SELECT SYNTHESE_ID,SYNTHESE_RISQUE,SYNTHESE_COMMENTAIRE FROM tab_synthese WHERE MISSION_ID= "'.$mission_id .'" AND CYCLE_ACHAT_ID=1000000');
	$donnees=$reponse->fetch();
	$synthese=$donnees['SYNTHESE_ID'];

	//------- It update the data in the table tab_synthese if the synthese id exist -------//
	if($donnees['SYNTHESE_ID']!=0){
		$req='UPDATE tab_synthese SET UTIL_ID="'.$UTIL_ID.'", SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'"WHERE CYCLE_ACHAT_ID=1000000 AND MISSION_ID="'.$mission_id.'" ';
		$reponse2= $bdd->exec($req);

		$req= 'UPDATE tab_synthese SET UTIL_ID="'.$UTIL_ID.'",SYNTHESE_COMMENTAIRE="'.$commentaire.'", SYNTHESE_RISQUE="'.$risque.'" WHERE CYCLE_ACHAT_ID=1000000  AND MISSION_ID="'.$mission_id.'"';
		$file= '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

	}else{

		//------------It add the data in the table tab_synthese if the synthese id is not exist--//

		// tinay editer
		//$reponse1= $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$rique.'",'.$mission_id.',1000000,'.$UTIL_ID.')');
		$reponse1= $bdd->exec('INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$risque.'", "' .$mission_id .'", 1000000, "'.$UTIL_ID .'")');

		$req= 'INSERT INTO tab_synthese (SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire.'","'.$rique.'", "' .$mission_id .'", 1000000, "' .$UTIL_ID .'")';
		$file= '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);

	}
?>
