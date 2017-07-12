<?php
	@session_start();
	include '../connexion.php';
    $UTIL_ID=$_SESSION['id'];
	
	if(isset($_POST['synthese'])){
		$synthese = $_POST['synthese'];
		$risque = $_POST['risque'];
		
		$req = $bdd->query(" SELECT * FROM tab_synthese_rsci WHERE CYCLE = 'tresorerie' AND MISSION_ID =".$_SESSION['idMission']." ");
		$ligne = $req->rowCount();

		if( $ligne != 0 ){
			$update = $bdd->exec(" UPDATE tab_synthese_rsci SET SYNTHESE = '".$synthese."', RISQUE = '".$risque."', UTIL_ID = '".$UTIL_ID."' WHERE CYCLE = 'tresorerie' AND MISSION_ID =".$_SESSION['idMission']." ");
		
		$req1=" UPDATE tab_synthese_rsci SET SYNTHESE = '".$synthese."', RISQUE = '".$risque."', UTIL_ID = '".$UTIL_ID."' WHERE CYCLE = 'tresorerie' AND MISSION_ID =".$_SESSION['idMission']." ";
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
		
		}
		else{
			$insert = $bdd->prepare(" INSERT INTO tab_synthese_rsci (CYCLE, SYNTHESE, RISQUE, MISSION_ID, UTIL_ID) VALUES (:a,:b,:c,:d,:e) ");
			$insert->execute(array(
				'a' => 'tresorerie',
				'b' => $synthese,
				'c' => $risque,
				'd' => $_SESSION['idMission'],
				'e' => $_SESSION['id']
			));
			
		$req2='INSERT INTO tab_synthese_rsci (CYCLE, SYNTHESE, RISQUE, MISSION_ID,UTIL_ID) VALUES ("tresorerie","'.$synthese.'","'.$risque.'","'. $_SESSION['idMission'].'","'.$_SESSION['id'].'") ';
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
			
			
			
		}
	}
?>